<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class JasaCuciController extends Controller
{
    public function index() {
        $datas = DB::select('select * from jasa_cuci');

        return view('jasacuci.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('jasacuci.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_Sepatu' => 'required',
            'id_Costumer' => 'required',
            'Merk_Sepatu' => 'required',
            'Ukuran_Sepatu' => 'required',
            'Jenis_Paket' => 'required',
            'id_Admin' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO jasa_cuci(id_Sepatu, id_Costumer, Merk_Sepatu, Ukuran_Sepatu, Jenis_Paket, id_Admin) VALUES (:id_Sepatu, :id_Costumer, :Merk_Sepatu, :Ukuran_Sepatu, :Jenis_Paket, :id_Admin)',
        [
            'id_Sepatu' => $request->id_Sepatu,
            'id_Costumer' => $request->id_Costumer,
            'Merk_Sepatu' => $request->Merk_Sepatu,
            'Ukuran_Sepatu' => $request->Ukuran_Sepatu,
            'Jenis_Paket' => $request->Jenis_Paket,
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

        return redirect()->route('jasacuci.index')->with('success', 'Data sepatu Tersimpan');
    }

    public function edit($id) {
        $data = DB::table('jasa_cuci')->where('id_Sepatu', $id)->first();

        return view('jasacuci.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_Sepatu' => 'required',
            'id_Costumer' => 'required',
            'Merk_Sepatu' => 'required',
            'Ukuran_Sepatu' => 'required',
            'Jenis_Paket' => 'required',
            'id_Admin' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE jasa_cuci SET id_Sepatu = :id_Sepatu, id_Costumer = :id_Costumer, Merk_Sepatu = :Merk_Sepatu, Ukuran_Sepatu = :Ukuran_Sepatu, Jenis_Paket = :Jenis_Paket,  id_Admin = :id_Admin WHERE id_Sepatu = :id',
        [
            'id' => $id,
            'id_Sepatu' => $request->id_Sepatu,
            'id_Costumer' => $request->id_Costumer,
            'Merk_Sepatu' => $request->Merk_Sepatu,
            'Ukuran_Sepatu' => $request->Ukuran_Sepatu,
            'Jenis_Paket' => $request->Jenis_Paket,
            'id_Admin' => $request->id_Admin,
        ]
        );
        return redirect()->route('jasacuci.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM jasa_cuci WHERE id_Sepatu = :id_Sepatu', ['id_Sepatu' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_Costumer', $id)->delete();

        return redirect()->route('jasacuci.index')->with('success', 'Data berhasil dihapus');
    }
}