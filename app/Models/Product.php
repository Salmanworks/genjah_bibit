<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'scientific_name',
        'description',
        'care_instructions',
        'price',
        'original_price',
        'stock',
        'size',
        'weight',
        'pot_size',
        'age_months',
        'origin',
        'main_image',
        'gallery_images',
        'is_featured',
        'is_bestseller',
        'is_new_arrival',
        'is_active',
        'view_count',
        'sold_count',
        'rating',
        'review_count',
    ];

    protected $casts = [
        'price'          => 'decimal:2',
        'original_price' => 'decimal:2',
        'rating'         => 'decimal:1',
        'gallery_images' => 'array',
        'is_featured'    => 'boolean',
        'is_bestseller'  => 'boolean',
        'is_new_arrival' => 'boolean',
        'is_active'      => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeBestsellers($query)
    {
        return $query->where('is_bestseller', true);
    }

    public function scopeNewArrivals($query)
    {
        return $query->where('is_new_arrival', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function getDiscountPercentageAttribute(): ?int
    {
        if ($this->original_price && $this->original_price > $this->price) {
            return round((($this->original_price - $this->price) / $this->original_price) * 100);
        }

        return null;
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getWhatsappMessageAttribute(): string
    {
        return "Halo, saya ingin memesan *{$this->name}*.\n\n" .
               "Harga: {$this->formatted_price}\n" .
               "Link produk: " . route('products.show', $this->slug);
    }

    public function getWhatsappLinkAttribute(): string
    {
        return whatsapp_link($this->whatsapp_message);
    }

    public function getImageUrlAttribute(): string
    {
        $path = $this->main_image;

        if (! $path) {
            return 'https://images.unsplash.com/photo-1614594975525-e45190c55d0b?w=800&q=80';
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return asset('storage/' . ltrim($path, '/'));
    }
}
