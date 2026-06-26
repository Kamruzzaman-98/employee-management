<!DOCTYPE html>
<html>

<head>
    <title>Designation List</title>

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

        <h2>Designation List</h2>

        <a href="{{ route('designations.create') }}" class="btn add-btn">
            + Add Designation
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

                @foreach ($designations as $designation)
                    <tr>

                        <td>{{ $designation->id }}</td>

                        <td>{{ $designation->name }}</td>

                        <td>

                            <a href="{{ route('designations.edit', $designation->id) }}" class="btn edit-btn">
                                Edit
                            </a>

                            <form action="{{ route('designations.destroy', $designation->id) }}" method="POST"
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
