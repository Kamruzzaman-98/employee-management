@if(!$todayAttendance)

<form action="{{ route('attendance.checkin') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">
        Check In
    </button>
</form>

@elseif(!$todayAttendance->check_out)

<p>Check In: {{ $todayAttendance->check_in->format('h:i A') }}</p>

<form action="{{ route('attendance.checkout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">
        Check Out
    </button>
</form>

@else

<p>You have completed today's attendance.</p>

@endif
