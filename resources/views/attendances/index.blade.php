@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">

            <div>
                <h3>Attendance History</h3>
            </div>

        </div>

        <!-- Table -->
        <div class="table-wrapper">

            <table class="custom-table">

                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Date</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Working Time</th>
                        <th>Late Time</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($attendances as $attendance)
                        <tr @if (auth()->user()->employee->id == $attendance->employee_id) style="background:#f0f8ff;" @endif>

                            <td>
                                {{ $attendance->employee->employee_code }}
                            </td>

                            <td>
                                {{ $attendance->attendance_date->format('d M Y') }}
                            </td>

                            <td>
                                {{ $attendance->check_in ? $attendance->check_in->format('h:i A') : '-' }}
                            </td>

                            <td>
                                {{ $attendance->check_out ? $attendance->check_out->format('h:i A') : '-' }}
                            </td>

                            <td>
                                @if ($attendance->working_minutes)
                                    {{ intdiv($attendance->working_minutes, 60) }}h
                                    {{ $attendance->working_minutes % 60 }}m
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                {{ $attendance->late_minutes ?? 0 }} min
                            </td>

                            <td>
                                <span
                                    class="status
                                    @if ($attendance->status == 'present') active
                                    @elseif($attendance->status == 'late')
                                        late
                                    @elseif($attendance->status == 'leave')
                                        leave
                                    @else
                                        inactive @endif">

                                    {{ ucfirst($attendance->status) }}

                                </span>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="empty">
                                No Attendance Records Found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div style="margin-top:20px; display:flex; justify-content:center;">
            {{ $attendances->links() }}
        </div>

    </div>
@endsection
