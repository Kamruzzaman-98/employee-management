<!DOCTYPE html>
<html>

<head>

    <title>Assign Permission</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }


        body {

            background: #f4f6f9;
            padding: 40px;

        }


        .container {

            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);

        }


        .header {

            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;

        }


        h2 {

            color: #333;
            font-size: 24px;

        }


        .role-name {

            color: #2563eb;
            font-weight: bold;

        }


        .permission-box {


            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;


        }



        .permission-item {


            background: #f8fafc;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            transition: .3s;
            cursor: pointer;


        }


        .permission-item:hover {

            background: #eef4ff;
            border-color: #2563eb;

        }



        .permission-item input {


            width: 18px;
            height: 18px;
            margin-right: 10px;
            cursor: pointer;


        }



        .permission-name {


            font-size: 15px;
            color: #374151;


        }




        .button-area {


            margin-top: 30px;
            text-align: right;


        }



        button {


            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;


        }


        button:hover {


            background: #1d4ed8;


        }



        .back-btn {


            text-decoration: none;
            background: #6b7280;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin-right: 10px;


        }


        @media(max-width:600px) {

            .permission-box {

                grid-template-columns: 1fr;

            }

            body {

                padding: 15px;

            }

        }
    </style>


</head>


<body>


    <div class="container">


        <div class="header">

            <h2>
                Assign Permission
            </h2>


        </div>



        <p>
            Role:
            <span class="role-name">
                {{ $role->name }}
            </span>
        </p>



        <form method="POST" action="{{ route('roles.permissions.update', $role->id) }}">


            @csrf



            <div class="permission-box">


                @foreach ($permissions as $permission)
                    <label class="permission-item">


                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>


                        <span class="permission-name">

                            {{ $permission->name }}

                        </span>


                    </label>
                @endforeach



            </div>




            <div class="button-area">


                <a href="{{ route('roles.index') }}" class="back-btn">

                    Back

                </a>


                <button type="submit">

                    Save Permission

                </button>


            </div>



        </form>



    </div>



</body>

</html>
