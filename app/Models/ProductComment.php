<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;

    protected $table = 'product_comments';

    protected $fillable = [
        'user_id',
        'product_detail_id',
        'message',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}
