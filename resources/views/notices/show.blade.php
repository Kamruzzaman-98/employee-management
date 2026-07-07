<!DOCTYPE html>
<html>

<head>
    <title>Notice Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, .1);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            border: 1px solid #ddd;
            padding: 12px;
            vertical-align: top;
        }

        table td:first-child {
            width: 220px;
            font-weight: bold;
            background: #f8f9fa;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
        }

        .active {
            background: green;
        }

        .inactive {
            background: red;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #0056b3;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Notice Details</h2>

        <table>

            <tr>
                <td>Title</td>
                <td>{{ $notice->title }}</td>
            </tr>

            <tr>
                <td>Description</td>
                <td>{!! nl2br(e($notice->description)) !!}</td>
            </tr>

            <tr>
                <td>Publish Date</td>
                <td>{{ \Carbon\Carbon::parse($notice->publish_date)->format('d M Y') }}</td>
            </tr>

            <tr>
                <td>Expire Date</td>
                <td>
                    {{ $notice->expire_date ? \Carbon\Carbon::parse($notice->expire_date)->format('d M Y') : 'N/A' }}
                </td>
            </tr>

            <tr>
                <td>Status</td>
                <td>
                    <span class="badge {{ $notice->status ? 'active' : 'inactive' }}">
                        {{ $notice->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>Created By</td>
                <td>{{ $notice->creator->name ?? 'N/A' }}</td>
            </tr>

            <tr>
                <td>Created At</td>
                <td>{{ $notice->created_at->format('d M Y h:i A') }}</td>
            </tr>

            <tr>
                <td>Updated At</td>
                <td>{{ $notice->updated_at->format('d M Y h:i A') }}</td>
            </tr>

        </table>

        <a href="{{ route('notices.index') }}" class="btn">
            ← Back to List
        </a>

    </div>

</body>

</html>
