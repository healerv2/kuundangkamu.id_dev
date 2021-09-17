<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Template;

class ListTemplateController extends Controller
{
    //
   public function index()
   {
      
        $template = Template::all();

        return view('visitor/apps/template',['template' => $template]);
   }
}
