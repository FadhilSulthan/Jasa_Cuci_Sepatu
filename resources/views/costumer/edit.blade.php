@extends('costumer.layout')

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

        <h5 class="card-title fw-bolder mb-3">Ubah Data</h5>

		<form method="post" action="{{ route('costumer.update', $data->id_Costumer) }}">
			@csrf
            <div class="mb-3">
                <label for="id_Costumer" class="form-label">ID Customer</label>
                <input type="text" class="form-control" id="id_Costumer" name="id_Costumer" value="{{ $data->id_Costumer }}">
            </div>
            <div class="mb-3">
                <label for="Nama_Costumer" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="Nama_Costumer" name="Nama_Costumer" value="{{ $data->Nama_Costumer }}">
            </div>
            <div class="mb-3">
                <label for="Asal_Costumer" class="form-label">Asal Customer</label>
                <input type="text" class="form-control" id="Asal_Costumer" name="Asal_Costumer" value="{{ $data->Asal_Costumer }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
			</div>
		</form>
	</div>
</div>

@stop