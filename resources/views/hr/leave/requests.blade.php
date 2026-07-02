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

        <td>{{ $leave->status }}</td>

        <td>

            @if($leave->status=='Pending')

                <form action="{{ route('leave.approve',$leave->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-success btn-sm">
                        Approve
                    </button>
                </form>

                <form action="{{ route('leave.reject',$leave->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-danger btn-sm">
                        Reject
                    </button>
                </form>

            @endif

        </td>

    </tr>

    @endforeach

    </tbody>
</table>
