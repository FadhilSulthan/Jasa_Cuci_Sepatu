@extends('jasacuci.layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Tambah Data Sepatu</h5>
        <form method="post" action="{{ route('jasacuci.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_Sepatu" class="form-label">ID Sepatu</label>
                <input type="text" class="form-control" id="id_Sepatu" name="id_Sepatu">
            </div>
            <div class="mb-3">
                <label for="id_Costumer" class="form-label">ID Customer</label>
                <input type="text" class="form-control" id="id_Costumer" name="id_Costumer">
            </div>
            <div class="mb-3">
                <label for="Merk_Sepatu" class="form-label">Merk Sepatu</label>
                <input type="text" class="form-control" id="Merk_Sepatu" name="Merk_Sepatu">
            </div>
            <div class="mb-3">
                <label for="Ukuran_Sepatu" class="form-label">Ukuran Sepatu</label>
                <input type="text" class="form-control" id="Ukuran_Sepatu" name="Ukuran_Sepatu">
            </div>
            <div class="mb-3">
                <label for="Jenis_Paket" class="form-label">Jenis Paket</label>
                <input type="text" class="form-control" id="Jenis_Paket" name="Jenis_Paket">
            </div>
            <div class="mb-3">
                <label for="id_Admin" class="form-label">ID Admin</label>
                <input type="text" class="form-control" id="id_Admin" name="id_Admin">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop