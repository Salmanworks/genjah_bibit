# ✅ FIX: Dark Sections Text Visibility

## 📋 Masalah yang Ditemukan

User melaporkan bahwa teks di beberapa section tidak terlihat:
- "Bingung Pilih Bibit Tanaman?"
- "Mengapa Memilih Kami?"
- "Keunggulan Kami"
- "Arah & Tujuan"
- "Mulai Sekarang"
- "Butuh Bantuan?"

**Root Cause:** File `category-fix.css` mengoverride SEMUA section dengan background terang, termasuk section yang seharusnya memiliki background gelap.

### CSS yang Bermasalah:

```css
/* TERLALU AGRESIF - Mengoverride SEMUA section */
section {
    background: #F4F1EA !important;
}

section[class*="bg-emerald"] {
    background: linear-gradient(135deg, #F4F1EA 0%, #EBE6DC 100%) !important;
}
```

Ini menyebabkan:
1. Section dengan `background: #3d5c38` (gelap) menjadi terang
2. Teks putih (`color: #ffffff`) tidak terlihat di background terang
3. Section "Mengapa Memilih Kami" dan "Bingung Pilih" rusak

---

## ✅ Solusi yang Diterapkan

### 1. **Scope CSS ke Halaman Category Saja**

Menambahkan prefix `body.category-page` ke semua selector di `category-fix.css`:

**Sebelum:**
```css
section {
    background: #F4F1EA !important;
}

.bg-emerald-900 {
    background: linear-gradient(135deg, #F4F1EA 0%, #EBE6DC 100%) !important;
}
```

**Sesudah:**
```css
body.category-page section[class*="bg-emerald"] {
    background: linear-gradient(135deg, #F4F1EA 0%, #EBE6DC 100%) !important;
}

body.category-page .bg-emerald-900 {
    background: linear-gradient(135deg, #F4F1EA 0%, #EBE6DC 100%) !important;
}
```

### 2. **Tambah Body Class Support di Layout**

**File:** `resources/views/layouts/main.blade.php`

**Sebelum:**
```html
<body class="min-h-screen bg-nature">
```

**Sesudah:**
```html
<body class="min-h-screen bg-nature @yield('body-class')">
```

### 3. **Tambah Body Class di Category Page**

**File:** `resources/views/pages/categories/show.blade.php`

**Sebelum:**
```php
@extends('layouts.main')

@section('title', $category->name . ' - ' . setting('store_name', 'Plant Power'))

@section('content')
```

**Sesudah:**
```php
@extends('layouts.main')

@section('title', $category->name . ' - ' . setting('store_name', 'Plant Power'))

@section('body-class', 'category-page')

@section('content')
```

---

## 📁 File yang Dimodifikasi

### 1. `public/css/category-fix.css`
**Perubahan:**
- Menambahkan prefix `body.category-page` ke SEMUA selector
- Menghapus rule global `section { background: #F4F1EA !important; }`
- CSS sekarang HANYA berlaku untuk halaman category

**Jumlah Perubahan:**
- 50 insertions(+)
- 53 deletions(-)

### 2. `resources/views/layouts/main.blade.php`
**Perubahan:**
- Menambahkan `@yield('body-class')` ke tag `<body>`
- Memungkinkan setiap halaman menambahkan class custom ke body

### 3. `resources/views/pages/categories/show.blade.php`
**Perubahan:**
- Menambahkan `@section('body-class', 'category-page')`
- Mengaktifkan CSS category-fix hanya untuk halaman ini

---

## 🎯 Hasil

### Sebelum Fix:
- ❌ Section "Mengapa Memilih Kami" → Background terang, teks putih tidak terlihat
- ❌ Section "Bingung Pilih" → Background terang, teks putih tidak terlihat
- ❌ Section "Keunggulan Kami" → Background terang, teks putih tidak terlihat
- ❌ Footer → Background terang, teks putih tidak terlihat
- ✅ Category page → Background terang (sesuai keinginan)

