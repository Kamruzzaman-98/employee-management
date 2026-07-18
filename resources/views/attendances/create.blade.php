@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">
            <div>
                <h3>Employee Attendance</h3>
                <small>{{ now()->format('d F Y') }}</small>
            </div>
        </div>

        <div class="form-wrapper">

            <!-- Employee Info -->
            <div class="attendance-card">

                <div class="form-group">
                    <label>Employee Code</label>
                    <input type="text" value="{{ auth()->user()->employee->employee_code }}" readonly>
                </div>

                <div class="form-group">
                    <label>Employee Name</label>
                    <input type="text" value="{{ auth()->user()->name }}" readonly>
                </div>

                <div class="form-group">
                    <label>Department</label>
                    <input type="text" value="{{ auth()->user()->employee->department->name }}" readonly>
                </div>

                <div class="form-group">
                    <label>Designation</label>
                    <input type="text" value="{{ auth()->user()->employee->designation->name }}" readonly>
                </div>

            </div>

            {{-- Not Checked In --}}
            @if (!$todayAttendance)
                <div class="attendance-card">

                    <div class="form-group">
                        <label>Status</label>
                        <span class="status pending">
                            Not Checked In
                        </span>
                    </div>

                    <div class="row">

                        <div class="form-group">
                            <label>Check In</label>
                            <input type="text" value="--" readonly>
                        </div>

                        <div class="form-group">
                            <label>Check Out</label>
                            <input type="text" value="--" readonly>
                        </div>

                    </div>

                </div>

                <form action="{{ route('attendance.checkin') }}" method="POST">
                    @csrf

                    <div class="button-group">

                        <button type="submit" class="btn save-btn">
                            ✔ Check In
                        </button>

                        <a href="{{ url()->previous() }}" class="btn back-btn">
                            Back
                        </a>

                    </div>

                </form>

                {{-- Checked In --}}
            @elseif(!$todayAttendance->check_out)
                <div class="attendance-card">

                    <div class="form-group">
                        <label>Status</label>
                        <span class="status active">
                            Checked In
                        </span>
                    </div>

                    <div class="row">

                        <div class="form-group">
                            <label>Check In</label>
                            <input type="text" value="{{ $todayAttendance->check_in->format('h:i A') }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Check Out</label>
                            <input type="text" value="--" readonly>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Working Time</label>
                        <input type="text" value="In Progress..." readonly>
                    </div>

                </div>

                <form action="{{ route('attendance.checkout') }}" method="POST">
                    @csrf

                    <div class="button-group">

                        <button type="submit" class="btn delete-btn">
                            ✔ Check Out
                        </button>

                        <a href="{{ route('attendance.index') }}" class="btn back-btn">
                            Back
                        </a>

                    </div>

                </form>

                {{-- Completed --}}
            @else
                <div class="success-message">
                    ✅ Today's Attendance Completed Successfully
                </div>

                <div class="attendance-card">

                    <div class="form-group">
                        <label>Status</label>
                        <span class="status active">
                            Present
                        </span>
                    </div>

                    <div class="row">

                        <div class="form-group">
                            <label>Check In</label>
                            <input type="text" value="{{ $todayAttendance->check_in->format('h:i A') }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Check Out</label>
                            <input type="text" value="{{ $todayAttendance->check_out->format('h:i A') }}" readonly>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Working Time</label>
                        <input type="text"
                            value="{{ $todayAttendance->check_in->diff($todayAttendance->check_out)->format('%h Hours %i Minutes') }}"
                            readonly>
                    </div>

                </div>

                <div class="button-group">
                    <a href="{{ route('attendance.index') }}" class="btn back-btn">
                        Back
                    </a>
                </div>
            @endif

        </div>

    </div>
@endsection
