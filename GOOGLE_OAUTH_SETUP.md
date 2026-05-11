# Setup Google OAuth Login

## Langkah 1: Install Laravel Socialite

Jalankan command berikut di terminal:

```bash
composer require laravel/socialite
```

## Langkah 2: Buat Google OAuth Credentials

1. Buka [Google Cloud Console](https://console.cloud.google.com/)
2. Buat project baru atau pilih project yang sudah ada
3. Aktifkan **Google+ API**:
   - Pergi ke "APIs & Services" > "Library"
   - Cari "Google+ API"
   - Klik "Enable"

4. Buat OAuth 2.0 Credentials:
   - Pergi ke "APIs & Services" > "Credentials"
   - Klik "Create Credentials" > "OAuth client ID"
   - Pilih "Web application"
   - Isi nama aplikasi: "Genjah Rumah Bibit"
   - **Authorized JavaScript origins**:
     ```
     http://127.0.0.1:8000
     http://localhost:8000
     ```
   - **Authorized redirect URIs**:
     ```
     http://127.0.0.1:8000/auth/google/callback
     http://localhost:8000/auth/google/callback
     ```
   - Klik "Create"

5. Copy **Client ID** dan **Client Secret**

## Langkah 3: Update File .env

Tambahkan credentials Google OAuth ke file `.env`:

```env
GOOGLE_CLIENT_ID=your-client-id-here
GOOGLE_CLIENT_SECRET=your-client-secret-here
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback
```

**PENTING**: Ganti `your-client-id-here` dan `your-client-secret-here` dengan credentials yang Anda dapatkan dari Google Cloud Console.

## Langkah 4: Clear Config Cache

Jalankan command berikut untuk clear cache:

```bash
php artisan config:clear
php artisan cache:clear
```

## Langkah 5: Test Login

1. Jalankan server: `php artisan serve`
2. Buka browser: `http://127.0.0.1:8000/masuk`
3. Klik tombol "Masuk dengan Google"
4. Login dengan akun Google Anda
5. Setelah berhasil, Anda akan diarahkan ke halaman home

## Troubleshooting

### Error: "redirect_uri_mismatch"
- Pastikan redirect URI di Google Cloud Console sama persis dengan yang ada di `.env`
- Pastikan tidak ada trailing slash di akhir URL

### Error: "Client ID not found"
- Pastikan sudah menambahkan `GOOGLE_CLIENT_ID` dan `GOOGLE_CLIENT_SECRET` di `.env`
- Jalankan `php artisan config:clear`

### Error: "Google+ API has not been used"
- Aktifkan Google+ API di Google Cloud Console
- Tunggu beberapa menit untuk propagasi

## Production Setup

Untuk production, update:

1. **Authorized JavaScript origins**:
   ```
   https://yourdomain.com
   ```

2. **Authorized redirect URIs**:
   ```
   https://yourdomain.com/auth/google/callback
   ```

3. Update `.env`:
   ```env
   GOOGLE_REDIRECT_URI=https://yourdomain.com/auth/google/callback
   ```

## Fitur yang Sudah Diimplementasi

✅ Login dengan Google
✅ Auto-create user baru dari Google
✅ Auto-verify email untuk user Google
✅ Link Google account ke existing user
✅ Redirect ke home setelah login berhasil
✅ Error handling untuk gagal login

## Database Changes

Migration sudah dibuat untuk menambahkan kolom `google_id` ke tabel `users`:
- File: `database/migrations/2026_05_10_045112_add_google_id_to_users_table.php`
- Kolom: `google_id` (nullable string)

Migration sudah dijalankan dengan command `php artisan migrate`.
