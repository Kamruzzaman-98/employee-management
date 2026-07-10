<!DOCTYPE html>
<html>

<head>
    <title>Role List</title>

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


        .alert {
            padding: 10px;
            background: #d4edda;
            color: #155724;
            margin-top: 15px;
            border-radius: 5px;
        }
    </style>

</head>


<body>


    <div class="container">


        <div class="top-bar">

            <h2>Role List</h2>


            <a href="{{ route('roles.create') }}" class="btn add-btn">
                + Add Role
            </a>


        </div>



        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif




        <table>


            <thead>

                <tr>

                    <th>#</th>

                    <th>Role Name</th>

                    <th>Guard Name</th>

                    <th>Created Date</th>

                    <th>Action</th>

                </tr>


            </thead>



            <tbody>


                @forelse($roles as $role)
                    <tr>


                        <td>
                            {{ $role->id }}
                        </td>


                        <td>
                            {{ $role->name }}
                        </td>


                        <td>
                            {{ $role->guard_name }}
                        </td>


                        <td>
                            {{ $role->created_at->format('d-m-Y') }}
                        </td>



                        <td>


                            <a href="{{ route('roles.edit', $role->id) }}" class="btn edit-btn">
                                Edit
                            </a>

                            <a href="{{ route('roles.permissions', $role->id) }}" class="btn add-btn">
                                Permission
                            </a>

                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                style="display:inline;">


                                @csrf

                                @method('DELETE')


                                <button type="submit" class="btn delete-btn"
                                    onclick="return confirm('Are you sure delete this role?')">

                                    Delete

                                </button>


                            </form>



                        </td>


                    </tr>


                @empty


                    <tr>

                        <td colspan="5">
                            No Role Found
                        </td>

                    </tr>
                @endforelse



            </tbody>



        </table>

    </div>



</body>

</html>
