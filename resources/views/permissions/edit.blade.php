<!DOCTYPE html>
<html>

<head>

    <title>Edit Permission</title>


    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }


        .container {

            width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);

        }


        h2 {
            margin-bottom: 20px;
        }


        .form-group {

            margin-bottom: 18px;

        }


        label {

            display: block;
            margin-bottom: 8px;
            font-weight: bold;

        }


        input[type="text"] {

            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;

        }


        .error {

            color: red;
            font-size: 14px;
            margin-top: 5px;

        }


        .btn {

            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;

        }


        .update-btn {

            background: #007bff;

        }


        .update-btn:hover {

            background: #0056b3;

        }


        .back-btn {

            background: #6c757d;
            margin-left: 10px;

        }


        .back-btn:hover {

            background: #5a6268;

        }
    </style>


</head>


<body>


    <div class="container">


        <h2>
            Edit Permission
        </h2>




        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">


            @csrf

            @method('PUT')



            <div class="form-group">


                <label>
                    Permission Name
                </label>



                <input type="text" name="name" value="{{ old('name', $permission->name) }}"
                    placeholder="Enter Permission Name">



                @error('name')
                    <div class="error">

                        {{ $message }}

                    </div>
                @enderror



            </div>




            <button type="submit" class="btn update-btn">

                Update Permission

            </button>




            <a href="{{ route('permissions.index') }}" class="btn back-btn">

                Back

            </a>



        </form>



    </div>



</body>


</html>
