<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Attendance</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f6f9;
            padding: 40px;
        }

        .container {
            max-width: 750px;
            margin: auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
            overflow: hidden;
        }

        .header {
            background: #0d6efd;
            color: white;
            padding: 20px;
        }

        .header h2 {
            margin-bottom: 8px;
        }

        .content {
            padding: 25px;
        }

        .card {
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            padding: 18px;
            margin-bottom: 20px;
            background: #fafafa;
        }

        .card p {
            margin: 10px 0;
            font-size: 15px;
        }

        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            color: #fff;
            font-size: 13px;
            font-weight: bold;
        }

        .badge-warning {
            background: #ffc107;
            color: #000;
        }

        .badge-success {
            background: #198754;
        }

        .badge-primary {
            background: #0d6efd;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
        }

        .btn-success {
            background: #198754;
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn-dark {
            background: #343a40;
        }

        .button-group {
            margin-top: 20px;
        }

        .button-group .btn {
            margin-right: 10px;
        }

        .complete {
            background: #d1e7dd;
            border: 1px solid #badbcc;
            color: #0f5132;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="header">
            <h2>Employee Attendance</h2>
            <p>{{ now()->format('d F Y') }}</p>
        </div>

        <div class="content">

            <div class="card">
                <p><strong>Employee Code :</strong>{{ auth()->user()->employee->employee_code }}</p>
                <p><strong>Employee :</strong> {{ auth()->user()->name }}</p>
                <p><strong>Department :</strong> {{ auth()->user()->employee->department->name }}</p>
                <p><strong>Designation :</strong> {{ auth()->user()->employee->designation->name }}</p>
            </div>

            @if (!$todayAttendance)
                <div class="card">

                    <p>
                        <strong>Status :</strong>
                        <span class="badge badge-warning">
                            Not Checked In
                        </span>
                    </p>

                    <p><strong>Check In :</strong> --</p>
                    <p><strong>Check Out :</strong> --</p>

                </div>

                <form action="{{ route('attendance.checkin') }}" method="POST">
                    @csrf

                    <div class="button-group">

                        <button class="btn btn-success">
                            ✔ Check In
                        </button>

                        <a href="{{ url()->previous() }}" class="btn btn-dark">
                            Back
                        </a>

                    </div>

                </form>
            @elseif(!$todayAttendance->check_out)
                <div class="card">

                    <p>
                        <strong>Status :</strong>

                        <span class="badge badge-primary">
                            Checked In
                        </span>
                    </p>

                    <p>
                        <strong>Check In :</strong>

                        {{ $todayAttendance->check_in->format('h:i A') }}
                    </p>

                    <p>
                        <strong>Check Out :</strong>

                        --
                    </p>

                    <p>
                        <strong>Working Time :</strong>

                        In Progress...
                    </p>

                </div>

                <form action="{{ route('attendance.checkout') }}" method="POST">

                    @csrf

                    <div class="button-group">

                        <button class="btn btn-danger">
                            ✔ Check Out
                        </button>

                        <a href="{{ route('attendance.index') }}" class="btn btn-dark">
                            Back
                        </a>

                    </div>

                </form>
            @else
                <div class="complete">
                    ✅ Today's Attendance Completed Successfully
                </div>

                <div class="card">

                    <p>
                        <strong>Status :</strong>

                        <span class="badge badge-success">
                            Present
                        </span>
                    </p>

                    <p>
                        <strong>Check In :</strong>

                        {{ $todayAttendance->check_in->format('h:i A') }}
                    </p>

                    <p>
                        <strong>Check Out :</strong>

                        {{ $todayAttendance->check_out->format('h:i A') }}
                    </p>

                    <p>
                        <strong>Working Time :</strong>

                        {{ $todayAttendance->check_in->diff($todayAttendance->check_out)->format('%h Hours %i Minutes') }}
                    </p>

                </div>

                <a href="{{ route('attendance.index') }}" class="btn btn-back-btn">
                    Back
                </a>
            @endif

        </div>

    </div>

</body>

</html>
