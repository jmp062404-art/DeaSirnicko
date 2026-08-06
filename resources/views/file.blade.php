<!DOCTYPE html>
<html>
<head>
    <title>File</title>
    <link href="" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Add a New File</h2>

    {{-- Display success message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Display Validation errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('file.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" placeholder="email" required>
        </div>

        <button type="submit">Submit</button>
    </form>

</div>
</body>
</html>