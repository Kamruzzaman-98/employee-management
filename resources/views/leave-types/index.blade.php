<!DOCTYPE html>
<html>

<head>
    <title>Leave Types</title>

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
            flex-wrap: wrap;
            gap: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
            color: white;
        }

        .btn {
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
            display: inline-block;
        }

        .add-btn {
            background: #28a745;
        }

        .add-btn:hover {
            background: #218838;
        }

        .view-btn {
            background: #17a2b8;
        }

        .view-btn:hover {
            background: #138496;
        }

        .edit-btn {
            background: #ff9800;
        }

        .edit-btn:hover {
            background: #e68900;
        }

        .delete-btn {
            background: #dc3545;
        }

        .delete-btn:hover {
            background: #c82333;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
        }

        .pagination {
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="top-bar">
            <h2>Leave Types</h2>

            <a href="{{ route('leave-types.create') }}" class="btn add-btn">
                + Add Leave Type
            </a>
        </div>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <table>

            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Max Days</th>
                    <th>Paid</th>
                    <th>Status</th>
                    <th width="220">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($leaveTypes as $leave)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $leave->name }}</td>

                        <td>{{ $leave->max_days }}</td>

                        <td>{{ $leave->is_paid ? 'Paid' : 'Unpaid' }}</td>

                        <td>{{ $leave->status ? 'Active' : 'Inactive' }}</td>

                        <td>

                            <a href="{{ route('leave-types.show', $leave->id) }}" class="btn view-btn">
                                View
                            </a>

                            <a href="{{ route('leave-types.edit', $leave->id) }}" class="btn edit-btn">
                                Edit
                            </a>

                            <form action="{{ route('leave-types.destroy', $leave->id) }}" method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn delete-btn" onclick="return confirm('Are you sure?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6">
                            No Leave Types Found.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

        <div class="pagination">
            {{ $leaveTypes->links() }}
        </div>

    </div>

</body>

</html>
