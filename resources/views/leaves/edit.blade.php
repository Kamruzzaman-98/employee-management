<!DOCTYPE html>
<html>

<head>
    <title>Edit Leave</title>

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

        .alert {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="top-bar">
            <h2>Edit Leave</h2>
        </div>

        {{-- Errors --}}
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('leaves.update', $leave->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Employee</label>

                <input type="text" class="form-control" value="{{ $leave->employee->user->name }}" disabled>

                <input type="hidden" name="employee_id" value="{{ $leave->employee_id }}">
            </div>

            <div class="form-group">
                <label>Leave Type</label>
                <select name="leave_type_id" required>
                    @foreach ($leaveTypes as $type)
                        <option value="{{ $type->id }}" {{ $leave->leave_type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>From Date</label>
                <input type="date" name="from_date" value="{{ $leave->from_date }}" required>
            </div>

            <div class="form-group">
                <label>To Date</label>
                <input type="date" name="to_date" value="{{ $leave->to_date }}" required>
            </div>

            <div class="form-group">
                <label>Reason</label>
                <textarea name="reason" required>{{ $leave->reason }}</textarea>
            </div>

            <button type="submit" class="btn update-btn">
                Update Leave
            </button>

            <a href="{{ route('leaves.index') }}" class="btn back-btn">
                Back
            </a>

        </form>

    </div>

</body>

</html>
