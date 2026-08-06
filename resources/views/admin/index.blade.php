@extends('layouts.app')

@section('content')
<h2>Taxpayers</h2>
<a href="{{ route('taxpayer.create') }}" class="btn btn-primary mb-3">Add Taxpayer</a>

<table class="table table-bordered">
  <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Email</th>
  </tr>
  @foreach($taxpayers as $t)
  <tr>
    <td>{{ $t->name }}</td>
    <td>{{ $t->address }}</td>
    <td>{{ $t->email }}</td>
  </tr>
  @endforeach
</table>
@endsection
