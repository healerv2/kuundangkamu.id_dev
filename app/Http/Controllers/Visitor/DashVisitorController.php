<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashVisitorController extends Controller
{
    //
     public function index()
     {
        return view('visitor/apps/dashboard');
     }
}
