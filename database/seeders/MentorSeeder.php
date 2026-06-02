<?php

namespace Database\Seeders;

use App\Models\Mentor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mentor::insert([
            [
                'nama' => 'Ahmad Fauzan, S.Kom',
                'email' => 'ahmad.fauzan@training.id',
                'telepon' => '081234567801',
                'keahlian' => 'Laravel & Backend Development',
            ],
            [
                'nama' => 'Dinda Pramesti, M.Kom',
                'email' => 'dinda.pramesti@training.id',
                'telepon' => '081234567802',
                'keahlian' => 'UI/UX Design & Figma',
            ],
            [
                'nama' => 'Rizky Saputra, S.Kom',
                'email' => 'rizky.saputra@training.id',
                'telepon' => '081234567803',
                'keahlian' => 'Database Engineering & SQL',
            ],
            [
                'nama' => 'Muhammad Arif, M.T',
                'email' => 'arif.mobile@training.id',
                'telepon' => '081234567804',
                'keahlian' => 'Android Development Kotlin',
            ],
            [
                'nama' => 'Nabila Putri, S.Kom',
                'email' => 'nabila.putri@training.id',
                'telepon' => '081234567805',
                'keahlian' => 'Data Science & Python',
            ],
            [
                'nama' => 'Yoga Prasetyo, M.Kom',
                'email' => 'yoga.ai@training.id',
                'telepon' => '081234567806',
                'keahlian' => 'Machine Learning & AI',
            ],
            [
                'nama' => 'Fikri Ramadhan, S.Kom',
                'email' => 'fikri.security@training.id',
                'telepon' => '081234567807',
                'keahlian' => 'Cyber Security',
            ],
            [
                'nama' => 'Bima Aditya, S.Kom',
                'email' => 'bima.devops@training.id',
                'telepon' => '081234567808',
                'keahlian' => 'DevOps & Cloud Computing',
            ],
        ]);
    }
}
