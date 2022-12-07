<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $datas = DB::table('jasa_cuci')
                ->join('costumer', 'costumer.id_Costumer', '=', 'jasa_cuci.id_Costumer')
                ->join('petugas', 'petugas.id_Admin', '=', 'jasa_cuci.id_Admin')
                ->get();

        return view('Home.index')
            ->with('datas', $datas);
    }
    public function search(Request $request)
    {
    $get_nama = $request->Nama_Costumer;
    $datas = DB::table('jasa_cuci')
                ->join('costumer', 'costumer.id_Costumer', '=', 'jasa_cuci.id_Costumer')
                ->join('petugas', 'petugas.id_Admin', '=', 'jasa_cuci.id_Admin')
                ->where('Nama_Costumer', 'LIKE', '%'.$get_nama.'%')
                ->orWhere('Asal_Costumer', 'LIKE', '%'.$get_nama.'%')
                ->get();
    return view('Home.index')->with('datas', $datas);
    }
}