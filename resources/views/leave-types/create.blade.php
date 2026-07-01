<!DOCTYPE html>
<html>

<head>
    <title>Create Leave Type</title>

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
            max-width: 600px;
            margin: auto;
        }

        h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 18px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
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
            text-decoration: none;
            display: inline-block;
            margin-left: 10px;
        }

        .back-btn:hover {
            background: #5a6268;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Create Leave Type</h2>

        <form action="{{ route('leave-types.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Leave Type Name</label>

                <input type="text"
                    name="name"
                    placeholder="Enter Leave Type"
                    required>
            </div>

            <div class="form-group">
                <label>Maximum Days</label>

                <input type="number"
                    name="max_days"
                    placeholder="Enter Maximum Days"
                    required>
            </div>

            <div class="form-group">
                <label>Paid Leave</label>

                <select name="is_paid">
                    <option value="1">Paid</option>
                    <option value="0">Unpaid</option>
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn save-btn">
                Save
            </button>

            <a href="{{ route('leave-types.index') }}" class="btn back-btn">
                Back
            </a>

        </form>

    </div>

</body>

</html>
