<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create College</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Create College</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('college.store') }}" method="POST" class="card p-4">
        @csrf
        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" id="course" name="course" value="{{ old('course') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="collegeName" class="form-label">College Name</label>
            <input type="text" id="collegeName" name="collegeName" value="{{ old('collegeName') }}" class="form-control" required>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('college.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
</body>
</html>
