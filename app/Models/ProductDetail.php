<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    protected $fillable = [
        'product_id', 
        'color_id', 
        'storage_id', 
        'qty', 
        'price', 
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    public function productComments()
    {
        return $this->hasMany(ProductComment::class);
    }

    public function imeis()
    {
        return $this->hasMany(Imei::class);
    }
}
