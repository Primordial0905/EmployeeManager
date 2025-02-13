@extends('master')

@section('content')

<h2 class="page-title">Add New Employee</h2>
<form action="/create-employee" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light w-50 mx-auto">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Nama</label>
    <input type="text" name="Name" class="form-control" id="name" placeholder="Enter employee name">
  </div>
  <div class="mb-3">
    <label for="age" class="form-label">Umur</label>
    <input type="number" name="Age" class="form-control" id="age" placeholder="Enter employee age">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Alamat</label>
    <input type="text" name="Address" class="form-control" id="address" placeholder="Enter employee address">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Nomor Telepon</label>
    <input type="text" name="Phone" class="form-control" id="phone" placeholder="Start with 08, e.g., 08123456789">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Foto</label>
    <input type="file" name="Image" class="form-control" id="phone">
  </div>
  <button type="submit" class="btn btn-primary w-100">Add Employee</button>
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