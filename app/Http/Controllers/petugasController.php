<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class petugasController extends Controller
{
    public function index() {
        $datas = DB::select('select * from petugas');

        return view('petugas.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('petugas.add');
    }

    public function store(Request $request) {
        $request->validate([
            'Username' => 'required',
            'Sandi' => 'required',
            'id_Admin' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO petugas(Sandi, Username, id_Admin) VALUES (:Sandi, :Username, :id_Admin)',
        [
            'Username' => $request->Username,
            'Sandi' => $request->Sandi,
            'id_Admin' => $request->id_Admin,
            
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::create([
        //     'id_Costumer' => $request->id_Costumer,
        //     'Nama_Costumer' => $request->Nama_Costumer,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('petugas.index')->with('success', 'Data petugas Tersimpan');
    }

    public function edit($id) {
        $data = DB::table('petugas')->where('id_Admin', $id)->first();

        return view('petugas.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'Username' => 'required',
            'Sandi' => 'required',
            'id_Admin' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE petugas SET Sandi = :Sandi, Username = :Username, id_Admin= :id_Admin WHERE id_Admin = :id',
        [
            'id' => $id,
            'Username' => $request->Username,
            'Sandi' => $request->Sandi,
            'id_Admin' => $request->id_Admin,
        ]
        );
        return redirect()->route('petugas.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM petugas WHERE id_Admin = :id_Admin', ['id_Admin' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_Costumer', $id)->delete();

        return redirect()->route('petugas.index')->with('success', 'Data berhasil dihapus');
    }
}