<!DOCTYPE html>
<html>

<head>
    <title>Edit Notice</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }

        .container {
            width: 650px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: #fff;
            font-size: 14px;
            text-decoration: none;
        }

        .update-btn {
            background: #007bff;
        }

        .update-btn:hover {
            background: #0056b3;
        }

        .back-btn {
            background: #6c757d;
            margin-left: 8px;
        }

        .back-btn:hover {
            background: #5a6268;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }

        .row {
            display: flex;
            gap: 10px;
        }

        .row .form-group {
            flex: 1;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Edit Notice</h2>

    <form action="{{ route('notices.update', $notice->id) }}" method="POST">

        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="form-group">
            <label>Title</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $notice->title) }}"
                   placeholder="Enter title">

            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4"
                      placeholder="Write description...">{{ old('description', $notice->description) }}</textarea>

            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Dates -->
        <div class="row">

            <div class="form-group">
                <label>Publish Date</label>
                <input type="date"
                       name="publish_date"
                       value="{{ old('publish_date', $notice->publish_date) }}">

                @error('publish_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Expire Date</label>
                <input type="date"
                       name="expire_date"
                       value="{{ old('expire_date', $notice->expire_date) }}">

                @error('expire_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <!-- Created By (read-only optional) -->
        <div class="form-group">
            <label>Created By</label>
            <input type="text"
                   value="{{ $notice->creator->name ?? 'N/A' }}"
                   disabled>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label>Status</label>
            <select name="status">

                <option value="1" {{ old('status', $notice->status) == 1 ? 'selected' : '' }}>
                    Active
                </option>

                <option value="0" {{ old('status', $notice->status) == 0 ? 'selected' : '' }}>
                    Inactive
                </option>

            </select>

            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Buttons -->
        <button type="submit" class="btn update-btn">
            Update Notice
        </button>

        <a href="{{ route('notices.index') }}" class="btn back-btn">
            Back
        </a>

    </form>

</div>

</body>

</html>
