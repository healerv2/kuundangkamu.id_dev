<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    //
    public function index()
    {
        return view('backoffice/apps/visitor.index');
    }

    public function GetUser(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start') ?? 0;
        $length = $request->get('length') ?? 10;
        $search = $request->input('search.value');

        if ($search) {
            $total = User::count();
            $userList = $this->searchUser($start, $length, $search); //supply start and length of the table data
        } else {
            $total = User::count();
            $userList = $this->getDataUser($start, $length); //supply start and length of the table data
        }

        $data = array(
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $userList
        );

        echo json_encode($data);
    }

    protected function getDataUser($start, $length)
    {
        return User::skip($start)->limit($length)->orderBy('created_at', 'DESC')->get();
    }

    protected function searchUser($start, $length, $search)
    {
        return User::where('name', 'LIKE', '%' . $search . '%')
        ->orWhere('nip', 'LIKE', '%' . $search . '%')
        ->orWhere('jabatan', 'LIKE', '%' . $search . '%')
        ->orWhere('no_hp', 'LIKE', '%' . $search . '%')
        ->orWhere('email', 'LIKE', '%' . $search . '%')
        ->skip($start)->limit($length)->orderBy('created_at', 'DESC')->get();
    }
}
