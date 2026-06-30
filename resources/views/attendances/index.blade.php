<table class="table">

<tr>

<th>Date</th>
<th>Check In</th>
<th>Check Out</th>
<th>Working</th>
<th>Late</th>
<th>Status</th>

</tr>

@foreach($attendances as $attendance)

<tr>

<td>{{ $attendance->attendance_date->format('d M Y') }}</td>

<td>{{ optional($attendance->check_in)->format('h:i A') }}</td>

<td>{{ optional($attendance->check_out)->format('h:i A') }}</td>

<td>{{ $attendance->working_minutes }} Min</td>

<td>{{ $attendance->late_minutes }} Min</td>

<td>{{ ucfirst($attendance->status) }}</td>

</tr>

@endforeach

</table>

{{ $attendances->links() }}
