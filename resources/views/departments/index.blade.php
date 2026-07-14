@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Department Management</h3>
            </div>


            <a href="{{ route('departments.create') }}" class="add-btn">

                + Add Department

            </a>


        </div>



        <!-- Table -->

        <div class="table-wrapper">


            <table class="custom-table">


                <thead>

                    <tr>

                        <th width="80">ID</th>

                        <th>Department Name</th>

                        <th width="200">Action</th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($departments as $department)
                        <tr>


                            <td>

                                {{ $department->id }}

                            </td>


                            <td>

                                <div class="department-name">

                                    <div class="icon">

                                        🏢

                                    </div>

                                    <span>

                                        {{ $department->name }}

                                    </span>

                                </div>

                            </td>



                            <td>


                                <a href="{{ route('departments.edit', $department->id) }}" class="action-btn edit">

                                    ✏ Edit

                                </a>



                                <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
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

                            <td colspan="3" class="empty">

                                No Department Found

                            </td>

                        </tr>
                    @endforelse



                </tbody>


            </table>


        </div>


    </div>
@endsection
