# Laravel Transfer Pulsa Starter

Starter source code Laravel untuk website jasa convert pulsa, terinspirasi dari pola umum situs convert pulsa:
- Landing page
- Rate provider
- Kalkulator estimasi
- Form order convert pulsa
- Redirect WhatsApp ke admin
- Admin login sederhana
- CRUD rate provider
- CRUD kontak
- Daftar transaksi/order

> Catatan: ini bukan clone 1:1 dan tidak menyertakan aset/brand milik website lain. Ganti nama, warna, logo, kontak, teks legal, dan rate sesuai bisnis Anda.

## Instalasi

```bash
composer create-project laravel/laravel transfer-pulsa
cd transfer-pulsa

# Salin file dari folder starter ini ke project Laravel Anda
cp -R path-ke-starter/* .

composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run build

php artisan migrate --seed
php artisan serve
```

Login admin default dari seeder:
- Email: admin@example.com
- Password: password

## Struktur penting

- `routes/web.php`
- `app/Http/Controllers/HomeController.php`
- `app/Http/Controllers/OrderController.php`
- `app/Http/Controllers/Admin/RateController.php`
- `app/Models/Rate.php`
- `app/Models/Order.php`
- `resources/views/home.blade.php`
- `resources/views/orders/create.blade.php`
- `resources/views/admin/*`

## Legal dan keamanan

Tambahkan verifikasi transaksi manual. Jangan otomatis menerima transaksi yang mencurigakan. Simpan bukti transfer pulsa, nomor pengirim, rekening/e-wallet penerima, IP, dan log status order.
