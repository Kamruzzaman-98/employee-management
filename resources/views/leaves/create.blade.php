@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">

            <div>
                <h3>Apply Leave</h3>
            </div>

        </div>

        <!-- Form -->
        <div class="form-wrapper">

            <form action="{{ route('leaves.store') }}" method="POST">

                @csrf

                <!-- Employee -->
                <div class="form-group">

                    <label>
                        Employee
                    </label>

                    <input type="text" value="{{ $employee->user->name }}" disabled>

                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                </div>

                <!-- Leave Type -->
                <div class="form-group">

                    <label>
                        Leave Type
                    </label>

                    <select name="leave_type_id">

                        <option value="">
                            Select Leave Type
                        </option>

                        @foreach ($leaveTypes as $type)
                            <option value="{{ $type->id }}" {{ old('leave_type_id') == $type->id ? 'selected' : '' }}>

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

                    <input type="date" name="from_date" value="{{ old('from_date') }}">

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

                    <input type="date" name="to_date" value="{{ old('to_date') }}">

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

                    <textarea name="reason" rows="4" placeholder="Write your reason...">{{ old('reason') }}</textarea>

                    @error('reason')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <!-- Buttons -->
                <div class="button-group">

                    <button type="submit" class="btn save-btn">
                        Save Leave
                    </button>

                    <a href="{{ route('leaves.index') }}" class="btn back-btn">
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>
@endsection
