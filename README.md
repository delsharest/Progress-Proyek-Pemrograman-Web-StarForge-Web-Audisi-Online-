# StarForge - Virtual Casting Management System

StarForge adalah platform manajemen audisi virtual berbasis web yang dirancang untuk membantu juri atau penyelenggara acara dalam mengelola data peserta secara sistematis. Sistem ini mengintegrasikan penyimpanan dokumen portofolio, media audisi (video & audio), dan verifikasi tanda tangan digital dalam satu alur kerja yang efisien.

## Fitur Utama
- **Sistem Autentikasi:** Role-based access untuk Peserta dan Juri.
- **Manajemen Data Peserta:** Input data peserta audisi dengan fitur unggah file.
- **Upload Media Terintegrasi:** Mendukung format file Foto (JPG/PNG), Dokumen (PDF), Video (MP4), dan Audio (MP3).
- **Verifikasi Digital:** Fitur tanda tangan digital menggunakan Canvas API.
- **Sinkronisasi Otomatis:** Integrasi langsung dengan Google Sheets untuk pelaporan data secara *real-time*.
- **Antarmuka Premium:** Menggunakan desain *Glassmorphism* untuk pengalaman pengguna yang modern.

## Teknologi yang Digunakan
- **Backend:** PHP (Native)
- **Database:** MySQL
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript
- **Integrasi:** Google Apps Script (Spreadsheet Sync), cURL

## Panduan Instalasi
1. Pastikan Anda telah menginstal server lokal seperti Laragon atau XAMPP.
2. Clone repository ini ke dalam folder `htdocs` atau folder root server Anda.
3. Impor file database (`.sql`) ke dalam phpMyAdmin.
4. Sesuaikan konfigurasi database pada file `koneksi.php`.
5. Pastikan folder `uploads/` memiliki izin tulis (write permission).
6. Jalankan aplikasi melalui browser di `localhost`.

## Struktur Proyek
- `uploads/`: Direktori penyimpanan file media peserta.
- `index.php`: Pintu utama aplikasi (Controller).
- `header.php` & `footer.php`: Komponen layout modular.
- `proses_simpan.php`: Logika penyimpanan data dan sinkronisasi Google Sheets.
- `koneksi.php`: Konfigurasi koneksi database.
