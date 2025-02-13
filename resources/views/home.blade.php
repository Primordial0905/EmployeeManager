@extends('master')
@section('content')

<h2 class="page-title">Employee List</h2>
<div class="employee-container">
  @forelse($employees as $employee)
    <div class="card m-3 shadow" style="width: 18rem;">
      <img src="{{ $employee->image ? asset('images/'.$employee->image) : 'https://via.placeholder.com/150' }}" class="card-img-top" alt="Employee Image">
      <div class="card-body">
        <h5 class="card-title">{{$employee->name}}</h5>
        <p class="card-text">Umur: {{$employee->age}}</p>
        <p class="card-text">Alamat: {{$employee->address}}</p>
        <p class="card-text">Tlp: {{$employee->phone}}</p>
        <a href="{{'/edit/'.$employee->id}}" class="btn btn-primary">Edit</a>
        <form action ="{{'/delete/'.$employee->id}}" method ="post" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
    @empty
      <p>Tidak ada data karyawan.</p>
    @endforelse
</div>

@endsection