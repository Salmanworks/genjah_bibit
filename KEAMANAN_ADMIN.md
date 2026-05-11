# 🔒 KEAMANAN AKSES ADMIN

## ✅ PROTEKSI YANG SUDAH DITERAPKAN

### 1. Middleware IsAdmin
File: `app/Http/Middleware/IsAdmin.php`

Middleware ini akan:
- ✅ Cek apakah user sudah login
- ✅ Cek apakah user memiliki `is_admin = true` di database
- ✅ Jika BUKAN admin → Redirect ke home dengan pesan error
- ✅ Jika admin → Izinkan akses

### 2. Route Protection
File: `routes/web.php`

Semua route admin dilindungi dengan 2 middleware:
```php
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Semua route admin di sini
});
```

**Artinya:**
- `auth` → User HARUS login dulu
- `admin` → User HARUS punya `is_admin = true`

### 3. Login Controller Logic
File: `app/Http/Controllers/Auth/LoginController.php`

**Untuk Login Biasa (Email + Password):**
- Jika user centang "Masuk sebagai Admin" DAN `is_admin = true` → Masuk ke Admin Dashboard
- Jika user TIDAK centang checkbox → Masuk ke Home (meskipun dia admin)
- Jika customer biasa centang checkbox → Tetap masuk ke Home (checkbox diabaikan)

**Untuk Login Google OAuth:**
- User baru dari Google → `is_admin = false` (OTOMATIS)
- Selalu redirect ke Home (TIDAK PERNAH ke admin)
- Tidak ada cara untuk jadi admin via Google OAuth

---

## 🛡️ SKENARIO KEAMANAN

### ❌ Skenario 1: Customer Biasa Coba Akses Admin
**Aksi:** Customer login → Ketik manual `http://127.0.0.1:8000/admin`

**Hasil:**
1. Middleware `IsAdmin` cek: `is_admin = false`
2. Redirect otomatis ke home
3. Muncul pesan: "Anda tidak memiliki akses ke halaman admin"

### ❌ Skenario 2: Customer Centang Checkbox Admin
**Aksi:** Customer login → Centang "Masuk sebagai Admin"

**Hasil:**
1. Login berhasil
2. Controller cek: `is_admin = false`
3. Checkbox diabaikan
4. Redirect ke home (bukan admin)

### ❌ Skenario 3: Login via Google Coba Jadi Admin
**Aksi:** User login via Google

**Hasil:**
1. User dibuat dengan `is_admin = false`
2. Redirect paksa ke home
3. Tidak ada cara untuk akses admin

### ✅ Skenario 4: Admin Asli Login
**Aksi:** Admin login → Centang "Masuk sebagai Admin"

**Hasil:**
1. Login berhasil
2. Controller cek: `is_admin = true` ✅
3. Redirect ke admin dashboard
4. Middleware izinkan akses

---

## 🔐 CARA MEMBUAT ADMIN

### Via Tinker (Recommended)
```bash
php artisan tinker
```

```php
// Buat admin baru
$admin = \App\Models\User::create([
    'name' => 'Admin Genjah',
    'email' => 'admin@genjah.com',
    'password' => bcrypt('password_kuat_123'),
    'is_admin' => true,
    'email_verified_at' => now(),
]);

// Atau ubah user existing jadi admin
$user = \App\Models\User::where('email', 'email@customer.com')->first();
$user->is_admin = true;
$user->save();
```

### Via Database (phpMyAdmin)
1. Buka tabel `users`
2. Cari user yang ingin dijadikan admin
3. Ubah kolom `is_admin` dari `0` → `1`
4. Save

---

## ⚠️ PENTING!

### ✅ AMAN:
- Customer biasa **TIDAK BISA** akses admin panel (dilindungi middleware)
- Google OAuth users **TIDAK BISA** jadi admin otomatis
- Hanya user dengan `is_admin = true` yang bisa akses admin
- Middleware cek di setiap request ke route admin

### ❌ JANGAN:
- Jangan hapus middleware `admin` dari route admin
- Jangan ubah logika di `IsAdmin.php`
- Jangan set `is_admin = true` untuk customer biasa
- Jangan share credentials admin

### 🔒 BEST PRACTICES:
- Gunakan password kuat untuk akun admin
- Jangan gunakan email yang mudah ditebak (contoh: admin@domain.com)
- Backup database secara berkala
- Monitor log akses admin
- Ganti password admin secara berkala

---

## 📝 TESTING KEAMANAN

### Test 1: Customer Coba Akses Admin
```
1. Login sebagai customer biasa
2. Buka browser → ketik: http://127.0.0.1:8000/admin
3. Hasil: Redirect ke home dengan error
```

### Test 2: Customer Centang Checkbox Admin
```
1. Logout
2. Login dengan email customer
3. Centang "Masuk sebagai Admin"
4. Hasil: Masuk ke home (bukan admin)
```

### Test 3: Admin Login Tanpa Centang Checkbox
```
1. Login dengan email admin
2. JANGAN centang checkbox
3. Hasil: Masuk ke home (bukan admin dashboard)
```

### Test 4: Admin Login dengan Centang Checkbox
```
1. Login dengan email admin
2. Centang "Masuk sebagai Admin"
3. Hasil: Masuk ke admin dashboard ✅
```

---

## 🚨 TROUBLESHOOTING

### Problem: "Anda tidak memiliki akses ke halaman admin"
**Solusi:** User bukan admin. Cek database kolom `is_admin` harus `1`

### Problem: Admin tidak bisa login
**Solusi:** Pastikan centang checkbox "Masuk sebagai Admin" saat login

### Problem: Middleware error
**Solusi:** 
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

---

## 📊 SUMMARY

| User Type | Login Method | Centang Checkbox | is_admin | Hasil |
|-----------|--------------|------------------|----------|-------|
| Customer | Email/Pass | ❌ | false | Home ✅ |
| Customer | Email/Pass | ✅ | false | Home ✅ |
| Customer | Google | - | false | Home ✅ |
| Admin | Email/Pass | ❌ | true | Home ✅ |
| Admin | Email/Pass | ✅ | true | Admin ✅ |

**KESIMPULAN:** Customer biasa **TIDAK MUNGKIN** masuk ke admin panel! 🔒
