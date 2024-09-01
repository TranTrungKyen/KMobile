<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'description',
        'title',
        'active',
    ];

    protected $appends = [
        'price_original', 
        'price_current', 
        'image',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getPriceOriginalAttribute()
    {
        return $this->productDetails()->min('price');
    }

    public function getPriceCurrentAttribute()
    {
        $minPriceDetail = $this->productDetails()->orderBy('price', 'asc')->first();
        if(empty($minPriceDetail->productDetailSale)){
            return null;
        }
        $productDetailSaleLastest = $minPriceDetail->productDetailSale()->orderBy('updated_at', 'desc')->first();
        // Check sale deleted or active none
        if(empty($productDetailSaleLastest->sale) || !$productDetailSaleLastest->sale->active) {
            return null;
        }

        return $productDetailSaleLastest->price;
    }

    public function getImageAttribute()
    {
        return $this->images()->first()->path ?? '';
    }
}
