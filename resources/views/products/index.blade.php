<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <style>
        body {
            font-family: Verdana, sans-serif;
            background: #f9f9f9;
            margin: 20px;
        }
        h1, h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #333;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Products</h1>

    <!-- A. All Products -->
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Description</th><th>City</th>
                <th>Country</th><th>Rooms</th><th>Year Listed</th><th>Created At</th>
            </tr>
        </thead>
        <tbody>
           @forelse($allProducts as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->city }}</td>
                    <td>{{ $product->country }}</td>
                    <td>{{ $product->number_of_rooms }}</td>
                    <td>{{ $product->year_listed }}</td>
                    <td>{{ $product->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No products found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- B. Filtering Example: First 5 Products -->
    <h2>Filtered: First 5 Products</h2>
    <table>
        <tr><th>ID</th><th>Name</th><th>City</th></tr>
        @foreach($firstFive as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->city }}</td>
            </tr>
        @endforeach
    </table>

    <!-- C. Aggregation: Total Rooms by Country -->
    <h2>Aggregated: Total Rooms by Country</h2>
    <table>
        <tr><th>Country</th><th>Total Rooms</th></tr>
        @foreach($roomsByCountry as $r)
            <tr>
                <td>{{ $r->country }}</td>
                <td>{{ $r->total_rooms }}</td>
            </tr>
        @endforeach
    </table>

    <!-- D. Grouping: Average Rooms by Country -->
    <h2>Grouped: Average Rooms by Country</h2>
    <table>
        <tr><th>Country</th><th>Average Rooms</th></tr>
        @foreach($avgRoomsByCountry as $r)
            <tr>
                <td>{{ $r->country }}</td>
                <td>{{ number_format($r->avg_rooms, 2) }}</td>
            </tr>
        @endforeach
    </table>

    <!-- E. Filtering + Grouping: Japan & USA Average Rooms -->
    <h2>Filtered & Grouped: Japan and USA Average Rooms</h2>
    <table>
        <tr><th>Country</th><th>Average Rooms</th></tr>
        @foreach($japanUsaAvg as $r)
            <tr>
                <td>{{ $r->country }}</td>
                <td>{{ number_format($r->avg_rooms, 2) }}</td>
            </tr>
        @endforeach
    </table>

    <!-- F. Grouping + Counting -->
    <h2>Number of Distinct Cities per Country</h2>
    <table>
        <tr><th>Country</th><th>City Count</th></tr>
        @foreach($citiesPerCountry as $r)
            <tr>
                <td>{{ $r->country }}</td>
                <td>{{ $r->city_count }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>
