@extends('layouts.app')

@section('content')
    <div class="card">


        <!-- Header -->

        <div class="card-header">

            <div>
                <h3>Notice Management</h3>
            </div>


            <a href="{{ route('notices.create') }}" class="add-btn">

                + Create Notice

            </a>


        </div>



        <!-- Table -->

        <div class="table-wrapper">


            <table class="custom-table">


                <thead>

                    <tr>

                        <th width="60">#</th>

                        <th>Title</th>

                        <th>Description</th>

                        <th>Publish Date</th>

                        <th>Expire Date</th>

                        <th>Created By</th>

                        <th>Status</th>

                        <th width="250">Action</th>

                    </tr>

                </thead>



                <tbody>


                    @forelse($notices as $notice)
                        <tr>


                            <td>

                                {{ $loop->iteration }}

                            </td>



                            <td>

                                <div class="department-name">

                                    <div class="icon">

                                        📢

                                    </div>


                                    <span>

                                        <strong>{{ $notice->title }}</strong>

                                    </span>


                                </div>

                            </td>




                            <td class="desc" title="{{ $notice->description }}">

                                {{ $notice->description }}

                            </td>




                            <td>

                                {{ \Carbon\Carbon::parse($notice->publish_date)->format('d M, Y') }}

                            </td>




                            <td>

                                {{ \Carbon\Carbon::parse($notice->expire_date)->format('d M, Y') }}

                            </td>




                            <td>

                                <small>

                                    {{ $notice->creator->name }}

                                </small>

                            </td>




                            <td>


                                <span class="status {{ $notice->status ? 'active' : 'inactive' }}">

                                    {{ $notice->status ? 'Active' : 'Inactive' }}

                                </span>


                            </td>




                            <td>


                                <a href="{{ route('notices.show', $notice->id) }}" class="action-btn view">

                                    👁 View

                                </a>




                                <a href="{{ route('notices.edit', $notice->id) }}" class="action-btn edit">

                                    ✏ Edit

                                </a>





                                <form action="{{ route('notices.destroy', $notice->id) }}" method="POST"
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

                            <td colspan="8" class="empty">

                                No Notice Found

                            </td>

                        </tr>
                    @endforelse



                </tbody>


            </table>


        </div>


    </div>
@endsection
