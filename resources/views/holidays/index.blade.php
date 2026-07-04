<!DOCTYPE html>
<html>

<head>
    <title>Holiday List</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background: #333;
            color: #fff;
        }

        .btn {
            padding: 8px 14px;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            display: inline-block;
        }

        .add-btn {
            background: #007bff;
        }

        .add-btn:hover {
            background: #0056b3;
        }

        .edit-btn {
            background: #ffc107;
            color: #000;
        }

        .edit-btn:hover {
            background: #e0a800;
        }

        .delete-btn {
            background: #dc3545;
        }

        .delete-btn:hover {
            background: #c82333;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            color: white;
            font-size: 13px;
            font-weight: bold;
        }

        .active {
            background: green;
        }

        .inactive {
            background: red;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="top-bar">
            <h2>Holiday List</h2>

            <a href=" {{ route('holidays.create') }} " class="btn add-btn">
                + Add Holiday
            </a>
        </div>

        <table>

            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Holiday Date</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($holidays as $holiday)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $holiday->title }}</td>

                        <td>{{ $holiday->holiday_date->format('d M, Y') }}</td>

                        <td>{{ ucfirst($holiday->type) }}</td>

                        <td>{{ $holiday->description }}</td>

                        <td>
                            <span class="status {{ $holiday->status ? 'active' : 'inactive' }}">
                                {{ $holiday->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        <td>

                            <a href="{{ route('holiday.edit', $holiday->id) }}" class="btn edit-btn">
                                Edit
                            </a>

                            <form action="{{ route('holiday.destroy', $holiday->id) }}" method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this holiday?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7">
                            No Holiday Found
                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</body>

</html>
