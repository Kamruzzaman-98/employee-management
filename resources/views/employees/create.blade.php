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

        label {
            font-weight: bold;
            display: block;
            margin-top: 12px;
            margin-bottom: 5px;
        }

        input,
        select,
        textarea {
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

        .row {
            display: flex;
            gap: 10px;
        }

        .row>div {
            flex: 1;
        }

        .req {
            color: red;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Add Employee</h2>

        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Full Name <span class="req">*</span></label>
            <input type="text" name="name" placeholder="Enter Full Name" required>

            <label>Email <span class="req">*</span></label>
            <input type="email" name="email" placeholder="Enter Email" required>

            <label>Phone</label>
            <input type="text" name="phone" placeholder="Enter Phone">

            <label>Gender</label>
            <select name="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <div class="row">

                <div>
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth">
                </div>

                <div>
                    <label>Joining Date</label>
                    <input type="date" name="joining_date">
                </div>

            </div>

            <label>Address</label>
            <textarea name="address" placeholder="Enter Address"></textarea>

            <label>Department <span class="req">*</span></label>
            <select name="department_id" required>
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

            <label>Status <span class="req">*</span></label>
            <select name="status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="terminated">Terminated</option>
            </select>

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
