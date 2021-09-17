<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Template;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    //
        public function index()
    {
        return view('backoffice/apps/template.index');
    }

    public function GetTemplate(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start') ?? 0;
        $length = $request->get('length') ?? 10;
        $search = $request->input('search.value');

        if ($search) {
            $total = Template::count();
            $templateList = $this->searchTemplate($start, $length, $search); //supply start and length of the table data
        } else {
            $total = Product::count();
            $templateList = $this->getDataTemplate($start, $length); //supply start and length of the table data
        }

        $data = array(
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $templateList
        );

        echo json_encode($data);
    }

    protected function getDataTemplate($start, $length)
    {
        return Template::with(['Product'])->skip($start)->limit($length)->orderBy('created_at', 'DESC')->get();
    }

    protected function searchTemplate($start, $length, $search)
    {
        return Template::with(['Product'])->where('name_template', 'LIKE', '%' . $search . '%')
        ->orWhere('url', 'LIKE', '%' . $search . '%')
        ->orWhere('keterangan', 'LIKE', '%' . $search . '%')
        ->skip($start)->limit($length)->orderBy('created_at', 'DESC')->get();
    }

    public function ShowAddTemplate()
    {
        $product = Product::all();

        return view('backoffice/apps/template.tambah',compact('product'));
    }

    public function AddTemplate(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'name_template' => 'required',
            'url' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $findTemplate = Template::where('name_template', $request->name_template)->first();
        if ($findTemplate != null) {
            return redirect('superadmin/template')->with('alert-failed', 'Gagal, Template sudah tersimpan !');
        }

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Template::create($input);

        return redirect('superadmin/template')->with('alert-success', 'Data Template berhasil ditambahkan !');
    }

    public function EditTemplate($id)
    {   
        $template = Template::findOrFail($id);
        $product = Product::all();

        return view('backoffice/apps/template.edit',compact('template','product'));
    }

    public function UpdateTemplate(Request $request, $id)
    {
        $validateData = $request->validate([
            'product_id' => 'required',
            'name_template' => 'required',
            'url' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = request()->except(['_token']);
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        Template::whereId($id)->update($input);

        return redirect('superadmin/template')->with('alert-success', 'Data template berhasil diupdate !');
    }

    public function DeleteTemplate(Request $request)
    {
        $template = Template::findOrFail($request->segment(4));
        $template->delete();
        return redirect('superadmin/template')->with('alert-success', 'Data template berhasil dihapus !');
    }
}
