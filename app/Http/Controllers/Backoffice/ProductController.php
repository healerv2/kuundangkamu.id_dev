<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
     public function index()
    {
        return view('backoffice/apps/product.index');
    }

    public function GetProduct(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start') ?? 0;
        $length = $request->get('length') ?? 10;
        $search = $request->input('search.value');

        if ($search) {
            $total = Product::count();
            $productList = $this->searchProduct($start, $length, $search); //supply start and length of the table data
        } else {
            $total = Product::count();
            $productList = $this->getDataProduct($start, $length); //supply start and length of the table data
        }

        $data = array(
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $productList
        );

        echo json_encode($data);
    }

    protected function getDataProduct($start, $length)
    {
        return Product::skip($start)->limit($length)->orderBy('created_at', 'DESC')->get();
    }

    protected function searchProduct($start, $length, $search)
    {
        return Product::where('name_product', 'LIKE', '%' . $search . '%')
        ->orWhere('subharga', 'LIKE', '%' . $search . '%')
        ->orWhere('diskon', 'LIKE', '%' . $search . '%')
        ->orWhere('harga', 'LIKE', '%' . $search . '%')
        ->orWhere('keterangan', 'LIKE', '%' . $search . '%')
        ->skip($start)->limit($length)->orderBy('created_at', 'DESC')->get();
    }
}
