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

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'product_sale', 'product_id', 'sale_id');
    }
}
