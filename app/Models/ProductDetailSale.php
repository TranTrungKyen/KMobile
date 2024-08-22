<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailSale extends Model
{
    use HasFactory;

    protected $table = 'product_detail_sale';

    protected $fillable = [
        'product_detail_id',
        'sale_id',
        'discount',
        'price',
    ];

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
