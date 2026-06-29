<!DOCTYPE html>
<html>

<head>
    <title>Employee List</title>
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
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background: #333;
            color: white;
        }

        img {
            border-radius: 50%;
        }

        /* Buttons */
        .btn {
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
            display: inline-block;
        }

        .add-btn {
            background: #28a745;
        }

        .add-btn:hover {
            background: #218838;
        }

        .edit-btn {
            background: #ff9800;
        }

        .edit-btn:hover {
            background: #e68900;
        }

        .delete-btn {
            background: #dc3545;
        }

        .delete-btn:hover {
            background: #c82333;
        }

        .filter-form {
            margin-top: 15px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        .filter-form input,
        .filter-form select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .filter-btn {
            background: #007bff;
        }

        .filter-btn:hover {
            background: #0069d9;
        }

        .reset-btn {
            background: #6c757d;
        }

        .reset-btn:hover {
            background: #5a6268;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="top-bar">
            <h2>Employee List</h2>

            <a href="{{ route('employees.create') }}" class="btn add-btn">+ Add Employee</a>
        </div>

        <form method="GET" action="{{ route('employees.index') }}" class="filter-form">

            <input type="text" name="search" placeholder="Search Name or ID" value="{{ request('search') }}">

            <select name="department_id">
                <option value="">All Department</option>
                @foreach ($departments as $dept)
                    <option value="{{ $dept->id }}" {{ request('department_id') == $dept->id ? 'selected' : '' }}>
                        {{ $dept->name }}
                    </option>
                @endforeach
            </select>

            <select name="designation_id">
                <option value="">All Designation</option>
                @foreach ($designations as $desig)
                    <option value="{{ $desig->id }}" {{ request('designation_id') == $desig->id ? 'selected' : '' }}>
                        {{ $desig->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn filter-btn">Filter</button>

            <a href="{{ route('employees.index') }}" class="btn reset-btn">Reset</a>

        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>

                        <td>
                            @if ($employee->image)
                                <img src="{{ asset('uploads/' . $employee->image) }}" width="50" height="50">
                            @else
                                N/A
                            @endif
                        </td>

                        <td>{{ $employee->user->name }}</td>
                        <td>{{ $employee->user->email }}</td>
                        <td>{{ $employee->user->phone }}</td>
                        <td>{{ $employee->department->name }}</td>
                        <td>{{ $employee->designation->name }}</td>
                        <td>{{ $employee->salary }}</td>

                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn edit-btn">Edit</a>

                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn delete-btn" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</body>

</html>
