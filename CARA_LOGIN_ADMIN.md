# 🔐 CARA LOGIN SEBAGAI ADMIN

## ✅ AKUN ADMIN YANG TERSEDIA

Saat ini ada **2 akun admin** yang bisa digunakan:

### Admin 1:
- **Email:** `admin@plantpower.id`
- **Password:** (password yang Anda buat saat registrasi)
- **Status:** Admin ✅

### Admin 2:
- **Email:** `admin@genjah.com`
- **Password:** (password yang dibuat via tinker)
- **Status:** Admin ✅

---

## 📝 LANGKAH-LANGKAH LOGIN ADMIN

### 1. Buka Halaman Login
```
http://127.0.0.1:8000/masuk
```

### 2. Masukkan Kredensial Admin
- Email: `admin@plantpower.id` atau `admin@genjah.com`
- Password: password Anda

### 3. **PENTING: Centang Checkbox "Masuk sebagai Admin"**
⚠️ Jika tidak centang checkbox ini, Anda akan masuk ke home (bukan admin panel)

### 4. Klik "MASUK SEKARANG"

### 5. Hasil
✅ Anda akan masuk ke **Admin Panel** yang bagus
✅ Button "Admin" akan muncul di navbar
✅ Link "Dashboard" akan muncul di menu

---

## 🎯 TROUBLESHOOTING

### Problem 1: Button "Admin" Tidak Muncul di Navbar

**Penyebab:**
- Anda login dengan email yang bukan admin
- Kolom `is_admin` di database = `0` (false)

**Solusi:**
1. Logout
2. Login dengan email admin: `admin@plantpower.id` atau `admin@genjah.com`
3. Centang checkbox "Masuk sebagai Admin"

### Problem 2: Lupa Password Admin

**Solusi - Reset Password via Tinker:**
```bash
php artisan tinker
```

Lalu jalankan:
```php
$user = App\Models\User::where('email', 'admin@plantpower.id')->first();
$user->password = bcrypt('password_baru_123');
$user->save();
echo "Password berhasil direset!";
```

### Problem 3: Ingin Menambah Admin Baru

**Cara 1: Via Script (Mudah)**
1. Edit file `make_admin.php`
2. Ganti email di line 9:
   ```php
   $email = 'email@user.com'; // ← Email user yang ingin dijadikan admin
   ```
3. Jalankan:
   ```bash
   php make_admin.php
   ```

**Cara 2: Via Tinker**
```bash
php artisan tinker
```

Lalu jalankan:
```php
$user = App\Models\User::where('email', 'email@user.com')->first();
$user->is_admin = true;
$user->save();
```

**Cara 3: Via Database (phpMyAdmin)**
1. Buka tabel `users`
2. Cari user yang ingin dijadikan admin
3. Ubah kolom `is_admin` dari `0` → `1`
4. Save

---

## 📊 CEK DAFTAR ADMIN

Untuk melihat siapa saja yang admin, jalankan:
```bash
php check_users.php
```

Output:
```
=== DAFTAR USER ===

ID: 1
Name: Admin Plant Power
Email: admin@plantpower.id
Is Admin: YES ✅
---
ID: 2
Name: Super Admin
Email: admin@genjah.com
Is Admin: YES ✅
---
```

---

## ⚠️ PENTING!

### ✅ YANG BENAR:
1. Login dengan email admin
2. **CENTANG** checkbox "Masuk sebagai Admin"
3. Klik "MASUK SEKARANG"
4. Masuk ke admin panel ✅

### ❌ YANG SALAH:
1. Login dengan email admin
2. **TIDAK CENTANG** checkbox
3. Klik "MASUK SEKARANG"
4. Masuk ke home (bukan admin) ❌

---

## 🔒 KEAMANAN

### Customer Biasa:
- ❌ Tidak bisa centang checkbox admin (checkbox diabaikan)
- ❌ Tidak melihat button "Admin" di navbar
- ❌ Tidak bisa akses `/admin` (redirect ke home)

### Admin:
- ✅ Centang checkbox → Masuk ke admin panel
- ✅ Melihat button "Admin" di navbar
- ✅ Bisa akses semua halaman admin

---

## 🎉 SELESAI!

Sekarang Anda bisa login sebagai admin dengan:
- Email: `admin@plantpower.id` atau `admin@genjah.com`
- **Jangan lupa centang checkbox "Masuk sebagai Admin"!**

Button "Admin" akan muncul di navbar setelah login! 🚀
