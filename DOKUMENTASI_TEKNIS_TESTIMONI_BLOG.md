# 🔧 Dokumentasi Teknis - Fitur Testimoni & Blog

## Overview

Fitur manajemen Testimoni dan Blog untuk admin panel dengan full CRUD operations, image upload, filtering, dan search functionality.

---

## 📁 File Structure

```
app/
├── Http/Controllers/Admin/
│   ├── TestimonialController.php    # Controller testimoni
│   └── BlogController.php            # Controller blog
├── Models/
│   ├── Testimonial.php               # Model testimoni
│   └── Blog.php                      # Model blog

resources/views/admin/
├── testimonials/
│   ├── index.blade.php               # List testimoni
│   ├── create.blade.php              # Form tambah
│   └── edit.blade.php                # Form edit
└── blogs/
    ├── index.blade.php               # List blog
    ├── create.blade.php              # Form tambah
    └── edit.blade.php                # Form edit

routes/
└── web.php                           # Routes definition
```

---

## 🗄️ Database Schema

### Table: `testimonials`

```sql
CREATE TABLE testimonials (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    avatar VARCHAR(255) NULL,
    content TEXT NOT NULL,
    rating DECIMAL(2,1) NOT NULL,
    product_purchased VARCHAR(255) NULL,
    is_active BOOLEAN DEFAULT 1,
    sort_order INT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

### Table: `blogs`

```sql
CREATE TABLE blogs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT NOT NULL,
    content LONGTEXT NOT NULL,
    featured_image VARCHAR(255) NULL,
    gallery_images JSON NULL,
    author_id BIGINT UNSIGNED NOT NULL,
    category VARCHAR(255) NULL,
    tags JSON NULL,
    is_published BOOLEAN DEFAULT 0,
    is_featured BOOLEAN DEFAULT 0,
    view_count INT DEFAULT 0,
    published_at TIMESTAMP NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
);
```

---

## 🛣️ Routes

### Testimonials Routes
```php
Route::resource('admin/testimonials', TestimonialController::class)
    ->names('admin.testimonials')
    ->middleware(['auth', 'admin']);
```

**Generated Routes:**
- `GET /admin/testimonials` - index
- `GET /admin/testimonials/create` - create
- `POST /admin/testimonials` - store
- `GET /admin/testimonials/{id}/edit` - edit
- `PUT /admin/testimonials/{id}` - update
- `DELETE /admin/testimonials/{id}` - destroy

### Blogs Routes
```php
Route::resource('admin/blogs', BlogController::class)
    ->names('admin.blogs')
    ->middleware(['auth', 'admin']);
