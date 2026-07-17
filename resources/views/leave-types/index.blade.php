@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">

            <div>
                <h3>Leave Types Management</h3>
            </div>

            <a href="{{ route('leave-types.create') }}" class="add-btn">
                + Add Leave Type
            </a>

        </div>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="table-wrapper">

            <table class="custom-table">

                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th>Leave Type</th>
                        <th>Max Days</th>
                        <th>Paid</th>
                        <th>Status</th>
                        <th width="250">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($leaveTypes as $leave)
                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <div class="department-name">

                                    <div class="icon">
                                        📝
                                    </div>

                                    <span>
                                        <strong>{{ $leave->name }}</strong>
                                    </span>

                                </div>
                            </td>

                            <td>
                                {{ $leave->max_days }}
                            </td>

                            <td>
                                <span class="status {{ $leave->is_paid ? 'active' : 'inactive' }}">
                                    {{ $leave->is_paid ? 'Paid' : 'Unpaid' }}
                                </span>
                            </td>

                            <td>
                                <span class="status {{ $leave->status ? 'active' : 'inactive' }}">
                                    {{ $leave->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td>

                                {{-- <a href="{{ route('leave-types.show', $leave->id) }}" class="action-btn view">
                                    👁 View
                                </a> --}}

                                <a href="{{ route('leave-types.edit', $leave->id) }}" class="action-btn edit">
                                    ✏ Edit
                                </a>

                                <form action="{{ route('leave-types.destroy', $leave->id) }}" method="POST"
                                    style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="action-btn delete"
                                        onclick="return confirm('Are you sure?')">
                                        🗑 Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="empty">
                                No Leave Types Found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="pagination-wrapper">
            {{ $leaveTypes->links() }}
        </div>

    </div>
@endsection
