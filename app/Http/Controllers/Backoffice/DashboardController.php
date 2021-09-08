<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // 
     public function index()
     {
      
         $total_user = User::where('level','visitor')->count();
         return view('backoffice/apps/dashboard',compact('total_user'));
     }
}
