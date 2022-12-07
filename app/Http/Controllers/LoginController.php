<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'Username' => 'required',
            'Sandi' => 'required',
        ]);

        $get_username = $request->Username;
        $get_password = $request->Sandi;

        //$datas = DB::table('admin')->where('username', 'LIKE', $get_username, 'AND', 'password', 'LIKE', $get_password)->first();
        //$datas = DB::table('admin')->where('username', '=', $get_username, 'AND', 'password', '=', $get_password)->first();
        $usr = DB::table('petugas')->where('Username', '=', $get_username)->first();
        $pas = DB::table('petugas')->where('Sandi', '=', $get_password)->first();

        if(is_null($usr) or is_null($pas))
        {
            return redirect()->route('login.create')->with('danger', 'Login gagal!');
        }  
        else{
            return redirect()->route('Home.index')->with('success', 'Selamat Datang!');
        }
    }
    public function search(Request $request)
        {
        $get_nama = $request->Nama_Costumer;
        $datas = DB::table('costumer')->where('deleted_at', NULL )->where('Nama_Costumer', 'LIKE', '%'.$get_nama.'%')->get();
        return view('costumer.index')->with('datas', $datas);
        }
}