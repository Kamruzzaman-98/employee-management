@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Employee Management</h3>
            </div>


            <a href="{{ route('employees.create') }}" class="add-btn">

                + Add Employee

            </a>


        </div>




        <!-- Filter -->

        <form method="GET" action="{{ route('employees.index') }}" class="filter-form">


            <input type="text" name="search" placeholder="Search Name or Code" value="{{ request('search') }}">



            <select name="department_id">

                <option value="">
                    All Department
                </option>


                @foreach ($departments as $dept)
                    <option value="{{ $dept->id }}" {{ request('department_id') == $dept->id ? 'selected' : '' }}>

                        {{ $dept->name }}

                    </option>
                @endforeach


            </select>




            <select name="designation_id">

                <option value="">
                    All Designation
                </option>


                @foreach ($designations as $desig)
                    <option value="{{ $desig->id }}" {{ request('designation_id') == $desig->id ? 'selected' : '' }}>

                        {{ $desig->name }}

                    </option>
                @endforeach


            </select>




            <button type="submit" class="btn filter-btn">

                Filter

            </button>



            <a href="{{ route('employees.index') }}" class="btn reset-btn">

                Reset

            </a>


        </form>





        <!-- Table -->

        <div class="table-wrapper">


            <table class="custom-table">


                <thead>

                    <tr>

                        <th>Code</th>

                        <th>Name</th>

                        <th>Image</th>

                        <th>Email</th>

                        <th>Phone</th>

                        <th>Department</th>

                        <th>Designation</th>

                        <th>Salary</th>

                        <th>Status</th>

                        <th width="220">Action</th>

                    </tr>

                </thead>




                <tbody>


                    @forelse($employees as $employee)
                        <tr>


                            <td>

                                {{ $employee->employee_code }}

                            </td>




                            <td>

                                <div class="department-name">

                                    <div class="icon">

                                        👤

                                    </div>


                                    <span>

                                        {{ $employee->user->name }}

                                    </span>


                                </div>

                            </td>





                            <td>


                                @if ($employee->image)
                                    <img src="{{ asset('uploads/employees/' . $employee->image) }}" width="45"
                                        height="45" class="employee-img">
                                @else
                                    N/A
                                @endif


                            </td>





                            <td>

                                {{ $employee->user->email }}

                            </td>




                            <td>

                                {{ $employee->user->phone }}

                            </td>




                            <td>

                                {{ $employee->department->name }}

                            </td>




                            <td>

                                {{ $employee->designation->name }}

                            </td>




                            <td>

                                {{ $employee->salary }}

                            </td>





                            <td>


                                <span class="status {{ $employee->status ? 'active' : 'inactive' }}">

                                    {{ $employee->status ? 'Active' : 'Inactive' }}

                                </span>


                            </td>





                            <td>


                                <a href="{{ route('employees.profile', $employee->id) }}" class="action-btn view">

                                    👤 Profile

                                </a>




                                <a href="{{ route('employees.edit', $employee->id) }}" class="action-btn edit">

                                    ✏ Edit

                                </a>





                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                    style="display:inline;">


                                    @csrf

                                    @method('DELETE')



                                    <button class="action-btn delete" onclick="return confirm('Are you sure?')">

                                        🗑 Delete

                                    </button>


                                </form>


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="10" class="empty">

                                No Employee Found

                            </td>

                        </tr>
                    @endforelse



                </tbody>


            </table>


        </div>


    </div>
@endsection
