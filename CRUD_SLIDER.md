# CRUD Slider - Dokumentasi

## Fitur yang Tersedia

### 1. **READ (Lihat Data)**

- **URL**: `/admin/slider`
- **Fungsi**: Menampilkan daftar semua slider
- **Fitur**:
  - Tampilkan foto, judul, dan URL terkait
  - Tombol Edit dan Delete untuk setiap data

### 2. **CREATE (Tambah Data)**

- **URL**: `/admin/slider/input`
- **Fungsi**: Form untuk menambah slider baru
- **Field yang diisi**:
  - Judul Slider (required)
  - URL Terkait (required)
  - Gambar Slider (required, JPG/PNG/GIF, max 5MB)
- **Preview**: Menampilkan preview gambar sebelum upload

### 3. **UPDATE (Edit Data)**

- **URL**: `/admin/slider/edit/{id_slider}`
- **Fungsi**: Form untuk mengedit slider yang sudah ada
- **Fitur**:
  - Tampilkan data lama
  - Opsi untuk mengubah gambar
  - Preview gambar baru sebelum update

### 4. **DELETE (Hapus Data)**

- **URL**: `/admin/slider/delete/{id_slider}`
- **Fungsi**: Menghapus slider dari database
- **Keamanan**:
  - Konfirmasi sebelum delete
  - Otomatis hapus file gambar dari server

## Struktur Database

```sql
CREATE TABLE `tbl_slider` (
  `id_slider` int PRIMARY KEY AUTO_INCREMENT,
  `judul_slider` varchar(255) NOT NULL,
  `url_terkait` varchar(255) NOT NULL,
  `gambar_slider` varchar(255) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## Folder Uploads

- **Path**: `/public/uploads/slider/`
- **Ukuran Gambar Rekomendasi**: 1920x600px
- **Format**: JPG, PNG, GIF
- **Ukuran Maksimal**: 5MB

## Controller Methods

| Method      | Action           | Route                          |
| ----------- | ---------------- | ------------------------------ |
| index()     | Tampilkan daftar | GET /admin/slider              |
| input()     | Form tambah      | GET /admin/slider/input        |
| store()     | Simpan data baru | POST /admin/slider/store       |
| edit($id)   | Form edit        | GET /admin/slider/edit/{id}    |
| update($id) | Update data      | POST /admin/slider/update/{id} |
| delete($id) | Hapus data       | GET /admin/slider/delete/{id}  |

## Validasi

### Field: judul_slider

- Required (harus diisi)
- Min length: 3 karakter
- Max length: 255 karakter

### Field: url_terkait

- Required (harus diisi)
- Format: Valid URL (harus diawali http:// atau https://)

### Field: gambar_slider

- Required saat create (harus diupload)
- Optional saat update (bisa dikosongkan untuk tidak mengubah)
- Format: JPG, PNG, GIF
- Max size: 5MB

## Pesan Flash

- **Insert Success**: "Data slider berhasil ditambahkan!"
- **Update Success**: "Data slider berhasil diupdate!"
- **Delete Success**: "Data slider berhasil dihapus!"

## Tips Penggunaan

1. **Naming Convention**: Gunakan nama file yang deskriptif saat mengganti gambar
2. **Image Size**: Pastikan gambar sesuai ukuran rekomendasi untuk hasil optimal
3. **URL Format**: Gunakan format URL lengkap dengan protokol (http:// atau https://)
4. **Backup**: Backup database dan folder uploads secara berkala
