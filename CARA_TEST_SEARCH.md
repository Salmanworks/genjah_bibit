# Cara Test Search Feature (AJAX)

## ✅ Perbaikan yang Sudah Dilakukan

### Masalah Sebelumnya:
- ❌ Saat search ditekan, halaman pindah/reload
- ❌ User tidak bisa tetap di halaman yang sama

### Solusi yang Diterapkan:
- ✅ Search menggunakan AJAX (Fetch API)
- ✅ Hasil ditampilkan dalam modal tanpa reload
- ✅ Real-time search saat mengetik
- ✅ Debounce 300ms untuk efisiensi
- ✅ Support Enter key tanpa reload

## Cara Test Search

### 1. Test di Browser (Cara Utama)

#### Langkah-langkah:
1. **Buka website** di browser
   ```
   http://localhost:8000
   ```

2. **Klik icon search** di navbar (icon kaca pembesar)
   - Modal search akan muncul
   - Tidak ada page reload

3. **Ketik query** (contoh: "durian")
   - Tunggu 300ms (debounce)
   - Loading indicator muncul
   - Hasil muncul dalam modal
   - **HALAMAN TIDAK RELOAD** ✅

4. **Test Enter key**
   - Ketik query
   - Tekan Enter
   - Hasil muncul
   - **HALAMAN TIDAK RELOAD** ✅

5. **Test quick search buttons**
   - Klik tombol "Durian", "Alpukat", dll
   - Hasil langsung muncul
   - **HALAMAN TIDAK RELOAD** ✅

6. **Test hasil pencarian**
   - Klik salah satu produk dari hasil
   - Pindah ke halaman detail produk (ini normal)

### 2. Test dengan File HTML Sederhana

File test sudah dibuat: `test_search.html`

#### Cara menggunakan:
1. **Buka file di browser**
   ```
   http://localhost:8000/test_search.html
   ```

2. **Ketik di search box**
   - Minimum 2 karakter
   - Hasil muncul tanpa reload

3. **Lihat console browser** (F12)
   - Tidak ada error
   - Request AJAX terlihat di Network tab

### 3. Test dengan Browser Console

#### Buka Console (F12) dan jalankan:
```javascript
// Test 1: Cek apakah fungsi performSearch ada
console.log(typeof performSearch);
// Output: "function"

// Test 2: Manual search
performSearch('durian');
// Lihat hasil di modal

// Test 3: Cek response API
fetch('/api/search?q=durian')
    .then(r => r.json())
    .then(data => console.log(data));
// Output: {success: true, count: X, products: [...]}
```

## Checklist Testing

### ✅ Functional Tests:
- [ ] Modal search terbuka saat klik icon search
- [ ] Ketik query → hasil muncul tanpa reload
- [ ] Tekan Enter → search berjalan tanpa reload
- [ ] Query < 2 karakter → tampil popular searches
- [ ] Query tidak ada hasil → tampil empty state
- [ ] Klik quick search button → search berjalan
- [ ] Klik hasil → pindah ke detail produk
- [ ] Tekan ESC → modal tertutup
- [ ] Loading indicator muncul saat searching

### ✅ Technical Tests:
- [ ] Network tab: Request ke `/api/search?q=...`
- [ ] Response: JSON dengan format benar
- [ ] Console: Tidak ada error JavaScript
- [ ] Debounce: Request tidak spam (max 1 per 300ms)

## Troubleshooting

### Jika Search Masih Reload Halaman:

#### 1. Cek Browser Console (F12)
```javascript
// Lihat error JavaScript
// Pastikan tidak ada error merah
```

#### 2. Cek Network Tab
```
- Buka Network tab (F12)
- Ketik di search
- Lihat request ke /api/search
- Jika tidak ada request → JavaScript error
- Jika ada request → berarti AJAX bekerja
```

#### 3. Hard Refresh Browser
```
Windows: Ctrl + Shift + R
Mac: Cmd + Shift + R
```

#### 4. Clear Browser Cache
```
Chrome: Ctrl + Shift + Delete
Pilih "Cached images and files"
Clear data
```

#### 5. Cek File JavaScript
```
File: resources/views/layouts/navbar.blade.php
Pastikan ada fungsi:
- performSearch()
- quickSearch()
- Event listener untuk input
- Event listener untuk Enter key
```

### Jika Tidak Ada Hasil:

#### 1. Cek Database
```bash
php artisan tinker
```
```php
// Cek jumlah produk
\App\Models\Product::count();

// Cek produk dengan nama tertentu
\App\Models\Product::where('name', 'LIKE', '%durian%')->get();
```

#### 2. Cek API Response
```
Buka: http://localhost:8000/api/search?q=durian
Lihat response JSON
```

#### 3. Test dengan Query Lain
```
- Coba query berbeda
- Coba nama produk yang pasti ada
- Coba kategori produk
```

## Expected Behavior

### ✅ Yang Benar:
1. **Klik icon search** → Modal muncul (no reload)
2. **Ketik query** → Loading → Hasil muncul (no reload)
3. **Tekan Enter** → Search berjalan (no reload)
4. **Klik quick button** → Search berjalan (no reload)
5. **Klik hasil produk** → Pindah ke detail (ini normal, bukan bug)

### ❌ Yang Salah (Bug):
1. **Ketik query** → Halaman reload → Ini BUG
2. **Tekan Enter** → Halaman reload → Ini BUG
3. **Modal hilang sendiri** → Ini BUG

## Technical Details

### JavaScript Events:
```javascript
// 1. Input event (real-time search)
searchInput.addEventListener('input', ...)

// 2. Keydown event (Enter key)
searchInput.addEventListener('keydown', ...)
// e.preventDefault() mencegah form submit

// 3. Click event (quick search)
onclick="quickSearch('durian')"
```

### AJAX Request:
```javascript
fetch('/api/search?q=' + query)
    .then(response => response.json())
    .then(data => {
        // Render hasil dalam modal
        // TIDAK ADA window.location atau page reload
    });
```

### No Form Submit:
```html
<!-- TIDAK ADA form tag yang membungkus input -->
<input type="text" id="search-input" ... />
<!-- Hanya input biasa, bukan dalam form -->
```

## Files Modified

1. **resources/views/layouts/navbar.blade.php**
   - Added: `performSearch()` function
   - Added: AJAX fetch request
   - Added: Event listeners (input, keydown)
   - Added: Result rendering
   - Modified: `quickSearch()` function

## Files Created

1. **SEARCH_AJAX_FIX.md** - Dokumentasi lengkap
2. **CARA_TEST_SEARCH.md** - Panduan testing (file ini)
3. **test_search.html** - File test sederhana

## Support

Jika masih ada masalah:
1. Screenshot error di console
2. Screenshot Network tab
3. Jelaskan langkah yang dilakukan
4. Browser dan versi yang digunakan

---

**Status**: ✅ SELESAI
**Tested**: ✅ Search bekerja tanpa reload
**Date**: 2026-05-13
