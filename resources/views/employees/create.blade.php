<!DOCTYPE html>
<html>

<head>
    <title>Add Employee</title>

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
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 12px;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
            border: none;
            cursor: pointer;
        }

        .save-btn {
            background: green;
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

        <h2>Add Employee</h2>

        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Name</label>
            <input type="text" name="name" placeholder="Enter Name">

            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email">

            <label>Phone</label>
            <input type="text" name="phone" placeholder="Enter Phone">

            <label>Department</label>
            <select name="department_id">
                <option value="">Select Department</option>

                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>

            <label>Designation</label>
            <select name="designation_id">
                <option value="">Select Designation</option>

                @foreach ($designations as $designation)
                    <option value="{{ $designation->id }}">
                        {{ $designation->name }}
                    </option>
                @endforeach
            </select>

            <label>Salary</label>
            <input type="number" name="salary" placeholder="Enter Salary">

            <label>Employee Image</label>
            <input type="file" name="image">

            <div class="button-group">
                <button type="submit" class="btn save-btn">Save Employee</button>

                <a href="{{ route('employees.index') }}" class="btn back-btn">
                    Back
                </a>
            </div>

        </form>

    </div>

</body>

</html>
