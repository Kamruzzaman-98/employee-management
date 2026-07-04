<!DOCTYPE html>
<html>

<head>
    <title>Edit Holiday</title>

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

        .update-btn {
            background: #ffc107;
            color: #000;
        }

        .update-btn:hover {
            background: #e0a800;
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

        <h2>Edit Holiday</h2>

        <form action="{{ route('holidays.update', $holiday->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Holiday Title</label>

                <input type="text" name="title" value="{{ old('title', $holiday->title) }}">

                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Holiday Date</label>

                <input type="date" name="holiday_date"
                    value="{{ old('holiday_date', $holiday->holiday_date->format('Y-m-d')) }}">

                @error('holiday_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Holiday Type</label>

                <select name="type">

                    <option value="National" {{ old('type', $holiday->type) == 'National' ? 'selected' : '' }}>
                        National
                    </option>

                    <option value="Religious" {{ old('type', $holiday->type) == 'Religious' ? 'selected' : '' }}>
                        Religious
                    </option>

                    <option value="Company" {{ old('type', $holiday->type) == 'Company' ? 'selected' : '' }}>
                        Company
                    </option>

                </select>

                @error('type')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Description</label>

                <textarea name="description" rows="4">{{ old('description', $holiday->description) }}</textarea>

                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status">

                    <option value="1" {{ old('status', $holiday->status) == 1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0" {{ old('status', $holiday->status) == 0 ? 'selected' : '' }}>
                        Inactive
                    </option>

                </select>

                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn update-btn">
                Update Holiday
            </button>

            <a href="{{ route('holidays.index') }}" class="btn back-btn">
                Back
            </a>

        </form>

    </div>

</body>

</html>
