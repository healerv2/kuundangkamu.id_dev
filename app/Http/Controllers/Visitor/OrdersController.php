<?php

namespace App\Http\Controllers\Visitor;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //

    public function Order()
    {
        return view('visitor/apps/order');
    }

    public function AddOrders($id)
    {
        $product = Product::find($id);

        if(!$product) {
            abort(404);
        }
        $order = session()->get('order');

        if(!$order) {
            $order = [
                    $id => [
                        "name_product" => $product->name_product,
                        "quantity" => 1,
                        "harga" => $product->harga
                    ]
            ];
            session()->put('order', $order);

            return redirect('/visitor/order')->with('success', 'Paket added to order successfully!');
        }

        if(isset($order[$id])) {

            $order[$id]['quantity']++;

            session()->put('order', $order);

            return redirect('/visitor/order')->with('success', 'Paket added to order successfully!');

        }

        $order[$id] = [
            "name_product" => $product->name_product,
            "quantity" => 1,
            "harga" => $product->harga
        ];

        session()->put('order', $order);

        return redirect('/visitor/order')->with('success', 'Paket added to order successfully!');
    }
}
