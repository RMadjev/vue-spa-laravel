<?php

namespace App\core\Order;

use App\Order;
use App\core\RepositoryInterface;

class OrderRepository implements RepositoryInterface {

    public function getById($id) {
        return Order::find($id);
    }

    public function getAll() {
        return Order::all();
    }
}
