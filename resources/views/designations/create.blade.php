<!DOCTYPE html>
<html>

<head>
    <title>Add Designation</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }

        .container {
            width: 500px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button-group {
            margin-top: 20px;
        }

        .btn {
            padding: 10px 15px;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        .save-btn {
            background: green;
        }

        .back-btn {
            background: #333;
            margin-left: 10px;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Add Designation</h2>

        <form action="{{ route('designations.store') }}" method="POST">

            @csrf

            <label>Designation Name</label>

            <input
                type="text"
                name="name"
                placeholder="Enter Designation Name"
            >

            <div class="button-group">

                <button type="submit" class="btn save-btn">
                    Save Designation
                </button>

                <a href="{{ route('designations.index') }}" class="btn back-btn">
                    Back
                </a>

            </div>

        </form>

    </div>

</body>

</html>
