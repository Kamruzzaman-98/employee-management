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

        .approve-btn {
            background: #28a745;
        }

        .approve-btn:hover {
            background: #218838;
        }

        .reject-btn {
            background: #dc3545;
        }

        .reject-btn:hover {
            background: #c82333;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            color: white;
            font-size: 13px;
            font-weight: bold;
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

        .no-action {
            color: gray;
            font-weight: bold;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="top-bar">
            <h2>Leave Requests</h2>
        </div>

        <table>

            <thead>
                <tr>
                    <th>Code</th>
                    <th>Employee</th>
                    <th>Leave Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Total Days</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($leaves as $leave)
                    <tr>
                        <td>{{ $leave->employee->employee_code }}</td>

                        <td>{{ $leave->employee->user->name }}</td>

                        <td>{{ $leave->leaveType->name }}</td>

                        <td>{{ $leave->from_date }}</td>

                        <td>{{ $leave->to_date }}</td>

                        <td>{{ $leave->total_days }}</td>

                        <td>
                            <span
                                class="status
                            @if ($leave->status == 'Pending') pending
                            @elseif($leave->status == 'Approved') approved
                            @else rejected @endif">

                                {{ $leave->status }}

                            </span>
                        </td>

                        <td>

                            @if ($leave->status == 'Pending')
                                <form action="{{ route('hr.leave.approve', $leave->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')

                                    <button class="btn approve-btn">
                                        Approve
                                    </button>

                                </form>

                                <form action="{{ route('hr.leave.reject', $leave->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')

                                    <button class="btn reject-btn">
                                        Reject
                                    </button>

                                </form>
                            @else
                                <span class="no-action">
                                    No Action
                                </span>
                            @endif

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</body>

</html>
