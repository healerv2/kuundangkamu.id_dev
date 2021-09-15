<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ListTemplateController extends Controller
{
    //

    public function index()
     {

        $product = Product::all();

        return view('visitor/apps/template',['product' => $product]);
     }
}
