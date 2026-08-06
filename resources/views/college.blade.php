<!DOCTYPE html>
<html>
<head>
    <title>College List</title>
</head>
<body>

    <h2>Add New College</h2>

    {{-- Form to insert college data --}}
    <form action="{{ route('college.store') }}" method="POST">
        @csrf
        <label>Course</label>
        <input type="text" name="course" placeholder="Enter course" required>

        <label>College Name</label>
        <input type="text" name="collegeName" placeholder="Enter college name" required>

        <button type="submit">Add College</button>
    </form>

    <h2>College Records</h2>

    {{-- Table to display data --}}
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>id</th>
                <th>Course</th>
                <th>College Name</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($colleges as $college)
                <tr>
                    <td>{{ $college->id }}</td>
                    <td>{{ $college->course }}</td>
                    <td>{{ $college->collegeName }}</td>
                    <td>{{ $college->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
