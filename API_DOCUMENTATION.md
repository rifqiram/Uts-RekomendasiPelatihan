# Dokumentasi API Sistem Manajemen Pelatihan dan Sertifikasi

## Autentikasi

### POST /api/login
Login admin

Request body:
- `email` (string, required)
- `password` (string, required)

Response:
- `token` (string)
- `user` (object)

Gunakan header berikut untuk endpoint yang dilindungi:
- `Authorization: Bearer {token}`

Kebanyakan endpoint hanya dapat diakses oleh admin. Pastikan token berasal dari akun dengan `role: admin`.

---

## Logout

### POST /api/logout
Invalidate token dan logout admin.

Response:
- `message` (string)

---

## Endpoint Pelatihan

### GET /api/pelatihan
List semua pelatihan.

### POST /api/pelatihan
Buat pelatihan baru.

Request body:
- `judul` (string, required)
- `deskripsi` (string, optional)
- `mentor_id` (integer, optional)
- `tanggal_mulai` (date, required)
- `tanggal_selesai` (date, required)
- `is_active` (boolean, optional)

### GET /api/pelatihan/{pelatihan}
Dapatkan detail pelatihan.

### PUT/PATCH /api/pelatihan/{pelatihan}
Perbarui pelatihan.

Request body (opsional):
- `judul`
- `deskripsi`
- `mentor_id`
- `tanggal_mulai`
- `tanggal_selesai`
- `is_active`

### DELETE /api/pelatihan/{pelatihan}
Hapus pelatihan.

### POST /api/pelatihan/{pelatihan}/pendaftaran
Daftarkan peserta ke pelatihan.

Request body:
- `peserta_id` (integer, required)

---

## Endpoint Peserta

### GET /api/peserta
List semua peserta.

### POST /api/peserta
Buat peserta baru.

Request body:
- `nama` (string, required)
- `email` (string, required, unique)
- `telepon` (string, optional)
- `instansi` (string, optional)

### GET /api/peserta/{peserta}
Dapatkan detail peserta.

### PUT/PATCH /api/peserta/{peserta}
Perbarui peserta.

Request body (opsional):
- `nama`
- `email`
- `telepon`
- `instansi`

### DELETE /api/peserta/{peserta}
Hapus peserta.

### GET /api/peserta/{peserta}/riwayat
Lihat riwayat pendaftaran peserta ke pelatihan.

---

## Endpoint Mentor

### GET /api/mentor
List semua mentor.

### POST /api/mentor
Buat mentor baru.

Request body:
- `nama` (string, required)
- `email` (string, required, unique)
- `telepon` (string, optional)
- `keahlian` (string, optional)

### GET /api/mentor/{mentor}
Dapatkan detail mentor.

### PUT/PATCH /api/mentor/{mentor}
Perbarui mentor.

Request body (opsional):
- `nama`
- `email`
- `telepon`
- `keahlian`

### DELETE /api/mentor/{mentor}
Hapus mentor.

---

## Endpoint Pendaftaran

### GET /api/pendaftaran
List semua pendaftaran.

### POST /api/pendaftaran
Buat pendaftaran baru.

Request body:
- `peserta_id` (integer, required)
- `pelatihan_id` (integer, required)
- `tanggal_daftar` (date, required)
- `status` (string, required)

### GET /api/pendaftaran/{pendaftaran}
Dapatkan detail pendaftaran.

### PUT/PATCH /api/pendaftaran/{pendaftaran}
Perbarui pendaftaran.

Request body (opsional):
- `peserta_id`
- `pelatihan_id`
- `tanggal_daftar`
- `status`

### DELETE /api/pendaftaran/{pendaftaran}
Hapus pendaftaran.

---

## Menambahkan Endpoint CRUD Pendaftaran Terpisah

Untuk menambahkan endpoint CRUD `Pendaftaran` terpisah, lakukan langkah-langkah berikut:

1. Buat controller baru:
   - `php artisan make:controller PendaftaranController --resource`

2. Tambahkan route resource API di `routes/api.php`:

```php
Route::apiResource('pendaftaran', PendaftaranController::class);
```

3. Implementasikan controller `PendaftaranController` dengan metode:
   - `index()` untuk list semua pendaftaran
   - `store()` untuk membuat pendaftaran baru
   - `show()` untuk melihat detail pendaftaran
   - `update()` untuk mengubah status atau data pendaftaran
   - `destroy()` untuk menghapus pendaftaran

4. Gunakan model `Pendaftaran` dan validasi data:
   - `peserta_id` harus ada di `tabel_peserta`
   - `pelatihan_id` harus ada di `tabel_pelatihan`
   - `tanggal_daftar` adalah date
   - `status` dapat berupa `terdaftar`, `lulus`, `batal`, atau nilai custom lain

5. Contoh `store()` pada controller:

```php
public function store(Request $request)
{
    $data = $request->validate([
        'peserta_id' => 'required|exists:tabel_peserta,id',
        'pelatihan_id' => 'required|exists:tabel_pelatihan,id',
        'tanggal_daftar' => 'required|date',
        'status' => 'required|string',
    ]);

    return Pendaftaran::create($data);
}
```

6. Jika ingin, tambahkan relasi di model `Pendaftaran`:

```php
public function peserta()
{
    return $this->belongsTo(Peserta::class, 'peserta_id');
}

public function pelatihan()
{
    return $this->belongsTo(Pelatihan::class, 'pelatihan_id');
}
```

7. Setelah itu, Anda dapat mengakses:
   - `GET /api/pendaftaran`
   - `POST /api/pendaftaran`
   - `GET /api/pendaftaran/{pendaftaran}`
   - `PUT/PATCH /api/pendaftaran/{pendaftaran}`
   - `DELETE /api/pendaftaran/{pendaftaran}`

---

## Contoh Request Header

```http
Authorization: Bearer {token}
Content-Type: application/json
```

---

## Contoh Response Sukses

```json
{
  "id": 1,
  "peserta_id": 2,
  "pelatihan_id": 3,
  "tanggal_daftar": "2026-05-24",
  "status": "terdaftar",
  "created_at": "2026-05-24T06:00:00.000000Z",
  "updated_at": "2026-05-24T06:00:00.000000Z"
}
```
