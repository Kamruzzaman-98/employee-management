<!DOCTYPE html>
<html>

<head>
    <title>Department List</title>

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

        .btn {
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
            color: white;
            border: none;
            cursor: pointer;
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

        <h2>Department List</h2>

        <a href="{{ route('departments.create') }}" class="btn add-btn">
            + Add Department
        </a>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($departments as $department)

                    <tr>

                        <td>{{ $department->id }}</td>

                        <td>{{ $department->name }}</td>

                        <td>

                            <a href="{{ route('departments.edit', $department->id) }}"
                                class="btn edit-btn">
                                Edit
                            </a>

                            <form action="{{ route('departments.destroy', $department->id) }}"
                                method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="btn delete-btn"
                                    onclick="return confirm('Are you sure?')">
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
