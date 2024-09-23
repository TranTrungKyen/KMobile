<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imei extends Model
{
    use HasFactory;

    protected $table = 'imeis';

    protected $primaryKey = 'imei';

    public $incrementing = false;

    protected $fillable = [
        'imei',
        'product_detail_id',
        'is_sold',
        'order_detail_id',
    ];

    protected $casts = [
        'is_sold' => 'boolean',
    ];

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class);
    }
}
