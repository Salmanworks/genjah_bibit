<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'avatar',
        'content',
        'rating',
        'product_purchased',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'rating' => 'decimal:1',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function getStarRatingAttribute(): string
    {
        $fullStars = floor($this->rating);
        $halfStar = ($this->rating - $fullStars) >= 0.5;
        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
        
        $stars = str_repeat('★', $fullStars);
        if ($halfStar) {
            $stars .= '½';
        }
        $stars .= str_repeat('☆', $emptyStars);
        
        return $stars;
    }
}
