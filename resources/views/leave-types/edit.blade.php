<!DOCTYPE html>
<html>

<head>
    <title>Edit Leave Type</title>

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
            max-width: 600px;
            margin: auto;
        }

        h2 {
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
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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

        .update-btn {
            background: #007bff;
        }

        .update-btn:hover {
            background: #0069d9;
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

        <h2>Edit Leave Type</h2>

        <form action="{{ route('leave-types.update', $leaveType->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Leave Type Name</label>

                <input type="text" name="name" value="{{ $leaveType->name }}" required>
            </div>

            <div class="form-group">
                <label>Maximum Days</label>

                <input type="number" name="max_days" value="{{ $leaveType->max_days }}" required>
            </div>

            <div class="form-group">
                <label>Paid Leave</label>

                <select name="is_paid">
                    <option value="1" {{ $leaveType->is_paid ? 'selected' : '' }}>
                        Paid
                    </option>

                    <option value="0" {{ !$leaveType->is_paid ? 'selected' : '' }}>
                        Unpaid
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status">
                    <option value="1" {{ $leaveType->status ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0" {{ !$leaveType->status ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
            </div>

            <button type="submit" class="btn update-btn">
                Update
            </button>

            <a href="{{ route('leave-types.index') }}" class="btn back-btn">
                Back
            </a>

        </form>

    </div>

</body>

</html>
