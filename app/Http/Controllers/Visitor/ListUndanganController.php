<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ListUndanganController extends Controller
{
    //

    public function index()
     {

        $product = Product::all();

        return view('visitor/apps/Undangan',['product' => $product]);
     }
}
