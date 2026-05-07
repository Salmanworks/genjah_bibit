<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Cara Merawat Bibit Durian Musang King Agar Cepat Berbuah',
                'slug' => 'cara-merawat-bibit-durian-musang-king',
                'excerpt' => 'Panduan lengkap merawat bibit durian Musang King dari penanaman hingga pemupukan agar cepat berbuah dengan kualitas premium.',
                'content' => '<p>Durian Musang King merupakan salah satu varietas durian paling populer dengan harga jual yang tinggi. Berikut adalah panduan lengkap merawat bibit durian Musang King agar cepat berbuah:</p>

<h3>1. Pemilihan Lokasi Tanam</h3>
<p>Pilih lokasi dengan sinar matahari penuh minimal 6 jam sehari. Durian Musang King membutuhkan tanah dengan drainase baik dan pH tanah 5.5-6.5.</p>

<h3>2. Penanaman</h3>
<p>Tanam bibit pada lubang dengan ukuran 60x60x60 cm. Campurkan tanah dengan kompos atau pupuk kandang dengan perbandingan 2:1.</p>

<h3>3. Pemupukan</h3>
<ul>
<li>Minggu 1-4: Pupuk NPK 16-16-16 sebanyak 50 gram per pohon</li>
<li>Bulan 2-6: Pupuk organic setiap bulan</li>
<li>Tahun ke-2: Tambahkan pupuk super phosphate</li>
</ul>

<h3>4. Pemangkasan</h3>
<p>Lakukan pemangkasan formasi pada tahun pertama untuk membentuk kanopi yang kuat. Pangkas cabang yang tumbuh ke dalam dan cabang yang sakit.</p>

<h3>5. Pengendalian Hama</h3>
<p>Waspadai hama kutu putih, kutu daun, dan penggerek buah. Gunakan pestisida organic atau kimia sesuai dosis anjuran.</p>

<p>Dengan perawatan yang tepat, bibit durian Musang King dapat mulai berbuah pada usia 3-4 tahun dengan hasil yang memuaskan.</p>',
                'featured_image' => 'blogs/durian-care.jpg',
                'category' => 'Perawatan Tanaman',
                'tags' => ['Durian', 'Musang King', 'Perawatan', 'Pemupukan'],
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Tips Memilih Bibit Alpukat Unggul untuk Kebun Anda',
                'slug' => 'tips-memilih-bibit-alpukat-unggul',
                'excerpt' => 'Pelajari cara memilih bibit alpukat berkualitas tinggi dan varietas terbaik yang sesuai dengan kondisi iklim Anda.',
                'content' => '<p>Alpukat merupakan tanaman buah yang semakin populer di Indonesia. Berikut tips memilih bibit alpukat unggul:</p>

<h3>Karakteristik Bibit Alpukat Berkualitas</h3>
<ol>
<li><strong>Akar sehat:</strong> Periksa akar, harus putih kecoklatan dan tidak busuk</li>
<li><strong>Daun segar:</strong> Warna hijau cerah, tidak menguning atau bercak</li>
<li><strong>Batang lurus:</strong> Bebas dari luka dan hama</li>
<li><strong>Media tanam:</strong> Masih menempel dengan baik di polybag</li>
</ol>

<h3>Varietas Alpukat Unggulan</h3>
<ul>
<li><strong>Aligator:</strong> Buah besar, creamy, cepat berbuah</li>
<li><strong>Miki/Mikel:</strong> Tahan penyakit, produktif</li>
<li><strong>Red Vietnam:</strong> Kulit merah eksotis, rasa premium</li>
<li><strong>Pluang:</strong> Varietas lokal unggulan</li>
</ul>

<h3>Kesesuaian Iklim</h3>
<p>Pilih varietas yang sesuai dengan ketinggian lokasi Anda:</p>
<ul>
<li>Dataran rendah (< 500 mdpl): Aligator, Miki, Red Vietnam</li>
<li>Dataran menengah (500-1000 mdpl): Semua varietas cocok</li>
<li>Dataran tinggi (> 1000 mdpl): Hindari Alpukat, pilih kopi atau jeruk</li>
</ul>

