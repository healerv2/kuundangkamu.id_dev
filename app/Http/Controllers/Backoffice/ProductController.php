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

    public function ShowAddProduct()
    {
        return view('backoffice/apps/product.tambah');
    }

    public function AddProduct(Request $request)
    {
        $request->validate([
            'name_product' => 'required',
            'subharga' => 'required',
            'diskon' => 'required',
            'harga'=> 'required',
            'fitur'=> 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $findProduct = Product::where('name_product', $request->name_product)->first();
        if ($findProduct != null) {
            return redirect('superadmin/product')->with('alert-failed', 'Gagal, Product sudah tersimpan !');
        }
        // Product::create([
        //     'name_product' => $request->name_product,
        //     'subharga' => $request->subharga,
        //     'diskon' => $request->diskon,
        //     'harga' => $request->harga,
        //     'keterangan' => $request->keterangan
        // ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Product::create($input);

        return redirect('superadmin/product')->with('alert-success', 'Data product berhasil ditambahkan !');
    }

    public function EditProduct($id)
    {   
        $product = Product::findOrFail($id);
        return view('backoffice/apps/product.edit',compact('product'));
    }

    public function UpdateProduct(Request $request, $id)
    {
        $validateData = $request->validate([
            'name_product' => 'required',
            'subharga' => 'required',
            'diskon' => 'required',
            'fitur'=> 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = request()->except(['_token']);
        //$input = $request->all();
        // Product::whereId($id)->update([
        //    'name_product' => $request->name_product,
        //     'subharga' => $request->subharga,
        //     'diskon' => $request->diskon,
        //     'harga' => $request->harga,
        //     'keterangan' => $request->keterangan
        // ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        Product::whereId($id)->update($input);
         //$product->update($input);
        return redirect('superadmin/product')->with('alert-success', 'Data product berhasil diupdate !');
    }

    public function DeleteProduct(Request $request)
    {
        $product = Product::findOrFail($request->segment(4));
        $product->delete();
        return redirect('superadmin/product')->with('alert-success', 'Data product berhasil dihapus !');
    }
}
