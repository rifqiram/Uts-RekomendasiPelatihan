<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('pelatihan', PelatihanController::class);
    Route::apiResource('peserta', PesertaController::class)->parameters([
        'peserta' => 'peserta'
    ]);
    Route::apiResource('mentor', MentorController::class);
    Route::apiResource('pendaftaran', PendaftaranController::class);

    Route::post('pelatihan/{pelatihan}/pendaftaran', [PelatihanController::class, 'pendaftaran']);
    Route::get('peserta/{peserta}/riwayat', [PesertaController::class, 'riwayat']);
});
