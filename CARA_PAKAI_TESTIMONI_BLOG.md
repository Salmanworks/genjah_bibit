# 📖 Cara Menggunakan Fitur Testimoni & Blog

## ✅ Status: SELESAI & SIAP DIGUNAKAN!

Fitur manajemen Testimoni dan Blog sudah lengkap dengan tampilan UI yang aesthetic dan modern!

---

## 🚀 Cara Akses

1. **Login sebagai Admin**
   - Email: `admin@genjah.com`
   - Password: `Admin03`

2. **Buka Admin Panel**
   - Setelah login, Anda akan masuk ke dashboard admin
   - Lihat sidebar di sebelah kiri

3. **Pilih Menu**
   - Klik **"Testimoni"** untuk kelola testimoni customer
   - Klik **"Blog & Artikel"** untuk kelola blog dan artikel

---

## 📝 Kelola Testimoni

### Tambah Testimoni Baru:
1. Klik menu **"Testimoni"** di sidebar
2. Klik tombol **"Tambah Testimoni"** (hijau, pojok kanan atas)
3. Isi form:
   - **Nama Customer** (wajib)
   - **Lokasi** (wajib) - contoh: Jakarta, Indonesia
   - **Foto Avatar** (opsional) - upload foto customer
   - **Rating** (wajib) - pilih 1-5 bintang
   - **Isi Testimoni** (wajib) - tulis testimoni customer
   - **Produk yang Dibeli** (opsional)
   - **Urutan Tampil** (opsional) - angka kecil = muncul lebih atas
   - **Aktifkan testimoni** - centang untuk langsung aktif
4. Klik **"Simpan Testimoni"**

### Edit Testimoni:
1. Di halaman list testimoni, klik tombol **"Edit"** pada testimoni yang ingin diubah
2. Ubah data yang diperlukan
3. Klik **"Update Testimoni"**

### Hapus Testimoni:
1. Di halaman list testimoni, klik tombol **"Hapus"** (merah)
2. Konfirmasi penghapusan
3. Testimoni akan dihapus beserta fotonya

### Filter & Search:
- **Search**: Cari berdasarkan nama atau lokasi customer
- **Filter Rating**: Tampilkan hanya testimoni dengan rating tertentu
- **Filter Status**: Tampilkan hanya yang aktif atau tidak aktif

---

## 📰 Kelola Blog & Artikel

### Tambah Blog Baru:
1. Klik menu **"Blog & Artikel"** di sidebar
2. Klik tombol **"Tambah Blog"** (hijau, pojok kanan atas)
3. Isi form:
   - **Judul Blog** (wajib)
   - **Kategori** (opsional) - contoh: Tips Berkebun, Panduan Perawatan
   - **Gambar Utama** (opsional) - upload gambar featured
   - **Ringkasan** (wajib) - ringkasan singkat untuk preview
   - **Konten Blog** (wajib) - isi lengkap blog (bisa pakai HTML)
   - **Tags** (opsional) - pisahkan dengan koma, contoh: bibit, tanaman, berkebun
   - **Tanggal Publish** (opsional) - kosongkan untuk pakai waktu sekarang
   - **Publish blog ini** - centang untuk langsung publish
   - **Jadikan blog featured** - centang untuk jadikan featured
4. Klik **"Simpan Blog"**

### Edit Blog:
1. Di halaman list blog, klik tombol **"Edit"** pada blog yang ingin diubah
2. Ubah data yang diperlukan
3. Klik **"Update Blog"**

### Hapus Blog:
1. Di halaman list blog, klik tombol **"Hapus"** (merah)
2. Konfirmasi penghapusan
3. Blog akan dihapus beserta gambarnya

### Filter & Search:
- **Search**: Cari berdasarkan judul atau kategori
- **Filter Status**: Tampilkan Published atau Draft
- **Filter Featured**: Tampilkan yang featured atau tidak

---

## 💡 Tips & Trik

### Testimoni:
- ✅ Upload foto customer untuk testimoni lebih menarik
- ⭐ Rating tinggi (4-5 bintang) lebih meyakinkan
- 📝 Testimoni yang spesifik lebih kredibel
- 🔢 Atur urutan tampil untuk testimoni terbaik di atas
- ✨ Aktifkan hanya testimoni berkualitas

### Blog:
- 📸 Gunakan gambar featured yang menarik (rekomendasi: 1200x630px)
- 📝 Tulis ringkasan yang menarik untuk meningkatkan klik
- 🏷️ Gunakan tags untuk memudahkan pencarian
- 🌟 Tandai blog terbaik sebagai featured
- 📅 Jadwalkan publish dengan set tanggal publish
- 💾 Simpan sebagai draft dulu untuk review sebelum publish

---

## 🎨 Fitur UI

### Testimoni:
- Card layout dengan foto avatar
- Rating bintang visual
- Badge status (Active/Inactive)
- Filter dan search yang mudah
- Preview foto saat upload
- Konfirmasi sebelum hapus

### Blog:
- Card layout dengan featured image
- Badge status (Published/Draft/Featured)
- Tags dan kategori
- View count dan reading time
- Filter dan search yang mudah
- Preview gambar saat upload
- Konfirmasi sebelum hapus

---

## ⚠️ Catatan Penting

1. **Upload Gambar**:
   - Format: JPG, PNG
   - Maksimal: 2MB per file
   - Gambar disimpan di folder `storage/app/public`

2. **Slug Blog**:
   - Otomatis dibuat dari judul
   - Digunakan untuk URL blog
   - Contoh: "Tips Berkebun" → "tips-berkebun"

3. **Tags**:
   - Pisahkan dengan koma
   - Contoh: `bibit, tanaman, berkebun`
   - Disimpan sebagai array

4. **Reading Time**:
   - Otomatis dihitung dari jumlah kata
   - Asumsi: 200 kata per menit

---

## 🎉 Selamat Menggunakan!

Fitur sudah lengkap dan siap digunakan. Jika ada pertanyaan atau masalah, silakan hubungi developer.

**Happy Managing! 🚀**
