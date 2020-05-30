<?php

namespace App\Http\Controllers;

use App\core\RepositoryInterface;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $repository;

    public function __construct(RepositoryInterface $orderRepository) {
        $this->repository = $orderRepository;
    }

    public function index($id = null) {
        if ($id) {
            $order = $this->repository->getById($id);
            return $order->toArray();
        }

        return $this->repository->getAll();
    }

    public function store(Request $request) {
        $request->validate([
            'orderNumber' => 'required|string|max:255',
            'customerName' => 'required|string|max:255',
            'invoiceNumber' => 'string|max:255', // for example 'qwF5dfg3514fds'
            'trackingNumber' => 'string|max:255',
            'shippingDate' => 'date',
            'deliveryDate' => 'date',
            'method' => 'integer'
        ]);

        $order = new Order($request->all());
        $order->owner = 1; //todo use current auth user
        $order->save();

        return $order->toArray();
    }

    public function addProduct($orderId, $productId) {
        $order = Order::findOrFail($orderId);
        $product = Product::findOrFail($productId);
        $order->products()->save($product);
        return response('', 200);
    }

    public function destroy($id) {
        Order::destroy($id);
        return response('', 204);
    }
}
