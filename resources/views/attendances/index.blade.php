<!DOCTYPE html>
<html>

<head>
    <title>Attendance History</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        table th {
            background: #0d6efd;
            color: white;
            padding: 12px;
            text-align: center;
            font-size: 14px;
        }

        table td {
            border: 1px solid #eee;
            padding: 10px;
            text-align: center;
            font-size: 14px;
        }

        table tr:nth-child(even) {
            background: #f8f9fa;
        }

        table tr:hover {
            background: #eef2ff;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            color: white;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }

        .present {
            background: #198754;
        }

        .late {
            background: #fd7e14;
        }

        .absent {
            background: #dc3545;
        }

        .leave {
            background: #6f42c1;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .btn {
            padding: 8px 14px;
            background: #343a40;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="top-bar">
            <h2>Attendance History</h2>

            {{-- <a href="{{ url()->previous() }}" class="btn">Back</a> --}}
        </div>

        <div class="table-wrapper">

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
                        <tr @if (auth()->user()->employee->id == $attendance->employee_id) style="background:#f0f8ff;" @endif>

                            <td>{{ $attendance->employee->employee_code }}</td>

                            <td>{{ $attendance->attendance_date->format('d M Y') }}</td>

                            <td>
                                {{ $attendance->check_in ? $attendance->check_in->format('h:i A') : '-' }}
                            </td>

                            <td>
                                {{ $attendance->check_out ? $attendance->check_out->format('h:i A') : '-' }}
                            </td>

                            <td>
                                @if ($attendance->working_minutes)
                                    {{ intdiv($attendance->working_minutes, 60) }}h
                                    {{ $attendance->working_minutes % 60 }}m
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                {{ $attendance->late_minutes ?? 0 }} min
                            </td>

                            <td>
                                @if ($attendance->status == 'present')
                                    <span class="badge present">Present</span>
                                @elseif($attendance->status == 'late')
                                    <span class="badge late">Late</span>
                                @elseif($attendance->status == 'leave')
                                    <span class="badge leave">Leave</span>
                                @else
                                    <span class="badge absent">Absent</span>
                                @endif
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="empty">
                                No attendance records found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="pagination">
            {{ $attendances->links() }}
        </div>

    </div>

</body>

</html>
