@extends('Home.layout')
@section('content')

<a href="{{ route('Home.index') }}" type="button" class="btn btn rounded-3">Home</a>
<a href="{{ route('costumer.index') }}" type="button" class="btn btn rounded-3">Data Customer</a>
<a href="{{ route('jasacuci.index') }}" type="button" class="btn btn rounded-3">Data Sepatu</a>
<a href="{{ route('petugas.index') }}" type="button" class="btn btn rounded-3">Data Admin</a>
<a href="{{ route('login.create') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>

<h4 class="mt-5">Data Jasa Cuci Sepatu</h4>
<div class="form-search" style="float:right">
    <form action="{{ route('Home.search') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="search" id="Nama_Costumer" name="Nama_Costumer" class="form-control" placeholder="Nama Costumer">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
</div>
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Customer</th>
            <th>Nama Customer</th>
            <th>Asal Customer</th>
            <th>Merk Sepatu</th>
            <th>Ukuran Sepatu</th>
            <th>Jenis Paket</th>
            <th>Admin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_Costumer }}</td>
            <td>{{ $data->Nama_Costumer }}</td>
            <td>{{ $data->Asal_Costumer }}</td>
            <td>{{ $data->Merk_Sepatu }}</td>
            <td>{{ $data->Ukuran_Sepatu }}</td>
            <td>{{ $data->Jenis_Paket }}</td>
            <td>{{ $data->Username }}</td>

        </tr>
        @endforeach
    </tbody>
</table>
@stop