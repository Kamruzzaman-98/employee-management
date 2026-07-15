@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Add Employee</h3>
            </div>


        </div>



        <!-- Form -->

        <div class="form-wrapper">


            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">


                @csrf



                <div class="form-group">

                    <label>
                        Full Name <span class="req">*</span>
                    </label>


                    <input type="text" name="name" placeholder="Enter Full Name" required>

                </div>




                <div class="form-group">

                    <label>
                        Email <span class="req">*</span>
                    </label>


                    <input type="email" name="email" placeholder="Enter Email" required>

                </div>




                <div class="form-group">

                    <label>
                        Phone
                    </label>


                    <input type="text" name="phone" placeholder="Enter Phone">

                </div>




                <div class="form-group">

                    <label>
                        Gender
                    </label>


                    <select name="gender">

                        <option value="">
                            Select Gender
                        </option>


                        <option value="male">
                            Male
                        </option>


                        <option value="female">
                            Female
                        </option>


                        <option value="other">
                            Other
                        </option>


                    </select>

                </div>





                <div class="row">


                    <div class="form-group">


                        <label>
                            Date of Birth
                        </label>


                        <input type="date" name="date_of_birth">


                    </div>




                    <div class="form-group">


                        <label>
                            Joining Date
                        </label>


                        <input type="date" name="joining_date">


                    </div>


                </div>





                <div class="form-group">


                    <label>
                        Address
                    </label>


                    <textarea name="address" rows="3" placeholder="Enter Address"></textarea>


                </div>





                <div class="form-group">


                    <label>
                        Department <span class="req">*</span>
                    </label>


                    <select name="department_id" required>


                        <option value="">
                            Select Department
                        </option>



                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">

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
                            <option value="{{ $designation->id }}">

                                {{ $designation->name }}

                            </option>
                        @endforeach


                    </select>


                </div>





                <div class="form-group">


                    <label>
                        Salary
                    </label>


                    <input type="number" name="salary" placeholder="Enter Salary">


                </div>





                <div class="form-group">


                    <label>
                        Employee Image
                    </label>


                    <input type="file" name="image">


                </div>





                <div class="form-group">


                    <label>
                        Status <span class="req">*</span>
                    </label>


                    <select name="status" required>


                        <option value="active">
                            Active
                        </option>


                        <option value="inactive">
                            Inactive
                        </option>


                        <option value="terminated">
                            Terminated
                        </option>


                    </select>


                </div>





                <div class="button-group">


                    <button type="submit" class="btn save-btn">

                        Save Employee

                    </button>



                    <a href="{{ route('employees.index') }}" class="btn back-btn">

                        Back

                    </a>


                </div>


            </form>


        </div>


    </div>
@endsection