<p>Dengan memilih bibit yang tepat, Anda telah menentukan 50% keberhasilan budidaya alpukat Anda.</p>',
                'featured_image' => 'blogs/alpukat-tips.jpg',
                'category' => 'Tips & Trik',
                'tags' => ['Alpukat', 'Pemilihan Bibit', 'Budidaya'],
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Cara Menanam Jeruk Lemon dalam Pot untuk Pemula',
                'slug' => 'cara-menanam-jeruk-lemon-dalam-pot',
                'excerpt' => 'Panduan praktis menanam jeruk lemon dalam pot, cocok untuk Anda yang memiliki lahan terbatas di perkotaan.',
                'content' => '<p>Menanam jeruk lemon dalam pot adalah solusi sempurna untuk Anda yang tinggal di perkotaan dengan lahan terbatas. Berikut panduan lengkapnya:</p>

<h3>Persiapan</h3>
<ul>
<li>Pot dengan diameter minimal 40 cm</li>
<li>Media tanam: campuran tanah, kompos, dan pasir (2:1:1)</li>
<li>Bibit jeruk lemon berkualitas usia 6-12 bulan</li>
<li>Tempat dengan sinar matahari 6-8 jam</li>
</ul>

<h3>Langkah Menanam</h3>
<ol>
<li>Isi pot dengan media tanam hingga 2/3 penuh</li>
<li>Keluarkan bibit dari polybag dengan hati-hati</li>
<li>Letakkan di tengah pot, jangan terlalu dalam</li>
<li>Tambahkan media tanam hingga penuh, padatkan perlahan</li>
<li>Siram hingga basah</li>
</ol>

<h3>Perawatan Harian</h3>
<p><strong>Penyiraman:</strong> Siram setiap 2 hari, jangan sampai kering tapi juga jangan terlalu basah.</p>

<p><strong>Pemupukan:</strong> Beri pupuk NPK 16-16-16 setiap 2 minggu sebanyak 1 sendok makan.</p>

<p><strong>Pemangkasan:</strong> Pangkas cabang yang tumbuh ke dalam atau ke bawah untuk membentuk kanopi.</p>

<h3>Masalah Umum dan Solusi</h3>
<ul>
<li>Daun menguning: Berlebihan air atau kekurangan nitrogen</li>
<li>Daun keriting: Serangan kutu putih, semprot dengan insektisida</li>
<li>Buah rontok: Perubahan suhu ekstrem, pindahkan ke tempat teduh</li>
</ul>

<p>Dengan perawatan yang tepat, jeruk lemon dalam pot dapat berbuah dalam 1-2 tahun.</p>',
                'featured_image' => 'blogs/jeruk-lemon-pot.jpg',
                'category' => 'Urban Gardening',
                'tags' => ['Jeruk Lemon', 'Pot', 'Urban Gardening', 'Pemula'],
                'is_published' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Panduan Lengkap Menanam Mangga dalam Pot',
                'slug' => 'panduan-lengkap-menanam-mangga-dalam-pot',
                'excerpt' => 'Pelajari teknik menanam mangga dalam pot dari pemilihan bibit hingga perawatan agar cepat berbuah.',
                'content' => '<p>Mangga adalah buah favorit banyak orang. Dengan teknik yang tepat, Anda bisa menanam mangga dalam pot di rumah. Berikut panduan lengkapnya:</p>

<h3>Pemilihan Varietas</h3>
<p>Untuk tanam dalam pot, pilih varietas dwarf atau semi-dwarf:</p>
<ul>
<li>Harum Manis: Aroma kuat, rasa manis</li>
<li>Manalagi: Ukuran sedang, cocok pot</li>
<li>Red Emperor: Warna menarik</li>
</ul>

<h3>Persiapan Media dan Pot</h3>
<ul>
<li>Pot minimal 50 liter untuk dewasa</li>
<li>Media: Tanah, kompos, pasir, sekam (3:2:1:1)</li>
<li>Tambahkan batu bata pecah di dasar untuk drainase</li>
</ul>

<h3>Perawatan Intensif</h3>

<h4>Penyiraman</h4>
<p>Siram saat tanah mulai kering. Mangga tahan kekeringan tapi tetap butuh air teratur.</p>

