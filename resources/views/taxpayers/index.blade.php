@extends('layouts.app')

@section('content')
<h2>Add New Taxpayer</h2>
<form action="{{ route('taxpayer.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label>Name:</label>
    <input type="text" name="name" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Address:</label>
    <input type="text" name="address" class="form-control" required>
  </div>

  <div class="mb-3">
    <label>Email:</label>
    <input type="email" name="email" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
