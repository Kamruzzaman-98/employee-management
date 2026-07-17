@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Edit Leave Type</h3>
            </div>

        </div>

        <!-- Form -->

        <div class="form-wrapper">

            <form action="{{ route('leave-types.update', $leaveType->id) }}" method="POST">

                @csrf

                @method('PUT')

                <div class="form-group">

                    <label>
                        Leave Type Name
                    </label>

                    <input type="text" name="name" value="{{ old('name', $leaveType->name) }}"
                        placeholder="Enter leave type name">

                    @error('name')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label>
                        Maximum Days
                    </label>

                    <input type="number" name="max_days" value="{{ old('max_days', $leaveType->max_days) }}"
                        placeholder="Enter maximum days">

                    @error('max_days')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="row">

                    <div class="form-group">

                        <label>
                            Paid Leave
                        </label>

                        <select name="is_paid">

                            <option value="1" {{ old('is_paid', $leaveType->is_paid) == 1 ? 'selected' : '' }}>

                                Paid

                            </option>

                            <option value="0" {{ old('is_paid', $leaveType->is_paid) == 0 ? 'selected' : '' }}>

                                Unpaid

                            </option>

                        </select>

                        @error('is_paid')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="form-group">

                        <label>
                            Status
                        </label>

                        <select name="status">

                            <option value="1" {{ old('status', $leaveType->status) == 1 ? 'selected' : '' }}>

                                Active

                            </option>

                            <option value="0" {{ old('status', $leaveType->status) == 0 ? 'selected' : '' }}>

                                Inactive

                            </option>

                        </select>

                        @error('status')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="button-group">

                    <button type="submit" class="btn update-btn">

                        Update Leave Type

                    </button>

                    <a href="{{ route('leave-types.index') }}" class="btn back-btn">

                        Back

                    </a>

                </div>

            </form>

        </div>



    </div>
@endsection
