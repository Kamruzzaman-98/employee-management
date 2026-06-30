<!DOCTYPE html>
<html>

<head>
    <title>Employee Attendance</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }

        .container {
            width: 700px;
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

        .info-box {
            background: #f8f9fa;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .info-box p {
            margin: 8px 0;
            font-size: 15px;
        }

        .btn {
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }

        .checkin-btn {
            background: green;
        }

        .checkout-btn {
            background: #dc3545;
        }

        .back-btn {
            background: #333;
            margin-left: 10px;
        }

        .button-group {
            margin-top: 20px;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Employee Attendance</h2>

        @if (!$todayAttendance)
            <div class="info-box">
                <p><strong>Status:</strong> Not Checked In Yet</p>
            </div>

            <form action="{{ route('attendance.checkin') }}" method="POST">
                @csrf

                <div class="button-group">
                    <button type="submit" class="btn checkin-btn">
                        Check In
                    </button>

                    <a href="{{ url()->previous() }}" class="btn back-btn">
                        Back
                    </a>
                </div>
            </form>
        @elseif(!$todayAttendance->check_out)
            <div class="info-box">
                <p><strong>Check In Time:</strong>
                    {{ $todayAttendance->check_in->format('h:i A') }}
                </p>

                <p><strong>Status:</strong> Checked In</p>
            </div>

            <form action="{{ route('attendance.checkout') }}" method="POST">
                @csrf

                <div class="button-group">
                    <button type="submit" class="btn checkout-btn">
                        Check Out
                    </button>

                    <a href="{{ url()->previous() }}" class="btn back-btn">
                        Back
                    </a>
                </div>
            </form>
        @else
            <div class="success-message">
                ✅ You have completed today's attendance.
            </div>

            <div class="info-box">
                <p><strong>Check In:</strong>
                    {{ $todayAttendance->check_in->format('h:i A') }}
                </p>

                <p><strong>Check Out:</strong>
                    {{ $todayAttendance->check_out->format('h:i A') }}
                </p>
            </div>
            
        @endif

    </div>

</body>

</html>
