@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Department Management</h3>
            </div>

            @can('department-create')
                <a href="{{ route('departments.create') }}" class="add-btn">

                    + Add Department

                </a>
            @endcan


        </div>



        <!-- Table -->

        <div class="table-wrapper">


            <table class="custom-table">


                <thead>

                    <tr>

                        <th width="80">ID</th>

                        <th>Department Name</th>

                        @canany(['department-edit', 'department-delete'])
                            <th width="200">Action</th>
                        @endcanany

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


                            @canany(['department-edit', 'department-delete'])
                                <td>

                                    @can('department-edit')
                                        <a href="{{ route('departments.edit', $department->id) }}" class="action-btn edit">

                                            ✏ Edit

                                        </a>
                                    @endcan


                                    @can('department-delete')
                                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                            style="display:inline;">


                                            @csrf

                                            @method('DELETE')


                                            <button class="action-btn delete" onclick="return confirm('Are you sure?')">

                                                🗑 Delete

                                            </button>
                                        </form>
                                    @endcan


                                </td>
                            @endcanany


                        </tr>


                    @empty


                        <tr>

                            @canany(['department-edit', 'department-delete'])
                                <td colspan="3" class="empty">No Department Found</td>
                            @else
                                <td colspan="2" class="empty">No Department Found</td>
                            @endcanany

                        </tr>
                    @endforelse



                </tbody>


            </table>


        </div>


    </div>
@endsection
