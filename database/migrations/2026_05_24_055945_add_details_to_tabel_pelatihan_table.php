<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tabel_pelatihan', function (Blueprint $table) {
            $table->string('kategori')->nullable()->after('deskripsi');
            $table->string('level')->nullable()->after('kategori');
            $table->string('durasi')->nullable()->after('level');
            $table->string('sertifikat')->nullable()->after('durasi');
            $table->string('status')->default('Aktif')->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tabel_pelatihan', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'level', 'durasi', 'sertifikat', 'status']);
        });
    }
};
