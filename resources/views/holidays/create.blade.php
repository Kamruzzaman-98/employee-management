<!DOCTYPE html>
<html>

<head>
    <title>Add Holiday</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }

        .container {
            width: 600px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            text-decoration: none;
            font-size: 15px;
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

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

    </style>
</head>

<body>

    <div class="container">

        <h2>Add Holiday</h2>

        <form action="" method="POST">

            @csrf

            <div class="form-group">
                <label>Holiday Title</label>

                <input type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Enter Holiday Title">

                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Holiday Date</label>

                <input type="date"
                    name="holiday_date"
                    value="{{ old('holiday_date') }}">

                @error('holiday_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Holiday Type</label>

                <select name="type">

                    <option value="">Select Type</option>

                    <option value="National"
                        {{ old('type') == 'National' ? 'selected' : '' }}>
                        National
                    </option>

                    <option value="Religious"
                        {{ old('type') == 'Religious' ? 'selected' : '' }}>
                        Religious
                    </option>

                    <option value="Company"
                        {{ old('type') == 'Company' ? 'selected' : '' }}>
                        Company
                    </option>

                </select>

                @error('type')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Description</label>

                <textarea name="description"
                    rows="4"
                    placeholder="Write Description...">{{ old('description') }}</textarea>

                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status">

                    <option value="1"
                        {{ old('status') == '1' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ old('status') == '0' ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn save-btn">
                Save Holiday
            </button>

            <a href="{{ route('holidays.index') }}" class="btn back-btn">
                Back
            </a>

        </form>

    </div>

</body>

</html>
