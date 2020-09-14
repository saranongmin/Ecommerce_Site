<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{


    protected $fillable = [
                            'product_id',
                            'product_info',
                            'mobile_number',
                            'quantity',
                            'unit_price',
                            'discount_amount',
                            'total_amount',
                            'size',
                            'color',
                            'brand',
                            'shipping_address',
                            'delivered_at',
                            'status',
                            'delivered_quantity',
                            'delivered_by'
                        ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    
}
