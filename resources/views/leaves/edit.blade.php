@extends('layouts.app')

@section('content')

<div class="card">

    <!-- Header -->
    <div class="card-header">

        <div>
            <h3>Edit Leave</h3>
        </div>

    </div>

    <!-- Form -->
    <div class="form-wrapper">

        <form action="{{ route('leaves.update', $leave->id) }}" method="POST">

            @csrf
            @method('PUT')

            <!-- Employee -->
            <div class="form-group">

                <label>
                    Employee
                </label>

                <input type="text"
                    value="{{ $leave->employee->user->name }}"
                    disabled>

                <input type="hidden"
                    name="employee_id"
                    value="{{ $leave->employee_id }}">

            </div>

            <!-- Leave Type -->
            <div class="form-group">

                <label>
                    Leave Type
                </label>

                <select name="leave_type_id">

                    @foreach($leaveTypes as $type)

                        <option value="{{ $type->id }}"
                            {{ old('leave_type_id', $leave->leave_type_id) == $type->id ? 'selected' : '' }}>

                            {{ $type->name }}

                        </option>

                    @endforeach

                </select>

                @error('leave_type_id')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- From Date -->
            <div class="form-group">

                <label>
                    From Date
                </label>

                <input type="date"
                    name="from_date"
                    value="{{ old('from_date', $leave->from_date) }}">

                @error('from_date')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- To Date -->
            <div class="form-group">

                <label>
                    To Date
                </label>

                <input type="date"
                    name="to_date"
                    value="{{ old('to_date', $leave->to_date) }}">

                @error('to_date')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- Reason -->
            <div class="form-group">

                <label>
                    Reason
                </label>

                <textarea
                    name="reason"
                    rows="4"
                    placeholder="Write your reason...">{{ old('reason', $leave->reason) }}</textarea>

                @error('reason')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <!-- Buttons -->
            <div class="button-group">

                <button type="submit" class="btn update-btn">

                    Update Leave

                </button>

                <a href="{{ route('leaves.index') }}" class="btn back-btn">

                    Back

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
