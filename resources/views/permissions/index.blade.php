<!DOCTYPE html>
<html>

<head>

    <title>Permission List</title>

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


        .btn {
            padding: 8px 14px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
        }


        .add {
            background: #28a745;
        }


        .edit {
            background: #ff9800;
        }


        .delete {
            background: #dc3545;
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


        .alert {
            background: #d4edda;
            padding: 10px;
            margin-top: 10px;
            color: #155724;
        }
    </style>

</head>


<body>


    <div class="container">


        <h2>
            Permission List
        </h2>


        <a href="{{ route('permissions.create') }}" class="btn add">
            + Add Permission
        </a>



        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif



        <table>


            <tr>

                <th>ID</th>

                <th>Name</th>

                <th>Guard</th>

                <th>Date</th>

                <th>Action</th>

            </tr>



            @forelse($permissions as $permission)
                <tr>

                    <td>{{ $permission->id }}</td>


                    <td>{{ $permission->name }}</td>


                    <td>{{ $permission->guard_name }}</td>


                    <td>
                        {{ $permission->created_at->format('d-m-Y') }}
                    </td>



                    <td>


                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn edit">
                            Edit
                        </a>



                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                            style="display:inline">

                            @csrf
                            @method('DELETE')


                            <button class="btn delete" onclick="return confirm('Delete permission?')">

                                Delete

                            </button>


                        </form>


                    </td>


                </tr>


            @empty


                <tr>

                    <td colspan="5">
                        No Permission Found
                    </td>

                </tr>
            @endforelse



        </table>



    </div>


</body>


</html>
