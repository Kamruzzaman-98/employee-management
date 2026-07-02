<table class="table">

    <thead>
        <tr>
            <th>Employee</th>
            <th>Type</th>
            <th>From</th>
            <th>To</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

    @foreach($leaves as $leave)

        <tr>
            <td>{{ $leave->employee->name }}</td>
            <td>{{ $leave->leave_type }}</td>
            <td>{{ $leave->from_date }}</td>
            <td>{{ $leave->to_date }}</td>
            <td>
                <span>
                    {{ $leave->status }}
                </span>
            </td>

            <td>

                @if($leave->status == 'Pending')

                    <form action="{{ route('hr.leave.approve', $leave->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success btn-sm">
                            Approve
                        </button>
                    </form>

                    <form action="{{ route('hr.leave.reject', $leave->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-danger btn-sm">
                            Reject
                        </button>
                    </form>

                @else
                    <span>No Action</span>
                @endif

            </td>
        </tr>

    @endforeach

    </tbody>
</table>
