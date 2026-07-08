<!DOCTYPE html>
<html>

<head>

    <title>Create Permission</title>


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
            text-decoration: none;
            color: white;
            cursor: pointer;
            font-size: 14px;

        }



        .save-btn {

            background: #28a745;

        }


        .save-btn:hover {

            background: #218838;

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
            Create New Permission
        </h2>



        <form action="{{ route('permissions.store') }}" method="POST">


            @csrf



            <div class="form-group">


                <label>
                    Permission Name
                </label>



                <input type="text" name="name" value="{{ old('name') }}" placeholder="Example: employee-create">



                @error('name')
                    <div class="error">

                        {{ $message }}

                    </div>
                @enderror



            </div>





            <button type="submit" class="btn save-btn">

                Save Permission

            </button>




            <a href="{{ route('permissions.index') }}" class="btn back-btn">

                Back

            </a>




        </form>



    </div>



</body>


</html>
