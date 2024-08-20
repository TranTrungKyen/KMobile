<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sales';

    protected $fillable = [
        'start_at',
        'end_at',
        'description',
    ];

    public function productDetails()
    {
        return $this->belongsToMany(ProductDetail::class, 'product_detail_sale', 'sale_id', 'product_detail_id');
    }

    public function productDetailSale()
    {
        return $this->hasMany(ProductDetailSale::class);
    }
}
