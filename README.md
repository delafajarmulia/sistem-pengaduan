# 🌍 Suara Qita

**Suara Qita** adalah web berbasis sistem informasi yang berfungsi sebagai platform pengaduan pariwisata di Kabupaten Batang. Website ini memungkinkan pengguna untuk melihat daftar destinasi wisata sekaligus melaporkan kerusakan atau permasalahan terkait fasilitas pariwisata.

## 📌 Fitur Utama
### 🔹 Untuk Pengguna
✅ **Melihat Informasi Destinasi Wisata** - Akses daftar tempat wisata di Kabupaten Batang beserta deskripsi dan detail lokasinya.\
✅ **Mengajukan Pengaduan** -  Laporkan kerusakan atau masalah di tempat wisata secara langsung melalui sistem.\
✅ **Melihat Status Pengaduan** -  Pantau perkembangan laporan yang sudah diajukan dan lihat tanggapan dari pihak terkait.\
### 🔹Untuk Admin
✅ **Mengelola Destinasi Wisata** - Tambah, edit, atau hapus informasi tempat wisata yang tersedia.\
✅ **Mengelola Pengaduan** - Melihat, menanggapi, dan memperbarui status setiap laporan dari pengguna.\
✅ **Manajemen Pengguna** - Mengelola data akun pengguna yang terdaftar dalam sistem.\

## 🛠️ Teknologi yang Digunakan
- **Laravel** – Framework utama untuk backend dan frontend.
- **Blade Templating** – Template engine bawaan Laravel untuk merender tampilan.
- **Tailwind CSS** – Digunakan untuk styling dan membuat tampilan lebih responsif.
- **MySQL** – Database utama untuk menyimpan data pengaduan dan destinasi wisata.

## 🚀 Cara Menjalankan Aplikasi Secara Lokal

1. **Clone repositori ini**:
   ```sh
   git clone https://github.com/delafajarmulia/suara-qita.git
   cd suara-qita
   ```
2. **Install dependensi menggunakan Composer dan NPM**:
   ```sh
   composer install
   npm install
   ```
3. **Konfigurasi file environment**:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
4. **Jalankan migrasi database**:
   ```sh
   php artisan migrate --seed
   ```
5. **Install dan build Tailwind CSS**:
   ```sh
   npm run dev
   ```
6. **Jalankan server lokal**:
   ```sh
   php artisan serve
   ```
7. **Akses aplikasi di browser**:
   ```
   http://127.0.0.1:8000
   ```

## 🤝 Kontribusi
Jika kamu ingin berkontribusi, silakan buat pull request atau diskusikan ide kamu melalui issue di repository ini. 🙌

---

✨ **Dibuat dengan ❤️ oleh Dela Fajar Mulia😁** ✨
