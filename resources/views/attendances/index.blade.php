<!DOCTYPE html>
<html>

<head>
    <title>Attendance</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }

        .container {
            width: 500px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            margin: 10px;
            font-size: 14px;
        }

        .checkin-btn {
            background: green;
        }

        .checkout-btn {
            background: red;
        }

        form {
            display: inline-block;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Attendance</h2>

        <form method="POST" action="{{ route('attendance.checkin') }}">
            @csrf
            <button type="submit" class="btn checkin-btn">
                Check In
            </button>
        </form>

        <form method="POST" action="{{ route('attendance.checkout') }}">
            @csrf
            <button type="submit" class="btn checkout-btn">
                Check Out
            </button>
        </form>

    </div>

</body>

</html>
