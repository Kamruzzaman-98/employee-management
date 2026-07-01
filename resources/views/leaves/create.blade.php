<!DOCTYPE html>
<html>

<head>
    <title>Apply Leave</title>

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
            max-width: 700px;
            margin: auto;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        .btn {
            padding: 10px 18px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .save-btn {
            background: #28a745;
        }

        .save-btn:hover {
            background: #218838;
        }

        .back-btn {
            background: #6c757d;
            text-decoration: none;
            display: inline-block;
            margin-left: 10px;
        }

        .back-btn:hover {
            background: #5a6268;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="top-bar">
            <h2>Apply Leave</h2>
        </div>

        <form action="{{ route('leaves.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Employee</label>

                <input type="text" class="form-control" value="{{ $employee->user->name }}" disabled>

                <input type="hidden" name="employee_id" value="{{ $employee->id }}">
            </div>

            <div class="form-group">
                <label>Leave Type</label>

                <select name="leave_type_id">
                    @foreach ($leaveTypes as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>From Date</label>
                <input type="date" name="from_date">
            </div>

            <div class="form-group">
                <label>To Date</label>
                <input type="date" name="to_date">
            </div>

            <div class="form-group">
                <label>Reason</label>
                <textarea name="reason"></textarea>
            </div>

            <button type="submit" class="btn save-btn">
                Save
            </button>

            <a href="{{ route('leaves.index') }}" class="btn back-btn">
                Back
            </a>

        </form>

    </div>

</body>

</html>
