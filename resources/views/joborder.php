<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job Order</title>
    <link href="" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Add New Job Order</h2>

    {{-- Display success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Display validation errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('joborder.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control"
                   placeholder="Enter staff name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control"
                   placeholder="Enter staff email" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Job Order</button>
    </form>
</div>
</body>
</html>