<?php

namespace App\Http\Controllers;

use App\Http\Resources\PelatihanResource;
use App\Http\Resources\PendaftaranResource;
use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PelatihanController extends Controller
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
        return PelatihanResource::collection(Pelatihan::with('mentor')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'mentor_id' => 'nullable|exists:tabel_mentor,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $data['is_active'] ?? true;

        $pelatihan = Pelatihan::create($data);

        return new PelatihanResource($pelatihan->load('mentor'));
    }

    public function show(Pelatihan $pelatihan)
    {
        return new PelatihanResource($pelatihan->load('mentor', 'pendaftarans.peserta'));
    }

    public function update(Request $request, Pelatihan $pelatihan)
    {
        $data = $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string',
            'level' => 'nullable|string',
            'durasi' => 'nullable|string',
            'sertifikat' => 'nullable|string',
            'mentor_id' => 'nullable|exists:tabel_mentor,id',
            'tanggal_mulai' => 'sometimes|required|date',
            'tanggal_selesai' => 'sometimes|required|date|after_or_equal:tanggal_mulai',
            'status' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $pelatihan->update($data);

        return new PelatihanResource($pelatihan->load('mentor'));
    }

    public function destroy(Pelatihan $pelatihan)
    {
        if ($pelatihan->pendaftarans()->exists()) {
            return response()->json(['message' => 'Masih Ada Peserta!'], 400);
        }

        $pelatihan->delete();

        return response()->noContent();
    }

    public function pendaftaran(Request $request, Pelatihan $pelatihan)
    {
        $data = $request->validate([
            'peserta_id' => 'required|exists:tabel_peserta,id',
        ]);

        $pendaftaran = Pendaftaran::create([
            'pelatihan_id' => $pelatihan->id,
            'peserta_id' => $data['peserta_id'],
            'tanggal_daftar' => now(),
            'status' => 'terdaftar',
        ]);

        return new PendaftaranResource($pendaftaran->load('peserta', 'pelatihan'));
    }
}
