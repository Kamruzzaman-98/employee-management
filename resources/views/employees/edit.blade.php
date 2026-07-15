@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Edit Employee</h3>
            </div>


        </div>



        <!-- Form -->

        <div class="form-wrapper">


            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">


                @csrf

                @method('PUT')




                <div class="form-group">

                    <label>
                        Name
                    </label>


                    <input type="text" name="name" value="{{ old('name', $employee->user->name) }}">


                    @error('name')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror


                </div>





                <div class="form-group">

                    <label>
                        Email
                    </label>


                    <input type="email" name="email" value="{{ old('email', $employee->user->email) }}">


                    @error('email')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror


                </div>





                <div class="form-group">

                    <label>
                        Phone
                    </label>


                    <input type="text" name="phone" value="{{ old('phone', $employee->user->phone) }}">


                    @error('phone')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror


                </div>





                <div class="form-group">


                    <label>
                        Gender
                    </label>


                    <select name="gender">


                        <option value="">
                            Select Gender
                        </option>



                        <option value="male" {{ old('gender', $employee->gender) == 'male' ? 'selected' : '' }}>

                            Male

                        </option>



                        <option value="female" {{ old('gender', $employee->gender) == 'female' ? 'selected' : '' }}>

                            Female

                        </option>



                        <option value="other" {{ old('gender', $employee->gender) == 'other' ? 'selected' : '' }}>

                            Other

                        </option>


                    </select>


                </div>





                <div class="row">


                    <div class="form-group">


                        <label>
                            Date of Birth
                        </label>


                        <input type="date" name="date_of_birth"
                            value="{{ old('date_of_birth', $employee->date_of_birth) }}">


                    </div>





                    <div class="form-group">


                        <label>
                            Joining Date
                        </label>


                        <input type="date" name="joining_date"
                            value="{{ old('joining_date', $employee->joining_date) }}">


                    </div>


                </div>





                <div class="form-group">


                    <label>
                        Address
                    </label>


                    <textarea name="address" rows="3">{{ old('address', $employee->address) }}</textarea>


                </div>





                <div class="form-group">


                    <label>
                        Department
                    </label>


                    <select name="department_id">


                        <option value="">
                            Select Department
                        </option>



                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>

                                {{ $department->name }}

                            </option>
                        @endforeach


                    </select>


                </div>





                <div class="form-group">


                    <label>
                        Designation
                    </label>


                    <select name="designation_id">


                        <option value="">
                            Select Designation
                        </option>



                        @foreach ($designations as $designation)
                            <option value="{{ $designation->id }}"
                                {{ old('designation_id', $employee->designation_id) == $designation->id ? 'selected' : '' }}>

                                {{ $designation->name }}

                            </option>
                        @endforeach


                    </select>


                </div>





                <div class="form-group">


                    <label>
                        Salary
                    </label>


                    <input type="number" step="0.01" name="salary" value="{{ old('salary', $employee->salary) }}">


                </div>





                <div class="form-group">


                    <label>
                        Status
                    </label>


                    <select name="status">


                        <option value="active" {{ old('status', $employee->status) == 'active' ? 'selected' : '' }}>

                            Active

                        </option>



                        <option value="inactive" {{ old('status', $employee->status) == 'inactive' ? 'selected' : '' }}>

                            Inactive

                        </option>



                        <option value="terminated"
                            {{ old('status', $employee->status) == 'terminated' ? 'selected' : '' }}>

                            Terminated

                        </option>


                    </select>


                </div>





                @if ($employee->image)
                    <div class="form-group">


                        <label>
                            Current Image
                        </label>


                        <br>


                        <img src="{{ asset('uploads/employees/' . $employee->image) }}" width="120"
                            class="employee-preview">


                    </div>
                @endif






                <div class="form-group">


                    <label>
                        Change Image
                    </label>


                    <input type="file" name="image">


                </div>






                <div class="button-group">


                    <button type="submit" class="btn update-btn">

                        Update Employee

                    </button>




                    <a href="{{ route('employees.index') }}" class="btn back-btn">

                        Back

                    </a>


                </div>


            </form>


        </div>


    </div>
@endsection
