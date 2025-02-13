@extends('master')

@section('content')

<h2 class="page-title">Edit Employee Data</h2>
<form action="{{ "/edit-employee/".$employee->id }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light w-50 mx-auto">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="Name" value="{{$employee->name}}" class="form-control" id="name">
  </div>
  <div class="mb-3">
    <label for="age" class="form-label">Umur</label>
    <input type="number" name="Age" value="{{$employee->age}}" class="form-control" id="age">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Alamat</label>
    <input type="text" name="Address" value="{{$employee->address}}" class="form-control" id="address">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Nomor Telepon</label>
    <input type="text" name="Phone" value="{{$employee->phone}}" class="form-control" id="phone">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Foto</label>
    <input type="file" name="Image" class="form-control" id="phone">
  </div>
  <button type="submit" class="btn btn-success w-100">Save Changes</button>
</form>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection