# CleanWash Laundry - Sistem Pengelolaan Layanan Laundry

## Deskripsi

CleanWash Laundry adalah aplikasi berbasis web yang dibuat menggunakan CodeIgniter 4 untuk membantu admin buat mengelola usaha layanan laundry.

Aplikasi ini memungkinkan admin untuk mengelola pelanggan, layanan laundry, transaksi, keranjang pesanan, serta mencetak laporan PDF.

---

## Fitur Utama

### Autentikasi
- Login menggunakan database
- Registrasi akun baru
- Logout

### Manajemen Pelanggan
- Tambah pelanggan
- Edit pelanggan
- Hapus pelanggan (Soft Delete)

### Manajemen Layanan Laundry
- Tambah layanan
- Edit layanan
- Hapus layanan
- Cetak PDF layanan

### Keranjang Laundry
- Menambahkan layanan ke keranjang
- Mengubah jumlah pesanan
- Menghapus item pesanan
- Mengosongkan keranjang

### Transaksi
- Checkout transaksi
- Menyimpan data transaksi
- Menampilkan riwayat transaksi
- Cetak PDF laporan transaksi

---

## Teknologi yang Digunakan

- PHP 8
- CodeIgniter 4
- MySQL
- Bootstrap 5
- Dompdf
- Composer

---

## Cara Menjalankan Project

### Clone Repository

```bash
git clone https://github.com/dylanrfq/web_laundry_ci4.git
```

### Install Dependency

```bash
composer install
```

### Buat Database

```sql
CREATE DATABASE laundry_db;
```

### Jalankan Migration

```bash
php spark migrate
```

### Jalankan Seeder

```bash
php spark db:seed LaundrySeeder
```

### Jalankan Server

```bash
php spark serve
```

Buka browser:

```text
http://localhost:8080
```

---

## Struktur Fitur

Pelanggan
↓
Layanan Laundry
↓
Keranjang
↓
Checkout
↓
Transaksi
↓
Cetak PDF

---

## Developer

Dylan Rifqi Alfaizi
UAS PWL
A11.2024.15745
Teknik Informatika
Universitas Dian Nuswantoro