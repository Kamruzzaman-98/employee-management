<!DOCTYPE html>
<html>

<head>
    <title>All Notice</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        h2 {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 8px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #2c3e50;
            color: #fff;
            font-size: 14px;
        }

        tr:hover {
            background: #f9fafc;
        }

        .btn {
            padding: 7px 12px;
            border-radius: 6px;
            color: #fff;
            text-decoration: none;
            font-size: 13px;
            border: none;
            cursor: pointer;
        }

        .add-btn {
            background: #007bff;
        }

        .add-btn:hover {
            background: #0056b3;
        }

        .edit-btn {
            background: #ffc107;
            color: #000;
        }

        .delete-btn {
            background: #dc3545;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            color: #fff;
            display: inline-block;
        }

        .active {
            background: #28a745;
        }

        .inactive {
            background: #dc3545;
        }

        .desc {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .small {
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="top-bar">
            <h2>All Notice</h2>

            <a href="{{ route('notices.create') }}" class="btn add-btn">
                + Create Notice
            </a>
        </div>

        <table>

            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Publish Date</th>
                    <th>Expire Date</th>
                    <th>Created By</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($notices as $notice)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td><strong>{{ $notice->title }}</strong></td>

                        <td class="desc" title="{{ $notice->description }}">
                            {{ $notice->description }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($notice->publish_date)->format('d M, Y') }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($notice->expire_date)->format('d M, Y') }}
                        </td>

                        <td class="small">
                            {{ $notice->creator->name }}
                        </td>

                        <td>
                            <span class="badge {{ $notice->status ? 'active' : 'inactive' }}">
                                {{ $notice->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        <td>

                            <a href="{{ route('notices.edit', $notice->id) }}" class="btn edit-btn">
                                Edit
                            </a>

                            {{-- <form action="{{ route('items.destroy', $item->id) }}" method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn delete-btn" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>

                            </form>  --}}

                        </td>

                    </tr>
                @empty

                    <tr>
                        <td colspan="8">No Notice Found</td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</body>

</html>
