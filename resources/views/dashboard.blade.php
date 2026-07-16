@extends('layouts.app')

@section('content')
    <div class="dashboard-header">


        <div>

            <h2>
                Dashboard
            </h2>


            <p class="text-muted">
                Welcome to HR Management System
            </p>


        </div>


    </div>





    <!-- Dashboard Cards -->

    <div class="dashboard-cards">



        <div class="dashboard-card primary">


            <div>

                <h6>
                    Employees
                </h6>


                <h2>
                    {{ $totalEmployees }}
                </h2>


            </div>


            <i class="fa fa-users dashboard-icon"></i>


        </div>






        <div class="dashboard-card success">


            <div>

                <h6>
                    Departments
                </h6>


                <h2>
                    {{ $totalDepartments }}
                </h2>


            </div>


            <i class="fa fa-building dashboard-icon"></i>


        </div>






        <div class="dashboard-card warning">


            <div>

                <h6>
                    Present Today
                </h6>


                <h2>
                    {{ $presentToday }}
                </h2>


            </div>


            <i class="fa fa-check dashboard-icon"></i>


        </div>






        <div class="dashboard-card danger">


            <div>

                <h6>
                    Absent Today
                </h6>


                <h2>
                    {{ $absentToday }}
                </h2>


            </div>


            <i class="fa fa-times dashboard-icon"></i>


        </div>



    </div>








    <!-- Dashboard Tables -->


    <div class="dashboard-table-row">





        <div class="dashboard-panel">



            <div class="panel-header">

                <h5>
                    Recent Employees
                </h5>


            </div>




            <div class="panel-body">


                <table class="custom-table">


                    <thead>


                        <tr>

                            <th>
                                Name
                            </th>


                            <th>
                                Department
                            </th>


                        </tr>


                    </thead>





                    <tbody>


                        @forelse($recentEmployees as $employee)
                            <tr>


                                <td>

                                    {{ $employee->user->name }}

                                </td>



                                <td>

                                    {{ $employee->department->name ?? '-' }}

                                </td>


                            </tr>



                        @empty


                            <tr>

                                <td colspan="2" class="empty">

                                    No Employee Found

                                </td>

                            </tr>
                        @endforelse



                    </tbody>


                </table>


            </div>



        </div>








        <div class="dashboard-panel">



            <div class="panel-header">

                <h5>
                    Latest Notices
                </h5>


            </div>





            <div class="panel-body">


                <table class="custom-table">


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


                        @forelse($recentNotices as $notice)
                            <tr>


                                <td>

                                    {{ $notice->title }}

                                </td>



                                <td>

                                    {{ $notice->created_at->format('d M Y') }}

                                </td>


                            </tr>


                        @empty


                            <tr>

                                <td colspan="2" class="empty">

                                    No Notice Found

                                </td>

                            </tr>
                        @endforelse



                    </tbody>


                </table>


            </div>



        </div>





    </div>
@endsection
