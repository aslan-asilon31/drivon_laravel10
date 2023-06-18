<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'order_id',
        'payment_code',
        'name',
        'price',
        'status',
        'discount',
        'total_price',
        'quantity',
        'amount',
        'payment_method',
        'slug',
    ];
}
