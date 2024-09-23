<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'address',
        'user_name',
        'phone',
        'email',
        'note',
        'status',
    ];

    protected $appends = [
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->orderDetails->sum(function ($orderDetail) {
            return $orderDetail->total_price;
        });
    }
}
