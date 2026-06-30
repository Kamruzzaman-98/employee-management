<!DOCTYPE html>
<html>

<head>
    <title>Attendance History</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }

        .container {
            width: 900px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #333;
            color: white;
            padding: 12px;
            text-align: center;
        }

        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            color: white;
            font-size: 13px;
            font-weight: bold;
        }

        .present {
            background: green;
        }

        .late {
            background: orange;
        }

        .absent {
            background: red;
        }

        .button-group {
            margin-top: 20px;
        }

        .btn {
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
            background: #333;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination nav {
            display: flex;
            gap: 5px;
        }
    </style>

</head>

<body>

<div class="container">

    <h2>Attendance History</h2>

    <table>

        <thead>
            <tr>
                <th>Code</th>
                <th>Date</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Working Time</th>
                <th>Late Time</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($attendances as $attendance)

                <tr>
                    <td>{{ $attendance->employee->employee_code }}</td>

                    <td>{{ $attendance->attendance_date->format('d M Y') }}</td>

                    <td>
                        {{ optional($attendance->check_in)->format('h:i A') ?? '-' }}
                    </td>

                    <td>
                        {{ optional($attendance->check_out)->format('h:i A') ?? '-' }}
                    </td>

                    <td>{{ $attendance->working_minutes }} Min</td>

                    <td>{{ $attendance->late_minutes }} Min</td>

                    <td>

                        @if($attendance->status == 'present')
                            <span class="badge present">Present</span>

                        @elseif($attendance->status == 'late')
                            <span class="badge late">Late</span>

                        @else
                            <span class="badge absent">
                                {{ ucfirst($attendance->status) }}
                            </span>
                        @endif

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6">No attendance records found.</td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="pagination">
        {{ $attendances->links() }}
    </div>


</div>

</body>

</html>
