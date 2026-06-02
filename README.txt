# UKM Public Speaking Registration Website

Website pendaftaran anggota UKM Public Speaking berbasis CodeIgniter 4.
Project ini memiliki halaman pendaftaran publik, dashboard admin, fitur CRUD data pendaftar, login admin, detail pendaftar, pencarian data, statistik dashboard, dan tampilan bertema cyberpunk.

## Fitur

* Halaman pendaftaran anggota UKM Public Speaking
* Form input data pendaftar
* Validasi form
* Dashboard admin
* Login dan logout admin
* CRUD data pendaftar
* Detail data pendaftar
* Pencarian data pendaftar
* Statistik jumlah pendaftar
* Tampilan responsive dengan style cyberpunk
* Proteksi halaman dashboard menggunakan filter admin

## Teknologi

* CodeIgniter 4
* PHP
* MySQL
* Bootstrap 5
* CSS Custom Cyberpunk
* XAMPP / Local Server

## Cara Menjalankan Project Setelah Clone

Clone repository:

```bash
git clone link-repository-kamu
cd nama-folder-project
```

Install dependency Composer:

```bash
composer install
```

Copy file `env` menjadi `.env`.

Untuk Windows:

```bash
copy env .env
```

Untuk Linux/Mac:

```bash
cp env .env
```

Edit file `.env`, lalu sesuaikan konfigurasi berikut:

```env
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = ukm_public_speaking
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

Buat database di phpMyAdmin dengan nama:

```sql
CREATE DATABASE ukm_public_speaking;
```

Jalankan migration:

```bash
php spark migrate
```

Jalankan seeder admin:

```bash
php spark db:seed AdminSeeder
```

Jalankan server lokal:

```bash
php spark serve
```

Buka website:

```text
http://localhost:8080
```

Login admin:

```text
http://localhost:8080/admin/login
```

Akun admin default:

```text
Username: admin
Password: admin123
```

## Jika Dibuka Manual Lewat XAMPP

Jika tidak memakai `php spark serve` dan ingin membuka lewat:

```text
http://localhost/NAMA_FOLDER/public/
```

ubah bagian `app.baseURL` di file `.env` menjadi:

```env
app.baseURL = 'http://localhost/NAMA_FOLDER/public/'
```

Contoh:

```env
app.baseURL = 'http://localhost/UKM/public/'
```

## Struktur Halaman

```text
/                       Halaman pendaftaran
/daftar                 Proses simpan pendaftaran
/admin/login            Login admin
/admin/logout           Logout admin
/admin/pendaftar        Dashboard data pendaftar
/admin/pendaftar/create Tambah data pendaftar
/admin/pendaftar/edit   Edit data pendaftar
/admin/pendaftar/show   Detail data pendaftar
```

## Deskripsi Singkat

Project ini dibuat sebagai website pendaftaran UKM Public Speaking dengan konsep desain cyberpunk. Website ini memudahkan mahasiswa untuk mendaftar secara online dan memudahkan admin dalam mengelola data pendaftar melalui dashboard CRUD yang sudah dilengkapi fitur login.
