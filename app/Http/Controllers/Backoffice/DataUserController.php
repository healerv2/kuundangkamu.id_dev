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
        return view('backoffice/apps/users.index');
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

    public function ShowAddUser()
    {
        return view('backoffice/apps/users.tambah');
    }

    public function AddUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password'=> 'required',
            'level'=> 'required'

        ]);
        $findUser = User::where('username', $request->username)->first();
        if ($findUser != null) {
            return redirect('superadmin/user')->with('alert-failed', 'Gagal, username sudah tersimpan !');
        }
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password),
            'level' => $request->level
        ]);
        return redirect('superadmin/user')->with('alert-success', 'Data user berhasil ditambahkan !');
    }

    public function EditUser($id)
    {   
        $users = User::findOrFail($id);
        return view('backoffice/apps/users.edit',compact('users'));
    }

    public function UpdateUser(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'level'=> 'required'
        ]);
        User::whereId($id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'level' => $request->level
        ]);
        return redirect('superadmin/user')->with('alert-success', 'Data user berhasil diupdate !');
    }

    public function DeleteUser(Request $request)
    {
        $users = User::findOrFail($request->segment(4));
        $users->delete();
        return redirect('superadmin/user')->with('alert-success', 'Data user berhasil dihapus !');
    }
}
