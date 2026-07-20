@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">

            <div>
                <h3>Leave Requests</h3>
            </div>

        </div>


        <!-- Table -->
        <div class="table-wrapper">

            <table class="custom-table">

                <thead>
                    <tr>
                        <th width="80">#</th>
                        <th>Code</th>
                        <th>Employee</th>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Total Days</th>
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
                                {{ $leave->employee->employee_code ?? 'N/A' }}
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
                                {{ $leave->leaveType->name ?? 'N/A' }}
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


                                @if ($leave->status == 'pending')
                                    <form action="{{ route('leave.approve', $leave->id) }}" method="POST"
                                        style="display:inline;">

                                        @csrf
                                        @method('PUT')

                                        <button class="action-btn view">
                                            ✔ Approve
                                        </button>

                                    </form>



                                    <form action="{{ route('leave.reject', $leave->id) }}" method="POST"
                                        style="display:inline;">

                                        @csrf
                                        @method('PUT')

                                        <button class="action-btn delete">
                                            ✖ Reject
                                        </button>

                                    </form>
                                @else
                                    <span class="no-action">
                                        No Action
                                    </span>
                                @endif


                            </td>


                        </tr>


                    @empty

                        <tr>

                            <td colspan="9" class="empty">
                                No Leave Request Found
                            </td>

                        </tr>
                    @endforelse


                </tbody>


            </table>


        </div>


    </div>
@endsection
