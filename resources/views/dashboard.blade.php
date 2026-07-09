<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HR Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            background: #111827;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px;
        }

        .sidebar h3 {
            color: white;
            margin-bottom: 30px;
        }


        .sidebar a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 8px;
        }


        .sidebar a:hover {
            background: #2563eb;
            color: white;
        }


        .main {
            margin-left: 260px;
            padding: 25px;
        }


        .card-box {

            border: none;
            border-radius: 15px;
            padding: 20px;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .1);

        }


        .icon {

            font-size: 35px;
            opacity: .8;

        }
    </style>

</head>


<body>


    <!-- Sidebar -->

    <div class="sidebar">

        <h3>
            <i class="fa fa-users"></i>
            EMS
        </h3>


        <a href="/dashboard">
            <i class="fa fa-home"></i>
            Dashboard
        </a>


        <a href="/employees">
            <i class="fa fa-user"></i>
            Employees
        </a>


        <a href="/departments">
            <i class="fa fa-building"></i>
            Departments
        </a>


        <a href="/designations">
            <i class="fa fa-briefcase"></i>
            Designations
        </a>


        <a href="/attendance">
            <i class="fa fa-clock"></i>
            Attendance
        </a>


        <a href="/leaves">
            <i class="fa fa-calendar"></i>
            Leaves
        </a>


        <form action="/logout" method="POST" style="display: inline;">
            @csrf
            <button type="submit" style="border: none; padding: 0; cursor: pointer;">
                <i class="fa fa-sign-out"></i>
                Logout
            </button>
        </form>



    </div>



    <!-- Main Content -->


    <div class="main">


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




        <!-- Cards -->


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

                                    <th>Title</th>

                                    <th>Date</th>

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


    </div>


</body>

</html>
