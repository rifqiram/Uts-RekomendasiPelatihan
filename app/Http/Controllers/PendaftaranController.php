<?php

namespace App\Http\Controllers;

use App\Http\Resources\PendaftaranResource;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if ($response = $this->authorizeAdmin($request)) {
                return $response;
            }

            return $next($request);
        });
    }

    public function index()
    {
        return PendaftaranResource::collection(Pendaftaran::with(['peserta', 'pelatihan.mentor'])->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'peserta_id' => 'required|exists:tabel_peserta,id',
            'pelatihan_id' => 'required|exists:tabel_pelatihan,id',
            'tanggal_daftar' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $pendaftaran = Pendaftaran::create($data);

        return new PendaftaranResource($pendaftaran->load(['peserta', 'pelatihan.mentor']));
    }

    public function show(Pendaftaran $pendaftaran)
    {
        return new PendaftaranResource($pendaftaran->load(['peserta', 'pelatihan.mentor']));
    }

    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $data = $request->validate([
            'peserta_id' => 'sometimes|required|exists:tabel_peserta,id',
            'pelatihan_id' => 'sometimes|required|exists:tabel_pelatihan,id',
            'tanggal_daftar' => 'sometimes|required|date',
            'status' => 'sometimes|required|string|max:50',
        ]);

        $pendaftaran->update($data);

        return new PendaftaranResource($pendaftaran->load(['peserta', 'pelatihan.mentor']));
    }

    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        return response()->noContent();
    }
}
