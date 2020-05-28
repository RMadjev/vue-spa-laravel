<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {
    use SoftDeletes;

    protected $fillable = [
        'order_number',
        'customer_name',
        'invoice_number',
        'tracking_number',
        'total_amount',
        'shipping_date',
        'delivery_date',
        'shipping_method',
        'owner'
    ];
}