<h4>Pemupukan</h4>
<ul>
<li>Pertumbuhan: Pupuk nitrogen tinggi</li>
<li>Pembungaan: Pupuk phosphor tinggi (Ponska)</li>
<li>Pembuahan: Pupuk kalium tinggi (KCl)</li>
</ul>

<h4>Stres Air untuk Pembuahan</h4>
<p>Untuk merangsang pembungaan, kurangi penyiraman 2-3 minggu saat musim kemarau, kemudian siram normal saat bunga muncul.</p>

<h3>Pemangkasan</h3>
<p>Pangkas untuk membentuk kanopi rendah (1.5-2 meter) agar mudah panen. Buang cabang yang tumbup ke dalam.</p>

<p>Dengan perawatan yang benar, mangga dalam pot bisa berbuah dalam 2-3 tahun!</p>',
                'featured_image' => 'blogs/mangga-pot.jpg',
                'category' => 'Urban Gardening',
                'tags' => ['Mangga', 'Pot', 'Urban Farming', 'Pemula'],
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Mengenal Varietas Kopi Arabika Terbaik Indonesia',
                'slug' => 'varietas-kopi-arabika-terbaik-indonesia',
                'excerpt' => 'Eksplorasi varietas kopi Arabika unggulan dari berbagai daerah di Indonesia dan karakteristik uniknya.',
                'content' => '<p>Indonesia adalah salah satu produsen kopi terbesar di dunia. Mari kita kenali varietas Arabika terbaik dari berbagai daerah:</p>

<h3>1. Kopi Gayo (Aceh)</h3>
<p><strong>Karakteristik:</strong> Body full, acidity low, notes chocolate, herbs, dan earthy.<br>
<strong>Ketinggian:</strong> 1200-1600 mdpl<br>
<strong>Proses:</strong> Mostly wet-hulled (Giling Basah)</p>

<h3>2. Kopi Toraja (Sulawesi Selatan)</h3>
<p><strong>Karakteristik:</strong> Complex flavor, spicy notes, hints of tobacco dan dark chocolate.<br>
<strong>Ketinggian:</strong> 1400-1800 mdpl<br>
<strong>Proses:</strong> Wet-hulled dan natural</p>

<h3>3. Kopi Kintamani (Bali)</h3>
<p><strong>Karakteristik:</strong> Clean cup, bright acidity, citrus notes, clean finish.<br>
<strong>Ketinggian:</strong> 1200-1500 mdpl<br>
<strong>Proses:</strong> Wet process dan natural</p>

<h3>4. Kopi Flores Bajawa</h3>
<p><strong>Karakteristik:</strong> Sweet, floral aroma, medium body, smooth finish.<br>
<strong>Ketinggian:</strong> 1200-1600 mdpl</p>

<h3>5. Kopi Papua Wamena</h3>
<p><strong>Karakteristik:</strong> Unique, rare, medium body, fruity notes.<br>
<strong>Ketinggian:</strong> 1400-2000 mdpl</p>

<h3>Tips Budidaya Arabika</h3>
<ul>
<li>Tanam di dataran tinggi minimal 1000 mdpl</li>
<li>Gunakan pohon pelindung (sengon, suren, dadap)</li>
<li>Naungan 50-70% saat tanaman muda</li>
<li>Pupuk organic untuk kualitas terbaik</li>
<li>Panen cherry merah penuh</li>
</ul>

<p>Setiap daerah memberikan profil rasa yang unik karena faktor tanah, iklim, dan proses pasca panen. Eksplorasi dan temukan favorit Anda!</p>',
                'featured_image' => 'blogs/kopi-arabika.jpg',
                'category' => 'Tanaman Perkebunan',
                'tags' => ['Kopi', 'Arabika', 'Budidaya', 'Indonesia'],
                'is_published' => true,
                'is_featured' => false,
            ],
        ];

        $author = User::first();

        foreach ($blogs as $index => $blog) {
            $blog['author_id'] = $author?->id;
            $blog['published_at'] = now()->subDays($index * 7);
            $blog['view_count'] = rand(100, 1500);
            Blog::create($blog);
        }
    }
}
