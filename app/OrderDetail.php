<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'product_id',
        'product_info',
        'quantity',
        'unit_price',
        'discount_amount',
        'size',
        'color',
        'brand'
    ];
}
