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
        'discount',
        'start_at',
        'end_at',
        'description',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sale', 'sale_id', 'product_id');
    }
}
