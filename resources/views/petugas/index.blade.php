@extends('petugas.layout')
@section('content')
<a href="{{ route('Home.index') }}" type="button" class="btn btn rounded-3">Home</a>
<a href="{{ route('costumer.index') }}" type="button" class="btn btn rounded-3">Data Customer</a>
<a href="{{ route('jasacuci.index') }}" type="button" class="btn btn rounded-3">Data Sepatu</a>
<a href="{{ route('petugas.index') }}" type="button" class="btn btn rounded-3">Data Admin</a>
<h4 class="mt-5">Data Admin</h4>
<a href="{{ route('petugas.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>Username</th>
            <th>Sandi</th>
            <th>ID Admin</th>
            <th>Pengaturan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->Username }}</td>
            <td>{{ $data->Sandi }}</td>
            <td>{{ $data->id_Admin }}</td>
            <td>
                <a href="{{ route('petugas.edit', $data->id_Admin) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_Admin }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_Admin }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('petugas.delete', $data->id_Admin) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop