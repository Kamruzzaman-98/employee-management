@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Add Holiday</h3>
            </div>


        </div>



        <!-- Form -->

        <div class="form-wrapper">


            <form action="{{ route('holidays.store') }}" method="POST">


                @csrf



                <div class="form-group">

                    <label>
                        Holiday Title
                    </label>


                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter Holiday Title">


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


                    <input type="date" name="holiday_date" value="{{ old('holiday_date') }}">


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


                        <option value="">
                            Select Type
                        </option>


                        <option value="National" {{ old('type') == 'National' ? 'selected' : '' }}>
                            National
                        </option>


                        <option value="Religious" {{ old('type') == 'Religious' ? 'selected' : '' }}>
                            Religious
                        </option>


                        <option value="Company" {{ old('type') == 'Company' ? 'selected' : '' }}>
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


                    <textarea name="description" rows="4" placeholder="Write Description...">{{ old('description') }}</textarea>



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


                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                            Active
                        </option>


                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
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


                    <button type="submit" class="btn save-btn">

                        Save Holiday

                    </button>



                    <a href="{{ route('holidays.index') }}" class="btn back-btn">

                        Back

                    </a>


                </div>


            </form>


        </div>


    </div>
@endsection
