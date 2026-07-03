<!DOCTYPE html>
<html>

<head>
    <title>Leave Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, .1);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        table td:first-child {
            width: 220px;
            font-weight: bold;
            background: #f8f9fa;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 5px;
            color: #fff;
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

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #0056b3;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Leave Details</h2>

        <table>

            <tr>
                <td>Employee Name</td>
                <td>{{ $leave->employee->user->name }}</td>
            </tr>

            <tr>
                <td>Leave Type</td>
                <td>{{ $leave->leaveType->name }}</td>
            </tr>

            <tr>
                <td>From Date</td>
                <td>{{ $leave->from_date }}</td>
            </tr>

            <tr>
                <td>To Date</td>
                <td>{{ $leave->to_date }}</td>
            </tr>

            <tr>
                <td>Total Days</td>
                <td>{{ $leave->total_days }}</td>
            </tr>

            <tr>
                <td>Reason</td>
                <td>{{ $leave->reason }}</td>
            </tr>

            <tr>
                <td>Status</td>
                <td>
                    @if ($leave->status == 'pending')
                        <span class="badge pending">Pending</span>
                    @elseif($leave->status == 'approved')
                        <span class="badge approved">Approved</span>
                    @else
                        <span class="badge rejected">Rejected</span>
                    @endif
                </td>
            </tr>

            <tr>
                <td>Approved By</td>
                <td>
                    @if ($leave->approver)
                        {{ $leave->approver->name }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>

            <tr>
                <td>Applied At</td>
                <td>{{ $leave->created_at->format('d M Y h:i A') }}</td>
            </tr>

            <tr>
                <td>Approved At</td>
                <td>{{ \Carbon\Carbon::parse($leave->created_at)->format('d M Y h:i A') }}</td>
            </tr>

        </table>

        <a href="{{ route('leaves.index') }}" class="btn">
            ← Back to List
        </a>

    </div>

</body>

</html>
