<!DOCTYPE html>
<html>

<head>
    <title>Edit Employee</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }

        .container {
            width: 600px;
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

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        img {
            border-radius: 6px;
            margin-top: 10px;
        }

        .btn {
            padding: 10px 15px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        .update-btn {
            background: orange;
        }

        .back-btn {
            background: #333;
            margin-left: 10px;
        }

        .button-group {
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Edit Employee</h2>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <label>Name</label>
            <input type="text" name="name" value="{{ $employee->name }}">

            <label>Email</label>
            <input type="email" name="email" value="{{ $employee->email }}">

            <label>Phone</label>
            <input type="text" name="phone" value="{{ $employee->phone }}">

            <label>Department</label>
            <select name="department_id">
                <option value="">Select Department</option>

                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>

            <label>Designation</label>
            <select name="designation_id">
                <option value="">Select Designation</option>

                @foreach ($designations as $designation)
                    <option value="{{ $designation->id }}"
                        {{ $employee->designation_id == $designation->id ? 'selected' : '' }}>
                        {{ $designation->name }}
                    </option>
                @endforeach
            </select>

            <label>Salary</label>
            <input type="number" name="salary" value="{{ $employee->salary }}">

            @if ($employee->image)
                <label>Current Image</label>
                <img src="{{ asset('uploads/' . $employee->image) }}" width="100">
            @endif

            <label>Change Image</label>
            <input type="file" name="image">

            <div class="button-group">
                <button type="submit" class="btn update-btn">
                    Update Employee
                </button>

                <a href="{{ route('employees.index') }}" class="btn back-btn">
                    Back
                </a>
            </div>

        </form>

    </div>

</body>

</html>
