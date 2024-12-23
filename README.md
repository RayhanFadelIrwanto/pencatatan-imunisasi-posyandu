# Pencatatan Imunisasi Posyandu

Nama: Rayhan Fadel Irwanto
NIM: 122140236

## Deskripsi Proyek
Aplikasi web ini dirancang untuk memudahkan proses pencatatan data imunisasi di Posyandu. Fitur utama dari aplikasi ini meliputi:

- **Login dan Registrasi**: Hanya pengguna terdaftar yang dapat menambahkan data.
- **Manajemen Data Imunisasi**: Data imunisasi dapat ditambah, dilihat, dan disimpan ke dalam basis data.
- **Keamanan**: Validasi input di sisi server dan penggunaan hash untuk menyimpan password.
- **Hosting**: Aplikasi siap di-hosting di server berbasis PHP dan MySQL.

---

## Fitur Utama
1. **Form Login dan Register**:
   - Login untuk pengguna terdaftar.
   - Registrasi untuk pengguna baru dengan validasi password.

2. **Manajemen Data**:
   - Penambahan data imunisasi (hanya pengguna login).
   - Daftar imunisasi dapat dilihat oleh semua pengguna.

3. **Keamanan**:
   - Hash password menggunakan `password_hash()`.
   - Middleware untuk membatasi akses endpoint tertentu.

4. **Respons Dinamis**:
   - Menampilkan pesan kesalahan dan sukses melalui parameter URL.

---

## Struktur Folder
```
imunisasi-web/
├── index.php               # Halaman utama aplikasi
├── login.php               # Halaman login
├── register.php            # Halaman registrasi
├── styles.css              # File CSS
├── scripts.js              # File JavaScript utama
├── backend/                # Folder untuk backend
│   ├── config.php          # Konfigurasi database
│   ├── saveData.php        # Endpoint untuk menyimpan data imunisasi
│   ├── fetchData.php       # Endpoint untuk mengambil data imunisasi
│   ├── login.php           # Endpoint untuk login
│   ├── register.php        # Endpoint untuk registrasi pengguna baru
│   ├── logout.php          # Endpoint untuk logout
│   ├── checkLogin.php      # Endpoint untuk memeriksa status login
│   ├── auth.php            # Middleware untuk memeriksa autentikasi
├── database/               # Folder untuk file SQL
│   └── schema.sql          # Skema database
└── assets/                 # Folder untuk asset tambahan
    ├── images/             # Gambar (jika ada)
    ├── fonts/              # Font (jika ada)
    └── icons/              # Ikon (jika ada)
```

---

## Panduan Penggunaan
### 1. **Setup Database**
- Import file `schema.sql` ke database MySQL.
- Konfigurasi koneksi database di `backend/config.php`.

### 2. **Menjalankan Aplikasi**
- Akses halaman utama melalui `index.php`.
- Login atau register untuk menambahkan data.
- Data imunisasi ditampilkan pada tabel di halaman utama.

### 3. **Validasi Input**
- Validasi dilakukan di sisi klien (JavaScript) dan server (PHP).
- Password dienkripsi sebelum disimpan ke database.

---

## Hosting Aplikasi Web
### 1. **Langkah-langkah Hosting**
- **Pilih Penyedia Hosting**: Gunakan penyedia hosting berbasis PHP dan MySQL seperti Jagoan Hosting atau Niagahoster.
- **Unggah File**: Gunakan FTP atau File Manager untuk mengunggah seluruh file proyek ke server.
- **Konfigurasi Database**:
  - Buat database baru di server hosting.
  - Import file `schema.sql` ke database tersebut.
  - Perbarui `backend/config.php` dengan kredensial database server hosting.
- **Uji Coba**: Akses domain Anda untuk memastikan aplikasi berjalan dengan baik.

### 2. **Keamanan Hosting**
- **Validasi Input**:
  - Hindari SQL Injection dengan menggunakan prepared statements.
- **Gunakan HTTPS**:
  - Aktifkan SSL untuk mengenkripsi data antara klien dan server.
- **Batasi Akses**:
  - Pastikan hanya file yang diperlukan yang dapat diakses publik.

### 3. **Konfigurasi Server**
- Aktifkan `mod_rewrite` untuk URL yang ramah.
- Batasi upload file (jika ada) pada ukuran tertentu.
- Atur PHP `max_execution_time` untuk mencegah eksekusi lama.

---

## Kriteria Penilaian
Aplikasi ini mencakup semua kriteria yang diminta, termasuk manipulasi DOM, validasi input, OOP PHP, manajemen state dengan session, dan penggunaan database.

---

## Kontak
Jika ada pertanyaan, silakan hubungi:
- **Nama**: [Nama Anda]
- **Email**: [Email Anda]
- **Github**: [Link ke repositori proyek]

