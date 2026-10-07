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
git clone <URL_REPOSITORY>
cd inventa
```

Contoh:

```bash
git clone https://github.com/username/nama-repo.git
cd inventa
```

## 3. Cara Install Project

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

## 4. Cara Menjalankan Aplikasi

Jalankan server Laravel:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Buka browser dan akses:

```text
http://localhost:8000
```

## 5. Tools yang Digunakan di Project

Project ini menggunakan beberapa tools utama:

- Laravel 11 untuk backend
- Blade template engine untuk UI
- Vite untuk asset frontend
- MySQL untuk database
- Composer untuk dependency PHP
- npm untuk dependency frontend
- VS Code untuk edit source code

## 6. Cara Membuka File .blade.php

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

## 7. Cara Membuat Migration

Migration digunakan untuk membuat tabel di database.

Contoh membuat migration baru:

```bash
php artisan make:migration create_produk_table
```

File migration akan dibuat di folder:

```text
database/migrations/
```

Contoh struktur migration:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
```

Setelah selesai, jalankan:

```bash
php artisan migrate
```

## 8. Cara Membuat Route di Laravel

Route berada di file:

```text
routes/web.php
```

Contoh route sederhana untuk menampilkan halaman Blade:

```php
<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin_apk_dashboard', function () {
    return view('admin_apk.admin_apk_dashboard');
});
```

Jika file view ada di `resources/views/admin_apk/admin_apk_dashboard.blade.php`, maka route di atas akan cocok.

Untuk melihat hasilnya, buka browser:

```text
http://localhost:8000/admin_apk_dashboard
```

## 9. Contoh Route yang Sudah Ada di Proyek Ini

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

## 10. Langkah Singkat Setup

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

## 11. Catatan Penting

- Selalu jalankan `php artisan migrate` setelah menambah migration.
- Jangan lupa sesuaikan `.env` dengan database lokal.
- Jika file Blade tidak tampil, cek route dan nama view.
- Jika ada error asset, jalankan `npm run build` atau `npm run dev`.

Semoga panduan ini membantu Anda memahami setup dan workflow project Laravel ini.
