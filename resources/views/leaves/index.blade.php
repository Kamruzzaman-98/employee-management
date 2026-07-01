<!DOCTYPE html>
<html>

<head>
    <title>Leave List</title>

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

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-size: 13px;
        }

        .pending {
            background: orange;
        }

        .approved {
            background: green;
        }

        .rejected {
            background: red;
        }

        .pagination {
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="top-bar">
            <h2>Leave List</h2>

            <a href="{{ route('leaves.create') }}" class="btn add-btn">
                + Apply Leave
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
                    <th>Employee</th>
                    <th>Leave Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Total Days</th>
                    <th>Status</th>
                    <th width="220">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($leaves as $leave)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $leave->employee->user->name }}</td>

                        <td>{{ $leave->leaveType->name }}</td>

                        <td>{{ $leave->from_date }}</td>

                        <td>{{ $leave->to_date }}</td>

                        <td>{{ $leave->total_days }}</td>

                        <td>

                            @if ($leave->status == 'pending')
                                <span class="badge pending">Pending</span>
                            @elseif($leave->status == 'approved')
                                <span class="badge approved">Approved</span>
                            @else
                                <span class="badge rejected">Rejected</span>
                            @endif

                        </td>

                        <td>

                            <a href="{{ route('leaves.show', $leave) }}" class="btn view-btn">
                                View
                            </a>

                            <a href="{{ route('leaves.edit', $leave) }}" class="btn edit-btn">
                                Edit
                            </a>

                            <form action="{{ route('leaves.destroy', $leave) }}" method="POST"
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
                        <td colspan="8">
                            No Leave Records Found.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

        <div class="pagination">
            {{ $leaves->links() }}
        </div>

    </div>

</body>

</html>
