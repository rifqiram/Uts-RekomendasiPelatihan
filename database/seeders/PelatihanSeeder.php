<?php

namespace Database\Seeders;

use App\Models\Pelatihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelatihan::insert([
            [
                'judul' => 'Fundamental Web Development dengan Laravel',
                'deskripsi' => 'Dasar-dasar pengembangan web menggunakan Laravel untuk membangun aplikasi CRUD dan MVC.',
                'kategori' => 'Web Development',
                'level' => 'Beginner',
                'durasi' => '30 Jam',
                'sertifikat' => 'Ya',
                'mentor_id' => 1,
                'tanggal_mulai' => '2026-06-01',
                'tanggal_selesai' => '2026-06-08',
                'is_active' => true,
                'status' => 'Aktif',
            ],
            [
                'judul' => 'Backend API Development Menggunakan Laravel REST API',
                'deskripsi' => 'Membangun REST API yang scalable dan aman dengan Laravel untuk kebutuhan backend modern.',
                'kategori' => 'Backend Development',
                'level' => 'Intermediate',
                'durasi' => '36 Jam',
                'sertifikat' => 'Ya',
                'mentor_id' => 1,
                'tanggal_mulai' => '2026-06-10',
                'tanggal_selesai' => '2026-06-16',
                'is_active' => true,
                'status' => 'Aktif',
            ],
            [
                'judul' => 'Database Design dan SQL untuk Sistem Informasi',
                'deskripsi' => 'Pelatihan desain basis data dan query SQL untuk mendukung sistem informasi yang andal.',
                'kategori' => 'Database',
                'level' => 'Beginner',
                'durasi' => '24 Jam',
                'sertifikat' => 'Ya',
                'mentor_id' => 3,
                'tanggal_mulai' => '2026-06-18',
                'tanggal_selesai' => '2026-06-22',
                'is_active' => true,
                'status' => 'Aktif',
            ],
            [
                'judul' => 'UI/UX Design Menggunakan Figma',
                'deskripsi' => 'Belajar membuat desain antarmuka dan pengalaman pengguna menggunakan Figma.',
                'kategori' => 'UI/UX',
                'level' => 'Beginner',
                'durasi' => '20 Jam',
                'sertifikat' => 'Ya',
                'mentor_id' => 2,
                'tanggal_mulai' => '2026-06-24',
                'tanggal_selesai' => '2026-06-27',
                'is_active' => true,
                'status' => 'Aktif',
            ],
            [
                'judul' => 'Mobile App Development Android dengan Kotlin',
                'deskripsi' => 'Pengembangan aplikasi Android menggunakan Kotlin dengan praktik terbaik mobile development.',
                'kategori' => 'Mobile Development',
                'level' => 'Intermediate',
                'durasi' => '40 Jam',
                'sertifikat' => 'Ya',
                'mentor_id' => 4,
                'tanggal_mulai' => '2026-07-01',
                'tanggal_selesai' => '2026-07-06',
                'is_active' => true,
                'status' => 'Aktif',
            ],
            [
                'judul' => 'Data Analysis dengan Python dan Pandas',
                'deskripsi' => 'Analisis data menggunakan Python dan pandas untuk menghasilkan insight bisnis.',
                'kategori' => 'Data Science',
                'level' => 'Intermediate',
                'durasi' => '32 Jam',
                'sertifikat' => 'Ya',
                'mentor_id' => 5,
                'tanggal_mulai' => '2026-07-08',
                'tanggal_selesai' => '2026-07-12',
                'is_active' => true,
                'status' => 'Aktif',
            ],
            [
                'judul' => 'Machine Learning Dasar untuk Sistem Rekomendasi',
                'deskripsi' => 'Pengenalan machine learning untuk membangun sistem rekomendasi sederhana.',
                'kategori' => 'Artificial Intelligence',
                'level' => 'Intermediate',
                'durasi' => '40 Jam',
                'sertifikat' => 'Ya',
                'mentor_id' => 6,
                'tanggal_mulai' => '2026-07-15',
                'tanggal_selesai' => '2026-07-20',
                'is_active' => true,
                'status' => 'Aktif',
            ],
            [
                'judul' => 'Cyber Security Awareness dan Network Security',
                'deskripsi' => 'Dasar-dasar keamanan siber dan jaringan untuk meningkatkan proteksi sistem.',
                'kategori' => 'Cyber Security',
                'level' => 'Beginner',
                'durasi' => '28 Jam',
                'sertifikat' => 'Ya',
                'mentor_id' => 7,
                'tanggal_mulai' => '2026-07-22',
                'tanggal_selesai' => '2026-07-25',
                'is_active' => true,
                'status' => 'Aktif',
            ],
            [
                'judul' => 'DevOps Dasar Menggunakan Docker dan GitHub Actions',
                'deskripsi' => 'Pelatihan DevOps dasar dengan Docker dan GitHub Actions untuk pipeline CI/CD.',
                'kategori' => 'DevOps',
                'level' => 'Advanced',
                'durasi' => '34 Jam',
                'sertifikat' => 'Ya',
                'mentor_id' => 8,
                'tanggal_mulai' => '2026-07-28',
                'tanggal_selesai' => '2026-08-02',
                'is_active' => false,
                'status' => 'Nonaktif',
            ],
            [
                'judul' => 'Cloud Computing Fundamental dengan AWS',
                'deskripsi' => 'Pengenalan cloud computing menggunakan AWS untuk layanan komputasi dan penyimpanan.',
                'kategori' => 'Cloud Computing',
                'level' => 'Intermediate',
                'durasi' => '30 Jam',
                'sertifikat' => 'Ya',
                'mentor_id' => 8,
                'tanggal_mulai' => '2026-08-05',
                'tanggal_selesai' => '2026-08-10',
                'is_active' => true,
                'status' => 'Aktif',
            ],
        ]);
    }
}
