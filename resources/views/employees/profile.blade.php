@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Employee Profile</h3>
            </div>


            <a href="{{ route('employees.index') }}" class="back-btn btn">

                ← Back

            </a>

        </div>





        <!-- Profile Content -->

        <div class="profile-wrapper">



            <div class="profile-header">


                @if ($employee->image)
                    <img src="{{ asset('uploads/employees/' . $employee->image) }}" class="profile-image">
                @else
                    <div class="profile-placeholder">

                        👤

                    </div>
                @endif




                <div>

                    <h2>
                        {{ $employee->user->name }}
                    </h2>


                    <span class="status-badge">

                        {{ ucfirst($employee->status) }}

                    </span>


                </div>


            </div>







            <div class="profile-table">


                <div class="profile-row">

                    <div class="profile-label">
                        Email
                    </div>

                    <div>
                        {{ $employee->user->email }}
                    </div>

                </div>





                <div class="profile-row">

                    <div class="profile-label">
                        Phone
                    </div>

                    <div>
                        {{ $employee->user->phone }}
                    </div>

                </div>





                <div class="profile-row">

                    <div class="profile-label">
                        Employee ID
                    </div>

                    <div>
                        {{ $employee->employee_code }}
                    </div>

                </div>





                <div class="profile-row">

                    <div class="profile-label">
                        Department
                    </div>

                    <div>
                        {{ $employee->department->name ?? 'N/A' }}
                    </div>

                </div>





                <div class="profile-row">

                    <div class="profile-label">
                        Designation
                    </div>

                    <div>
                        {{ $employee->designation->name ?? 'N/A' }}
                    </div>

                </div>





                <div class="profile-row">

                    <div class="profile-label">
                        Salary
                    </div>

                    <div>
                        {{ $employee->salary }}
                    </div>

                </div>





                <div class="profile-row">

                    <div class="profile-label">
                        Joining Date
                    </div>

                    <div>
                        {{ $employee->joining_date }}
                    </div>

                </div>





                <div class="profile-row">

                    <div class="profile-label">
                        Address
                    </div>

                    <div>
                        {{ $employee->address }}
                    </div>

                </div>





            </div>




            <div class="profile-actions">


                <a href="{{ route('employees.edit', $employee->id) }}" class="btn update-btn">

                    ✏ Edit Profile

                </a>


            </div>



        </div>



    </div>
@endsection
