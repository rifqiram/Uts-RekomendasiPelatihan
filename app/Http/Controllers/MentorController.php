<?php

namespace App\Http\Controllers;

use App\Http\Resources\MentorResource;
use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
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
        return MentorResource::collection(Mentor::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:tabel_mentor,email',
            'telepon' => 'nullable|string|max:50',
            'keahlian' => 'nullable|string|max:255',
        ]);

        $mentor = Mentor::create($data);

        return new MentorResource($mentor);
    }

    public function show(Mentor $mentor)
    {
        return new MentorResource($mentor);
    }

    public function update(Request $request, Mentor $mentor)
    {
        $data = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:tabel_mentor,email,' . $mentor->id,
            'telepon' => 'nullable|string|max:50',
            'keahlian' => 'nullable|string|max:255',
        ]);

        $mentor->update($data);

        return new MentorResource($mentor);
    }

    public function destroy(Mentor $mentor)
    {
        if ($mentor->pelatihans()->exists()) {
            return response()->json(['message' => 'Masih Ada Kelas!'], 400);
        }

        $mentor->delete();

        return response()->noContent();
    }
}