```

**Generated Routes:**
- `GET /admin/blogs` - index
- `GET /admin/blogs/create` - create
- `POST /admin/blogs` - store
- `GET /admin/blogs/{id}/edit` - edit
- `PUT /admin/blogs/{id}` - update
- `DELETE /admin/blogs/{id}` - destroy

---

## 🎯 Controller Methods

### TestimonialController

#### `index(Request $request)`
**Purpose**: List semua testimoni dengan filter dan search

**Query Parameters:**
- `search` - Search by name or location
- `rating` - Filter by rating (1-5)
- `status` - Filter by is_active (0/1)

**Returns**: View dengan paginated testimonials

**Example:**
```php
GET /admin/testimonials?search=jakarta&rating=5&status=1
```

#### `store(Request $request)`
**Purpose**: Simpan testimoni baru

**Validation Rules:**
```php
[
    'name' => 'required|string|max:255',
    'location' => 'required|string|max:255',
    'avatar' => 'nullable|image|max:2048',
    'content' => 'required|string',
    'rating' => 'required|numeric|min:1|max:5',
    'product_purchased' => 'nullable|string|max:255',
    'is_active' => 'boolean',
    'sort_order' => 'nullable|integer',
]
```

**File Upload:**
- Path: `storage/app/public/testimonials/`
- Disk: `public`

#### `update(Request $request, Testimonial $testimonial)`
**Purpose**: Update testimoni

**Features:**
- Same validation as store
- Delete old avatar if new one uploaded
- Preserve existing avatar if not changed

#### `destroy(Testimonial $testimonial)`
**Purpose**: Hapus testimoni

**Features:**
- Delete avatar file from storage
- Delete database record

---

### BlogController

#### `index(Request $request)`
**Purpose**: List semua blog dengan filter dan search

**Query Parameters:**
- `search` - Search by title or category
- `status` - Filter by is_published (0/1)
- `featured` - Filter by is_featured (0/1)

**Returns**: View dengan paginated blogs (with author relation)

**Example:**
```php
GET /admin/blogs?search=berkebun&status=1&featured=1
```

#### `store(Request $request)`
**Purpose**: Simpan blog baru

**Validation Rules:**
```php
[
    'title' => 'required|string|max:255',
    'excerpt' => 'required|string',
    'content' => 'required|string',
    'featured_image' => 'nullable|image|max:2048',
    'category' => 'nullable|string|max:255',
    'tags' => 'nullable|string',
    'is_published' => 'boolean',
    'is_featured' => 'boolean',
    'published_at' => 'nullable|date',
]
```

**Auto-Generated Fields:**
- `slug` - Generated from title using `Str::slug()`
- `author_id` - Current authenticated user
- `published_at` - Set to now() if published and not provided

**File Upload:**
- Path: `storage/app/public/blogs/`
- Disk: `public`

**Tags Processing:**
- Input: Comma-separated string
- Storage: JSON array
- Example: `"bibit, tanaman, berkebun"` → `["bibit", "tanaman", "berkebun"]`

#### `update(Request $request, Blog $blog)`
**Purpose**: Update blog

**Features:**
- Same validation as store
- Update slug if title changed
- Delete old featured_image if new one uploaded
- Preserve existing image if not changed
- Set published_at if published and not set

#### `destroy(Blog $blog)`
**Purpose**: Hapus blog

**Features:**
- Delete featured_image from storage
- Delete all gallery_images from storage
- Delete database record

---

## 🔍 Model Scopes & Attributes

### Testimonial Model

**Scopes:**
```php
// Get only active testimonials
Testimonial::active()->get();

// Get ordered testimonials (by sort_order, then created_at)
Testimonial::ordered()->get();
```

**Attributes:**
```php
// Get star rating as string (★★★★★)
$testimonial->star_rating;
```

**Casts:**
```php
'rating' => 'decimal:1',
'is_active' => 'boolean',
```

### Blog Model

**Relationships:**
```php
// Get blog author
$blog->author; // Returns User model
```

**Scopes:**
```php
// Get only published blogs
Blog::published()->get();

// Get only featured blogs
Blog::featured()->get();
```

**Attributes:**
```php
// Get estimated reading time in minutes
$blog->reading_time; // Returns integer (based on 200 words/min)
```

**Casts:**
```php
'gallery_images' => 'array',
'tags' => 'array',
'is_published' => 'boolean',
'is_featured' => 'boolean',
'published_at' => 'datetime',
```

---

## 🎨 View Components

### Common UI Elements

**Admin Card:**
```html
<div class="admin-card p-8 rounded-2xl">
    <!-- Content -->
</div>
```

**Form Input:**
```html
<input type="text" 
       name="field_name" 
       class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
```

**Button Primary:**
```html
<button class="px-8 py-4 bg-lime-500 hover:bg-lime-400 text-emerald-950 rounded-xl font-bold transition-all">
    Simpan
</button>
```

**Button Secondary:**
```html
<button class="px-8 py-4 bg-white/5 hover:bg-white/10 text-white rounded-xl font-bold transition-all">
    Batal
</button>
```

**Status Badge:**
```html
<!-- Active -->
<span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-bold">
    Active
</span>

<!-- Inactive -->
<span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-bold">
    Inactive
</span>
```

---

## 🖼️ Image Upload Implementation

### Preview on Upload:
```javascript
document.getElementById('imageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').innerHTML = 
                `<img src="${e.target.result}" class="w-full h-full object-cover">`;
        }
        reader.readAsDataURL(file);
    }
});
```

### Storage Path:
- Testimonials: `storage/app/public/testimonials/`
- Blogs: `storage/app/public/blogs/`
- Public URL: `public/storage/testimonials/` (via symlink)

### Display Image:
```blade
@if($item->image)
    <img src="{{ asset('storage/' . $item->image) }}" alt="...">
