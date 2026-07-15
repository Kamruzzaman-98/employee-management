@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Edit Holiday</h3>
            </div>


        </div>



        <!-- Form -->

        <div class="form-wrapper">


            <form action="{{ route('holidays.update', $holiday->id) }}" method="POST">


                @csrf

                @method('PUT')



                <div class="form-group">

                    <label>
                        Holiday Title
                    </label>


                    <input type="text" name="title" value="{{ old('title', $holiday->title) }}"
                        placeholder="Enter Holiday Title">


                    @error('title')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror


                </div>




                <div class="form-group">

                    <label>
                        Holiday Date
                    </label>


                    <input type="date" name="holiday_date"
                        value="{{ old('holiday_date', $holiday->holiday_date->format('Y-m-d')) }}">


                    @error('holiday_date')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror


                </div>




                <div class="form-group">

                    <label>
                        Holiday Type
                    </label>


                    <select name="type">


                        <option value="National" {{ old('type', $holiday->type) == 'National' ? 'selected' : '' }}>
                            National
                        </option>


                        <option value="Religious" {{ old('type', $holiday->type) == 'Religious' ? 'selected' : '' }}>
                            Religious
                        </option>


                        <option value="Company" {{ old('type', $holiday->type) == 'Company' ? 'selected' : '' }}>
                            Company
                        </option>


                    </select>



                    @error('type')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror


                </div>




                <div class="form-group">


                    <label>
                        Description
                    </label>


                    <textarea name="description" rows="4" placeholder="Write Description...">{{ old('description', $holiday->description) }}</textarea>



                    @error('description')
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


                        <option value="1" {{ old('status', $holiday->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>


                        <option value="0" {{ old('status', $holiday->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>


                    </select>



                    @error('status')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror


                </div>




                <div class="button-group">


                    <button type="submit" class="btn update-btn">

                        Update Holiday

                    </button>



                    <a href="{{ route('holidays.index') }}" class="btn back-btn">

                        Back

                    </a>


                </div>


            </form>


        </div>


    </div>
@endsection
