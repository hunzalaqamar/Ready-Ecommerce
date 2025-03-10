<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the shop from the brand.
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(TranslateUtility::class);
    }

    /**
     * Get the products from the brand.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Scope a query to only include active brands.
     */
    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1);
    }
}
