<!DOCTYPE html>
<html>
<head>
    <title>Items List</title>
</head>
<body>
    <h2>Items and Categories</h2>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Description</th>
                <th>Category Name</th>
                <th>Price</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ optional($item->created_at)->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No data available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
