@extends('petugas.layout')
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
        <h5 class="card-title fw-bolder mb-3">Tambah Data Admin</h5>
        <form method="post" action="{{ route('petugas.store') }}">
            @csrf
            <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" id="Username" name="Username">
            </div>
            <div class="mb-3">
                <label for="Sandi" class="form-label">Sandi</label>
                <input type="text" class="form-control" id="Sandi" name="Sandi">
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