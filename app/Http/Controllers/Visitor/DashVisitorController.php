<?php

namespace App\Http\Controllers\Visitor;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashVisitorController extends Controller
{
    //
     public function index()
     {

        $product = Product::all();

        return view('visitor/apps/dashboard',compact('product'));
     }

}
