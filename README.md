# Plant Power - Website Penjualan Bibit Tanaman

Website katalog penjualan bibit tanaman premium berbasis Laravel dengan desain modern, elegan, dan responsif.

## Fitur Utama

- **Desain Premium**: Dark green theme dengan glass morphism effects
- **Katalog Produk Lengkap**: Kategori bibit buah, sayuran, tanaman hias, perkebunan, kayu, dan rambat
- **Pemesanan WhatsApp**: Sistem pemesanan langsung via WhatsApp tanpa payment gateway
- **Filter & Pencarian**: Filter produk berdasarkan kategori, tag, harga, dan stok
- **Blog/Artikel**: Tips dan panduan perawatan tanaman
- **Responsive Design**: Optimal untuk desktop dan mobile
- **Admin Dashboard**: UI untuk manajemen produk dan pesanan

## Teknologi

- **Laravel 13**: Framework PHP terbaru
- **Tailwind CSS**: Utility-first CSS framework
- **Blade Template**: Templating engine Laravel
- **MySQL**: Database relasional
- **Livewire**: Komponen dinamis (opsional)

## Struktur Database

### Tabel Utama
- `users` - Data pengguna
- `categories` - Kategori produk
- `subcategories` - Subkategori produk
- `products` - Data produk bibit tanaman
- `tags` - Tag produk (Cepat Berbuah, Bibit Unggul, dll)
- `product_tag` - Relasi produk dan tag
- `testimonials` - Testimoni pelanggan
- `blogs` - Artikel dan blog
- `settings` - Pengaturan website
- `banners` - Banner promosi
- `wishlists` - Data wishlist pengguna

## Instalasi

### Persyaratan
- PHP 8.3+
- Composer
- Node.js & NPM
- MySQL/MariaDB

### Langkah Instalasi

1. **Clone Repository**
```bash
cd genjah_bibit
```

2. **Install Dependencies**
```bash
composer install
npm install
```

3. **Setup Environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Konfigurasi Database**
Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=plant_power
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run Migrations & Seeders**
```bash
php artisan migrate --seed
```

6. **Build Assets**
```bash
npm run build
```

7. **Run Server**
```bash
php artisan serve
```

Akses website di `http://localhost:8000`

## Struktur Kategori Produk

### 1. Sayuran
- Lombok, Terong, Tomat

### 2. Buah & Bibit Buah
- Pepaya (California, Thailand)
- Alpukat (Aligator, Miki, Red Vietnam, dll)
- Jeruk (Keprok, Wangi, Lemon, Dekopon, dll)
- Sawo (Manila, Jumbo, Amerika)
- Durian (Musang King, Bawor, Duri Hitam, Montong, dll)
- Mangga (Harum Manis, Miyazaki, Red Emperor, dll)
- Kelengkeng (New Crystal, Itoh, Crystalin)
- Nangka, Kedondong, Juwet, Jambu, Rambutan
- Srikaya, Belimbing, Duku, Sukun, Pisang

### 3. Tanaman Perkebunan
- Kopi (Arabika, Robusta)
- Kelapa (Genjah, Kopyor, Hybrida)
- Petai, Kacang Amazon

### 4. Tanaman Hias & Bunga
- Pucuk Merah, Ketapang Kencana, Tabebuya
- Kenanga, Bunga Kantil, Bidara Arab, Palem Merah

### 5. Tanaman Rambat
- Anggur Pohon Rambat

### 6. Tanaman Kayu
- Sengon Laut, Balsa, Jati Emas, Mahoni

## Route Website

| Route | Deskripsi |
|-------|-----------|
| `/` | Homepage |
| `/produk` | Daftar produk dengan filter |
| `/produk/{slug}` | Detail produk |
| `/kategori` | Daftar kategori |
| `/kategori/{slug}` | Produk per kategori |
| `/blog` | Daftar artikel |
| `/blog/{slug}` | Detail artikel |
| `/tentang-kami` | Tentang kami |
| `/kontak` | Halaman kontak |
| `/wishlist` | Wishlist pengguna |
| `/admin` | Admin dashboard |

## Pengaturan WhatsApp

Edit pengaturan WhatsApp di file `database/seeders/SettingSeeder.php` atau via database:

```php
['key' => 'whatsapp_number', 'value' => '6281234567890'],
['key' => 'whatsapp_message', 'value' => 'Halo Plant Power, saya ingin bertanya tentang bibit tanaman.'],
```

## Customization

### Warna Theme
Edit file `resources/css/plant-theme.css` untuk mengubah warna tema:
- Primary: Emerald/Green shades
- Accent: Lime shades
- Background: Dark emerald

### Gambar Produk
Ganti URL gambar di views dengan gambar Anda sendiri. Gambar saat ini menggunakan placeholder dari Unsplash.

## Kontribusi

Project ini dibuat untuk keperluan skripsi dan bisnis UMKM. Silakan modifikasi sesuai kebutuhan.

## Lisensi

MIT License - Silakan gunakan untuk keperluan pribadi atau komersial.

## Kontak

- Email: info@plantpower.id
- WhatsApp: 0812-3456-7890
- Instagram: @plantpower

---

**Plant Power** - Pusat Bibit Tanaman Berkualitas