### Sesudah Fix:
- ✅ Section "Mengapa Memilih Kami" → Background gelap (#3d5c38), teks putih terlihat jelas
- ✅ Section "Bingung Pilih" → Background gelap (#3d5c38), teks putih terlihat jelas
- ✅ Section "Keunggulan Kami" → Background gelap (#3d5c38), teks putih terlihat jelas
- ✅ Footer → Background gradient gelap, teks putih terlihat jelas
- ✅ Category page → Background terang (tetap sesuai keinginan)

---

## 🔍 Section yang Diperbaiki

### 1. **Mengapa Memilih Kami** (Home Page)
```html
<section style="background: #3d5c38;">
    <h2 style="color:#ffffff;">Mengapa Memilih</h2>
    <h2 style="color:#c5e87a;">Kami?</h2>
    <p style="color:rgba(255,255,255,0.4);">...</p>
</section>
```
✅ Background gelap tetap gelap, teks putih terlihat

### 2. **Bingung Pilih Bibit Tanaman** (Home Page)
```html
<section style="background: #3d5c38;">
    <h2 style="color:#ffffff;">Bingung Pilih</h2>
    <h2 style="color:#c5e87a;">Bibit Tanaman?</h2>
    <p style="color:rgba(255,255,255,0.45);">...</p>
</section>
```
✅ Background gelap tetap gelap, teks putih terlihat

### 3. **Footer**
```html
<footer style="background: linear-gradient(135deg, #5A7058 0%, #4a5f48 100%);">
    <h4 class="text-white">Link Cepat</h4>
    <a class="text-white">Beranda</a>
</footer>
```
✅ Background gradient gelap tetap gelap, teks putih terlihat

---

## 🚀 Deployment

### Git Commit
```bash
git add -A
git commit -m "fix: scope category-fix.css to only category pages to prevent breaking dark sections"
git push origin main
```

### Commit Hash
`39056e6`

### Files Changed
- 3 files changed
- 50 insertions(+)
- 53 deletions(-)

---

## 📝 Lesson Learned

### Masalah dengan Global CSS Override:
```css
/* ❌ JANGAN LAKUKAN INI */
section {
    background: #F4F1EA !important;
}
```

**Kenapa buruk:**
- Mengoverride SEMUA section di SEMUA halaman
- Merusak design yang sudah benar
- Sulit di-debug karena terlalu global

### Solusi yang Benar:
```css
/* ✅ LAKUKAN INI */
body.specific-page section {
    background: #F4F1EA !important;
}
```

**Kenapa baik:**
- Hanya berlaku untuk halaman tertentu
- Tidak merusak halaman lain
- Mudah di-maintain dan di-debug

---

## 🧪 Testing Checklist

- ✅ Home page: Section "Mengapa Memilih Kami" → Background gelap, teks terlihat
- ✅ Home page: Section "Bingung Pilih" → Background gelap, teks terlihat
- ✅ Home page: Section "Keunggulan Kami" → Background gelap, teks terlihat
- ✅ Footer: Background gradient gelap, teks terlihat
- ✅ Category page: Background terang, teks gelap terlihat
- ✅ Product page: Tidak terpengaruh
- ✅ About page: Tidak terpengaruh
- ✅ Contact page: Tidak terpengaruh

---

## 💡 Best Practices

### 1. **Scope CSS dengan Body Class**
```css
/* Gunakan body class untuk scope CSS */
body.page-name .element {
    /* styles */
}
```

### 2. **Hindari Global Override**
```css
/* ❌ Jangan */
section { background: white !important; }

/* ✅ Lakukan */
body.specific-page section { background: white !important; }
```

### 3. **Test di Semua Halaman**
Setelah menambahkan CSS baru, test di:
- Home page
- Category page
- Product page
- About page
- Contact page
- Blog page

---

**Tanggal:** 11 Mei 2026  
**Developer:** Kiro AI Assistant  
**Status:** ✅ Selesai & Deployed
