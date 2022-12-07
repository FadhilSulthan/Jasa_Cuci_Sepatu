@extends('costumer.layout')
@section('content')
<a href="{{ route('Home.index') }}" type="button" class="btn btn rounded-3">Home</a>
<a href="{{ route('costumer.index') }}" type="button" class="btn btn rounded-3">Data Customer</a>
<a href="{{ route('jasacuci.index') }}" type="button" class="btn btn rounded-3">Data Sepatu</a>
<a href="{{ route('petugas.index') }}" type="button" class="btn btn rounded-3">Data Admin</a>
<div style="margin-top: 20px">
    <div style="margin-bottom: +45px">
        <div style="float:right">
            <a class="btn btn-outline-dark btn-sm" href="{{ route('costumer.trash') }}" type="button">Trash</a>
        </div>
    </div>
</div>
<h4 class="mt-5">Data Customer</h4>
<a href="{{ route('costumer.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<div class="form-search" style="float:right">
    <form action="{{ route('costumer.search') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="search" id="Nama_Costumer" name="Nama_Costumer" class="form-control" placeholder="Nama Customer">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Customer</th>
            <th>Nama Customer</th>
            <th>Asal Customer</th>
            <th>Pengaturan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_Costumer }}</td>
            <td>{{ $data->Nama_Costumer }}</td>
            <td>{{ $data->Asal_Costumer }}</td>
            <td>
                <a href="{{ route('costumer.edit', $data->id_Costumer) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <a href="{{ route('costumer.hide', $data->id_Costumer) }}" type="button"
                    class="btn btn-danger rounded-3">Hapus</a>
                </button>
        </tr>
        @endforeach
    </tbody>
</table>
@stop