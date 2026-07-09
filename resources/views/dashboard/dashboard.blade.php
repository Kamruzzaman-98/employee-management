
<div class="container py-4">

    <h3 class="mb-4">Dashboard</h3>

    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h6>Total Employees</h6>
                    <h2>{{ $totalEmployees }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h6>Total Departments</h6>
                    <h2>{{ $totalDepartments }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info shadow">
                <div class="card-body">
                    <h6>Total Designations</h6>
                    <h2>{{ $totalDesignations }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h6>Present Today</h6>
                    <h2>{{ $presentToday }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card border-danger shadow">
                <div class="card-body">
                    <h6>Absent Today</h6>
                    <h2 class="text-danger">{{ $absentToday }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-warning shadow">
                <div class="card-body">
                    <h6>Pending Leaves</h6>
                    <h2 class="text-warning">{{ $pendingLeaves }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-success shadow">
                <div class="card-body">
                    <h6>Approved Leaves</h6>
                    <h2 class="text-success">{{ $approvedLeaves }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header">
                    <strong>Recent Employees</strong>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Joining Date</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($recentEmployees as $employee)

                            <tr>
                                <td>{{ $employee->name }}</td>

                                <td>{{ $employee->department->name ?? '-' }}</td>

                                <td>{{ $employee->joining_date }}</td>
                            </tr>

                            @empty

                            <tr>
                                <td colspan="3" class="text-center">
                                    No Employee Found
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header">
                    <strong>Recent Notices</strong>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>

                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($recentNotices as $notice)

                            <tr>

                                <td>{{ $notice->title }}</td>

                                <td>{{ $notice->created_at->format('d M Y') }}</td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="2" class="text-center">
                                    No Notice Found
                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

