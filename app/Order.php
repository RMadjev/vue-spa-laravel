<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {
    use SoftDeletes;

    public $timestamps = false;

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

    public function products() {
        return $this->belongsToMany(Product::class, OrderProducts::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function owner() {
        return $this->user();
    }
}
