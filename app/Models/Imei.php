<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imei extends Model
{
    use HasFactory;

    protected $table = 'imeis';

    protected $fillable = [
        'imei', 
        'product_detail_id', 
    ];

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}
