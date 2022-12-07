<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class costumerController extends Controller
    {
        public function search_trash(Request $request)
        {
            $get_nama = $request->Nama_Costumer;
            $datas = DB::table('costumer')->where('deleted_at', '<>', '' )->where('Nama_Costumer', 'LIKE', '%'.$get_nama.'%')->get();
            return view('costumer.trash')
            ->with('datas', $datas);
        }
        public function restore($id)
        {
            DB::update('UPDATE costumer SET deleted_at=null WHERE id_Costumer = :id_Costumer', ['id_Costumer' => $id]);
            return redirect()->route('costumer.trash');
        }
        public function trash()
        {
            $datas = DB::select('select * from costumer where deleted_at is not null');
            return view('costumer.trash')
                ->with('datas', $datas);
        }
        public function hide($id)
        {
        DB::update('UPDATE costumer SET deleted_at=current_timestamp() WHERE id_Costumer = :id_Costumer', ['id_Costumer' => $id]);
        return redirect()->route('costumer.index')->with('success', 'Data Customer berhasil dihapus');
        }
        public function search(Request $request)
        {
        $get_nama = $request->Nama_Costumer;
        $datas = DB::table('costumer')->where('deleted_at', NULL )->where('Nama_Costumer', 'LIKE', '%'.$get_nama.'%')->get();
        return view('costumer.index')->with('datas', $datas);
        }
        public function index() {
            $datas = DB::select('select * from costumer where deleted_at is null');
    
            return view('costumer.index')
                ->with('datas', $datas);
        }
    
        public function create() {
            return view('costumer.add');
        }
    
        public function store(Request $request) {
            $request->validate([
                'id_Costumer' => 'required',
                'Nama_Costumer' => 'required',
                'Asal_Costumer' => 'required',
            ]);
    
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::insert('INSERT INTO costumer(id_Costumer, Nama_Costumer, Asal_Costumer) VALUES (:id_Costumer, :Nama_Costumer, :Asal_Costumer)',
            [
                'id_Costumer' => $request->id_Costumer,
                'Nama_Costumer' => $request->Nama_Costumer,
                'Asal_Costumer' => $request->Asal_Costumer,
                
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
    
            return redirect()->route('costumer.index')->with('success', 'Data Costumer Tersimpan');
        }
    
        public function edit($id) {
            $data = DB::table('costumer')->where('id_Costumer', $id)->first();
    
            return view('costumer.edit')->with('data', $data);
        }
    
        public function update($id, Request $request) {
            $request->validate([
                'id_Costumer' => 'required',
                'Nama_Costumer' => 'required',
                'Asal_Costumer' => 'required',
            ]);
    
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::update('UPDATE costumer SET id_Costumer = :id_Costumer, Nama_Costumer = :Nama_Costumer, Asal_Costumer= :Asal_Costumer WHERE id_Costumer = :id',
            [
                'id' => $id,
                'id_Costumer' => $request->id_Costumer,
                'Nama_Costumer' => $request->Nama_Costumer,
                'Asal_Costumer' => $request->Asal_Costumer,
            ]
            );
            return redirect()->route('costumer.index')->with('success', 'Data berhasil diubah');
        }
    
        public function delete($id) {
            // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
            DB::delete('DELETE FROM costumer WHERE id_Costumer = :id_Costumer', ['id_Costumer' => $id]);
    
            // Menggunakan laravel eloquent
            // Admin::where('id_Costumer', $id)->delete();
    
            return redirect()->route('costumer.index')->with('success', 'Data berhasil dihapus');
        }
    }
    
 
