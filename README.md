<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# 🚀 Uts-RekomendasiPelatihan

Sistem manajemen pelatihan berbasis Laravel yang mengelola data mentor, kelas, dan proses pendaftaran peserta secara terstruktur.

---

## 📌 Karakteristik Sistem

* **⚙️ Arsitektur:** Menggunakan MVC & Eloquent ORM dengan relasi tabel pivot antara Peserta dan Pelatihan.
* **🔒 Keamanan:** Proteksi hak akses Admin/User via *middleware* otorisasi dan validasi input yang ketat.
* **🧩 Fleksibilitas:** Menyediakan API Controller & Resource untuk kemudahan integrasi dengan platform lain.

---

## 🌐 Dokumentasi API

Aplikasi ini telah menyediakan RESTful API. Kamu bisa melihat atau mengunduh dokumentasi lengkapnya melalui tautan di bawah ini:

* 📄 [Lihat Dokumentasi API (PDF)](./public/docs/api-documentation.pdf) *(Tautan lokal repositori)*
* 📥 [Download API Specification (PDF)](http://127.0.0.1:8000/docs/api-documentation.pdf) *(Akses saat server lokal berjalan)*

---

## 🛠️ Langkah Instalasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di komputer lokal Anda:

### 1. Clone Repositori
```bash
git clone [https://github.com/rifqiram/Uts-RekomendasiPelatihan.git](https://github.com/rifqiram/Uts-RekomendasiPelatihan.git)
cd Uts-RekomendasiPelatihan

### 2. Install Dependensi PHP
Sebelum menjalankan aplikasi, Anda perlu mengunduh semua library dan *package* pendukung framework Laravel yang tercantum di file `composer.json`.
* Buka terminal atau command prompt di dalam folder proyek.
* Pastikan komputer Anda sudah terinstal **Composer**.
* Jalankan perintah instalasi 
composer install
agar folder `vendor/` otomatis terbuat.

### 3. Setup Environment (Konfigurasi Lingkungan)
Langkah ini diperlukan untuk membuat file konfigurasi utama aplikasi dan menghubungkannya ke database lokal Anda.
1. Duplikat atau salin file `.env.example` yang ada di folder utama proyek, lalu ubah namanya menjadi `.env`.
2. Buka file `.env` tersebut menggunakan text editor (seperti VS Code).
3. Cari bagian konfigurasi database dan sesuaikan dengan nama database di MySQL Anda (misalnya `DB_DATABASE=uts_rekomendasi_pelatihan`).
4. Generate kunci keamanan aplikasi yang baru agar sesi login dan enkripsi berjalan dengan aman.

cp .env.example .env
php artisan key:generate

### 4. Migrasi Database & Seeder
Proses ini akan otomatis membuat struktur tabel database yang dibutuhkan oleh sistem tanpa perlu membuatnya manual satu per satu di phpMyAdmin.
* Pastikan aplikasi database seperti XAMPP (MySQL) sudah dalam posisi *Start* / aktif.
* Jalankan perintah migrasi untuk menyuntikkan skema tabel.
* Jika ada data bawaan awal (seperti akun admin default atau data master), tambahkan perintah *seed* di bagian akhir perintah.

php artisan migrate --seed

### 5. Jalankan Server Lokal
Langkah terakhir untuk menguji dan melihat hasil aplikasi di browser Anda.
* Jalankan perintah untuk menyalakan server bawaan Laravel (*artisan serve*).
* Buka browser favorit Anda (Chrome/Edge/Firefox).
* Akses alamat lokal server yang muncul di terminal untuk mulai mencoba sistem manajemen pelatihan ini.

php artisan serve