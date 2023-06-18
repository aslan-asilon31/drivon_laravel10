<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = [
    //     'number',
    //     'total_price',
    //     'payment_status',
    //     'snap_token',
    // ];
}
