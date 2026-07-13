@extends('layouts.app')


@section('content')
    <div class="d-flex justify-content-between mb-4">


        <div>

            <h2>
                Dashboard
            </h2>

            <p class="text-muted">
                Welcome to HR Management System
            </p>

        </div>


        <div>

            <button class="btn btn-primary">

                <i class="fa fa-user"></i>

                {{ auth()->user()->name ?? 'Admin' }}

            </button>

        </div>


    </div>





    <!-- Dashboard Cards -->

    <div class="row">



        <div class="col-md-3 mb-3">


            <div class="card-box bg-primary">


                <div class="d-flex justify-content-between">


                    <div>

                        <h6>
                            Employees
                        </h6>


                        <h2>
                            {{ $totalEmployees }}
                        </h2>


                    </div>


                    <i class="fa fa-users icon"></i>


                </div>


            </div>


        </div>





        <div class="col-md-3 mb-3">


            <div class="card-box bg-success">


                <div class="d-flex justify-content-between">


                    <div>

                        <h6>
                            Departments
                        </h6>


                        <h2>
                            {{ $totalDepartments }}
                        </h2>


                    </div>


                    <i class="fa fa-building icon"></i>


                </div>


            </div>


        </div>





        <div class="col-md-3 mb-3">


            <div class="card-box bg-warning">


                <div class="d-flex justify-content-between">


                    <div>

                        <h6>
                            Present Today
                        </h6>


                        <h2>
                            {{ $presentToday }}
                        </h2>


                    </div>


                    <i class="fa fa-check icon"></i>


                </div>


            </div>


        </div>





        <div class="col-md-3 mb-3">


            <div class="card-box bg-danger">


                <div class="d-flex justify-content-between">


                    <div>

                        <h6>
                            Absent Today
                        </h6>


                        <h2>
                            {{ $absentToday }}
                        </h2>


                    </div>


                    <i class="fa fa-times icon"></i>


                </div>


            </div>


        </div>


    </div>





    <!-- Tables -->


    <div class="row mt-4">



        <div class="col-md-6">


            <div class="card shadow border-0">


                <div class="card-header bg-white">

                    <h5>
                        Recent Employees
                    </h5>

                </div>



                <div class="card-body">


                    <table class="table">


                        <thead>

                            <tr>

                                <th>Name</th>

                                <th>Department</th>

                            </tr>

                        </thead>



                        <tbody>


                            @foreach ($recentEmployees as $employee)
                                <tr>


                                    <td>

                                        {{ $employee->user->name }}

                                    </td>


                                    <td>

                                        {{ $employee->department->name ?? '-' }}

                                    </td>


                                </tr>
                            @endforeach


                        </tbody>


                    </table>


                </div>


            </div>


        </div>





        <div class="col-md-6">


            <div class="card shadow border-0">


                <div class="card-header bg-white">

                    <h5>
                        Latest Notices
                    </h5>

                </div>



                <div class="card-body">


                    <table class="table">


                        <thead>

                            <tr>

                                <th>
                                    Title
                                </th>


                                <th>
                                    Date
                                </th>

                            </tr>

                        </thead>



                        <tbody>


                            @foreach ($recentNotices as $notice)
                                <tr>


                                    <td>

                                        {{ $notice->title }}

                                    </td>


                                    <td>

                                        {{ $notice->created_at->format('d M Y') }}

                                    </td>


                                </tr>
                            @endforeach


                        </tbody>


                    </table>


                </div>


            </div>


        </div>



    </div>
@endsection
