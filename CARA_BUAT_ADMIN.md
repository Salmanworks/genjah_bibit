# Cara Membuat User Admin

## Metode 1: Via Tinker (Recommended)

### Buat Admin Baru

```bash
php artisan tinker
```

Lalu jalankan:

```php
$admin = \App\Models\User::create([
    'name' => 'Admin Genjah',
    'email' => 'admin@genjah.com',
    'password' => bcrypt('password123'),
    'is_admin' => true,
    'email_verified_at' => now(),
]);
```

### Ubah User Existing Jadi Admin

```bash
php artisan tinker
```

Lalu jalankan:

```php
$user = \App\Models\User::where('email', 'email@user.com')->first();
$user->is_admin = true;
$user->save();
```

## Metode 2: Via Database

1. Buka phpMyAdmin atau database tool
2. Buka tabel `users`
3. Cari user yang ingin dijadikan admin
4. Ubah kolom `is_admin` dari `0` menjadi `1`
5. Save

## Metode 3: Via Seeder (Untuk Development)

Buat file seeder:

```bash
php artisan make:seeder AdminUserSeeder
```

Edit file `database/seeders/AdminUserSeeder.php`:

```php
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Genjah',
            'email' => 'admin@genjah.com',
            'password' => Hash::make('password123'),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);
    }
}
```

Jalankan seeder:

```bash
php artisan db:seed --class=AdminUserSeeder
```

## Login Sebagai Admin

1. Buka: `http://127.0.0.1:8000/masuk`
2. Masukkan email dan password admin
3. **Centang checkbox "Masuk sebagai Admin"**
4. Klik "MASUK SEKARANG"
5. Anda akan diarahkan ke Admin Dashboard

## Catatan Penting

- ✅ User yang login via Google **TIDAK BISA** jadi admin secara otomatis
- ✅ Hanya user dengan `is_admin = true` yang bisa akses admin panel
- ✅ Checkbox "Masuk sebagai Admin" hanya berfungsi untuk user yang sudah admin
- ✅ Jika non-admin centang checkbox admin, akan muncul error: "Anda tidak memiliki akses admin"

## Security

Untuk production:
- Ganti password default
- Gunakan password yang kuat
- Jangan share credentials admin
- Aktifkan 2FA jika memungkinkan
