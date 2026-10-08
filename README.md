# Panduan Project Laravel Admin UKM

Dokumentasi ini menjelaskan cara setup project, menjalankan aplikasi, membuka file Blade, membuat migration, serta menambahkan route pada project Laravel ini.

## 1. Versi Tools yang Digunakan

Pastikan environment Anda memiliki versi berikut:

- PHP: ^8.2
- Laravel Framework: 11.57.0
- MySQL: 8.4.10
- Vite: 8.0.0
- Flutter: 3.41.6
- Dart: 3.11.4

Jika belum install, silakan install terlebih dahulu:

- PHP 8.2+
- Composer
- MySQL
- Node.js & npm
- Git
- VS Code

## 2. Cara Clone Project dari Git

Buka terminal dan jalankan perintah berikut:

```bash
git clone git@github.com:raffaeldeannova33425122-source/inventa.git
cd inventa
```

## 3. Tutorial Penggunaan Git

Berikut panduan dasar penggunaan Git untuk project ini agar proses kolaborasi dan update code lebih rapi.

### 3.1. Mengecek status repository

```bash
git status
```

Perintah ini menampilkan file yang sudah berubah, ditambahkan, atau belum di-commit.

### 3.2. Membuat branch baru

```bash
git checkout -b fitur/nama-fitur
```

Atau versi terbaru:

```bash
git switch -c fitur/nama-fitur
```

Branch baru berguna agar kerjaan Anda tidak bercampur dengan branch utama.

### 3.3. Menambahkan file ke staging area

```bash
git add .
```

Jika hanya ingin menambahkan satu file tertentu:

```bash
git add resources/views/admin_apk/admin_apk_dashboard.blade.php
```

### 3.4. Commit perubahan

```bash
git commit -m "Menambahkan fitur dashboard admin"
```

Gunakan pesan commit yang jelas dan deskriptif.

### 3.5. Push ke repository

```bash
git push -u origin fitur/nama-fitur
```

Setelah branch pertama kali dipush, perintah berikut cukup digunakan untuk update selanjutnya:

```bash
git push
```

### 3.6. Mengambil update dari branch utama

Sebelum pull request atau sebelum lanjut kerja, biasanya lakukan:

```bash
git pull origin main
```

Jika masih berada di branch lain, bisa pindah dulu ke branch utama:

```bash
git checkout main
```

Lalu ambil update:

```bash
git pull origin main
```

### 3.7. Melihat riwayat commit

```bash
git log --oneline
```

Perintah ini menampilkan daftar commit terbaru.

### 3.8. Mengembalikan perubahan

Jika ingin membatalkan perubahan file sebelum commit:

```bash
git restore nama-file.php
```

Jika ingin membatalkan perubahan yang sudah masuk staging area:

```bash
git restore --staged nama-file.php
```

### 3.9. Contoh workflow kerja harian

```bash
git status
git checkout -b fitur/halaman-login
git add .
git commit -m "Membuat halaman login"
git push -u origin fitur/halaman-login
```

Setelah branch sudah siap, biasanya Anda akan membuat pull request di GitHub/GitLab untuk di-review sebelum digabung ke branch utama.

## 4. Cara Install Project

Setelah masuk ke folder project, jalankan perintah berikut:

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Setelah itu, atur database di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=
```

Lanjutkan dengan:

```bash
php artisan migrate
npm install
npm run build
```

Jika ingin menjalankan mode development frontend:

```bash
npm run dev
```

## 5. Cara Menjalankan Aplikasi

Jalankan server Laravel:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Buka browser dan akses:

```text
http://localhost:8000
```

## 6. Tools yang Digunakan di Project

Project ini menggunakan beberapa tools utama:

- Laravel 11 untuk backend
- Blade template engine untuk UI
- Vite untuk asset frontend
- MySQL untuk database
- Composer untuk dependency PHP
- npm untuk dependency frontend
- VS Code untuk edit source code

## 7. Cara Membuka File .blade.php

File tampilan Blade berada di folder:

```text
resources/views/
```

Contoh file yang sedang dipakai:

```text
resources/views/admin_apk/admin_apk_dashboard.blade.php
```

Cara membukanya di VS Code:

```bash
code resources/views/admin_apk/admin_apk_dashboard.blade.php
```

Atau buka lewat VS Code Explorer lalu arahkan ke folder `resources/views/admin_apk`.

File Blade berisi HTML, CSS, dan struktur tampilan halaman. Jika ingin mengubah UI, edit di file tersebut.

## 8. Cara Membuat Migration

Migration digunakan untuk membuat tabel di database.

Contoh membuat migration baru:

```bash
php artisan make:migration create_produk_table
```

File migration akan dibuat di folder:

```text
database/migrations/
```

Setelah selesai, jalankan:

```bash
php artisan migrate
```

## 9. Cara Membuat Route di Laravel

Route berada di file:

```text
routes/web.php
```

Untuk melihat hasilnya, buka browser:

```text
http://localhost:8000/nama_file_di_folder_views
```

## 10. Contoh Route yang Sudah Ada di Proyek Ini

Di file `routes/web.php` sudah ada route berikut:

```php
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin_apk_dashboard', function () {
    return view('admin_apk/admin_apk_dashboard');
});
```

Artinya halaman utama akan menampilkan `welcome.blade.php`, sedangkan halaman admin dashboard akan menampilkan `admin_apk/admin_apk_dashboard.blade.php`.

## 11. Langkah Singkat Setup

Berikut langkah cepat untuk mulai project:

```bash
git clone <URL_REPOSITORY_KAMU>
cd inventa
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
php artisan serve
```

## 12. Catatan Penting

- Selalu jalankan `php artisan migrate` setelah menambah migration.
- Jangan lupa sesuaikan `.env` dengan database lokal.
- Jika file Blade tidak tampil, cek route dan nama view.
- Jika ada error asset, jalankan `npm run build` atau `npm run dev`.

Semoga panduan ini membantu Anda memahami setup dan workflow project Laravel ini.