@endif
```

---

## 🔒 Security & Validation

### Middleware:
- `auth` - User must be authenticated
- `admin` - User must have `is_admin = true`

### File Upload Security:
- Validation: `image` rule (only images allowed)
- Max size: 2MB (2048 KB)
- Accepted formats: JPG, PNG, GIF, SVG, WEBP

### XSS Prevention:
- All user input escaped by Blade `{{ }}` syntax
- HTML content in blog stored as-is (admin trusted)

### CSRF Protection:
- All forms include `@csrf` token
- Laravel automatically validates

---

## 📊 Pagination

**Implementation:**
```php
$items = Model::query()->paginate(10);
```

**View:**
```blade
{{ $items->links('vendor.pagination.custom') }}
```

**Preserve Query Strings:**
```php
$items->appends(request()->query())->links();
```

---

## 🧪 Testing Endpoints

### Test Testimonials:

**List:**
```bash
curl -X GET "http://localhost:8000/admin/testimonials"
```

**Create:**
```bash
curl -X POST "http://localhost:8000/admin/testimonials" \
  -F "name=John Doe" \
  -F "location=Jakarta" \
  -F "content=Great product!" \
  -F "rating=5" \
  -F "is_active=1"
```

**Update:**
```bash
curl -X PUT "http://localhost:8000/admin/testimonials/1" \
  -F "name=John Doe Updated" \
  -F "rating=4"
```

**Delete:**
```bash
curl -X DELETE "http://localhost:8000/admin/testimonials/1"
```

### Test Blogs:

**List:**
```bash
curl -X GET "http://localhost:8000/admin/blogs"
```

**Create:**
```bash
curl -X POST "http://localhost:8000/admin/blogs" \
  -F "title=Tips Berkebun" \
  -F "excerpt=Panduan lengkap berkebun" \
  -F "content=Konten lengkap..." \
  -F "is_published=1"
```

---

## 🐛 Common Issues & Solutions

### Issue: Upload gambar tidak muncul
**Solution:**
```bash
php artisan storage:link
```

### Issue: Permission denied saat upload
**Solution:**
```bash
chmod -R 775 storage/app/public
chown -R www-data:www-data storage/app/public
```

### Issue: Slug duplicate error
**Solution:** Slug auto-generated dari title. Pastikan title unique atau modify slug generation logic.

### Issue: Tags tidak tersimpan
**Solution:** Tags harus comma-separated string, akan diconvert ke array otomatis.

---

## 🚀 Performance Optimization

### Eager Loading:
```php
// Blog with author
Blog::with('author')->get();
```

### Indexing:
```sql
-- Add indexes for better query performance
CREATE INDEX idx_testimonials_rating ON testimonials(rating);
CREATE INDEX idx_testimonials_is_active ON testimonials(is_active);
CREATE INDEX idx_blogs_is_published ON blogs(is_published);
CREATE INDEX idx_blogs_is_featured ON blogs(is_featured);
CREATE INDEX idx_blogs_slug ON blogs(slug);
```

### Caching:
```php
// Cache featured blogs
$featuredBlogs = Cache::remember('featured_blogs', 3600, function() {
    return Blog::featured()->published()->take(3)->get();
});
```

---

## 📝 Future Enhancements

### Potential Features:
- [ ] Rich text editor (TinyMCE/CKEditor) untuk blog content
- [ ] Image gallery untuk blog
- [ ] Comment system untuk blog
- [ ] Blog categories management
- [ ] Testimonial approval workflow
- [ ] Email notification saat blog published
- [ ] SEO meta tags untuk blog
- [ ] Social media sharing
- [ ] Analytics integration
- [ ] Export testimoni ke PDF/Excel

---

## 📚 References

- Laravel Documentation: https://laravel.com/docs
- Tailwind CSS: https://tailwindcss.com
- Heroicons: https://heroicons.com

---

**Last Updated:** May 10, 2026
**Version:** 1.0.0
**Author:** Development Team
