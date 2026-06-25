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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
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

        .btn {
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
        }

        .add-btn {
            background: green;
        }

        .edit-btn {
            background: orange;
        }

        .delete-btn {
            background: red;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Employee List</h2>

    <a href="{{ route('employees.create') }}" class="btn add-btn">+ Add Employee</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Designation</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>

                    <td>
                        @if($employee->image)
                            <img src="{{ asset('uploads/'.$employee->image) }}" width="50" height="50">
                        @else
                            N/A
                        @endif
                    </td>

                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->designation }}</td>
                    <td>{{ $employee->salary }}</td>

                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn edit-btn">Edit</a>

                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
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
