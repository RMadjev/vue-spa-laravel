<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function index() {
        return Product::all();
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = abs($request->price);
        $product->save();

        return $product->toArray();
    }

    public function destroy($id) {
        Product::destroy($id);
        return response('', 204);
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer|min:0'
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return response('', 200);
    }
}
