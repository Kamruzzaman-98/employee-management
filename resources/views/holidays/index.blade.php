@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Holiday Management</h3>
            </div>


            <a href="{{ route('holidays.create') }}" class="add-btn">

                + Add Holiday

            </a>


        </div>



        <!-- Table -->

        <div class="table-wrapper">


            <table class="custom-table">


                <thead>

                    <tr>

                        <th width="80">#</th>

                        <th>Title</th>

                        <th>Holiday Date</th>

                        <th>Type</th>

                        <th>Description</th>

                        <th>Status</th>

                        <th width="200">Action</th>

                    </tr>

                </thead>



                <tbody>


                    @forelse($holidays as $holiday)
                        <tr>


                            <td>

                                {{ $loop->iteration }}

                            </td>


                            <td>

                                <div class="department-name">

                                    <div class="icon">

                                        🎉

                                    </div>

                                    <span>

                                        {{ $holiday->title }}

                                    </span>

                                </div>

                            </td>



                            <td>

                                {{ $holiday->holiday_date->format('d M, Y') }}

                            </td>



                            <td>

                                {{ ucfirst($holiday->type) }}

                            </td>



                            <td>

                                {{ $holiday->description }}

                            </td>



                            <td>


                                <span class="status {{ $holiday->status ? 'active' : 'inactive' }}">

                                    {{ $holiday->status ? 'Active' : 'Inactive' }}

                                </span>


                            </td>



                            <td>


                                <a href="{{ route('holidays.edit', $holiday->id) }}" class="action-btn edit">

                                    ✏ Edit

                                </a>



                                <form action="{{ route('holidays.destroy', $holiday->id) }}" method="POST"
                                    style="display:inline;">


                                    @csrf

                                    @method('DELETE')



                                    <button class="action-btn delete"
                                        onclick="return confirm('Are you sure you want to delete this holiday?')">

                                        🗑 Delete

                                    </button>


                                </form>


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="7" class="empty">

                                No Holiday Found

                            </td>

                        </tr>
                    @endforelse



                </tbody>


            </table>


        </div>


    </div>
@endsection
