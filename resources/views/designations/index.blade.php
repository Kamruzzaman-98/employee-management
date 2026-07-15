@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Designation Management</h3>
            </div>


            <a href="{{ route('designations.create') }}" class="add-btn">

                + Add Designation

            </a>


        </div>



        <!-- Table -->

        <div class="table-wrapper">


            <table class="custom-table">


                <thead>

                    <tr>

                        <th width="80">ID</th>

                        <th>Designation Name</th>

                        <th width="200">Action</th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($designations as $designation)
                        <tr>


                            <td>

                                {{ $designation->id }}

                            </td>


                            <td>

                                <div class="department-name">

                                    <div class="icon">

                                        💼

                                    </div>

                                    <span>

                                        {{ $designation->name }}

                                    </span>

                                </div>

                            </td>



                            <td>


                                <a href="{{ route('designations.edit', $designation->id) }}" class="action-btn edit">

                                    ✏ Edit

                                </a>



                                <form action="{{ route('designations.destroy', $designation->id) }}" method="POST"
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

                                No Designation Found

                            </td>

                        </tr>
                    @endforelse



                </tbody>


            </table>


        </div>


    </div>
@endsection
