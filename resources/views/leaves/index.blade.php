@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">

            <div>
                <h3>Leave Management</h3>
            </div>

            <a href="{{ route('leaves.create') }}" class="add-btn">
                + Add Leave
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
                        <th width="80">#</th>
                        <th>Employee</th>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Total Days</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th width="220">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($leaves as $leave)
                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <div class="department-name">

                                    <div class="icon">
                                        👤
                                    </div>

                                    <span>
                                        {{ $leave->employee->user->name ?? 'N/A' }}
                                    </span>

                                </div>
                            </td>

                            <td>
                                {{ $leave->leavetype->name }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($leave->from_date)->format('d M, Y') }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($leave->to_date)->format('d M, Y') }}
                            </td>

                            <td>
                                {{ $leave->total_days }}
                            </td>

                            <td>
                                {{ $leave->reason }}
                            </td>

                            <td>

                                <span
                                    class="status
                                @if ($leave->status == 'approved') active
                                @elseif($leave->status == 'pending')
                                    pending
                                @else
                                    inactive @endif">

                                    {{ ucfirst($leave->status) }}

                                </span>

                            </td>

                            <td>

                                <a href="{{ route('leaves.show', $leave->id) }}" class="action-btn view">
                                    👁 View
                                </a>

                                <a href="{{ route('leaves.edit', $leave->id) }}" class="action-btn edit">
                                    ✏ Edit
                                </a>

                                <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST"
                                    style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button class="action-btn delete"
                                        onclick="return confirm('Are you sure you want to delete this leave?')">

                                        🗑 Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" class="empty">
                                No Leave Found
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div style="margin-top:20px;">
            {{ $leaves->links() }}
        </div>

    </div>
@endsection
