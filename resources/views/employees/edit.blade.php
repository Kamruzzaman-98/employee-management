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
            width: 650px;
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
        select,
        textarea {
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

        .text-danger {
            color: red;
            font-size: 14px;
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
            <input type="text" name="name" value="{{ old('name', $employee->user->name) }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $employee->user->email) }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $employee->user->phone) }}">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <label>Gender</label>
            <select name="gender">
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender', $employee->gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $employee->gender) == 'female' ? 'selected' : '' }}>Female
                </option>
                <option value="other" {{ old('gender', $employee->gender) == 'other' ? 'selected' : '' }}>Other
                </option>
            </select>

            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}">

            <label>Address</label>
            <textarea name="address">{{ old('address', $employee->address) }}</textarea>

            <label>Department</label>
            <select name="department_id">
                <option value="">Select Department</option>

                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>

            <label>Designation</label>
            <select name="designation_id">
                <option value="">Select Designation</option>

                @foreach ($designations as $designation)
                    <option value="{{ $designation->id }}"
                        {{ old('designation_id', $employee->designation_id) == $designation->id ? 'selected' : '' }}>
                        {{ $designation->name }}
                    </option>
                @endforeach
            </select>

            <label>Joining Date</label>
            <input type="date" name="joining_date" value="{{ old('joining_date', $employee->joining_date) }}">

            <label>Salary</label>
            <input type="number" step="0.01" name="salary" value="{{ old('salary', $employee->salary) }}">

            <label>Status</label>
            <select name="status">
                <option value="active" {{ old('status', $employee->status) == 'active' ? 'selected' : '' }}>Active
                </option>
                <option value="inactive" {{ old('status', $employee->status) == 'inactive' ? 'selected' : '' }}>
                    Inactive</option>
                <option value="terminated" {{ old('status', $employee->status) == 'terminated' ? 'selected' : '' }}>
                    Terminated</option>
            </select>

            @if ($employee->image)
                <label>Current Image</label><br>
                <img src="{{ asset('uploads/employees/' . $employee->image) }}" width="120">
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
