@extends('layouts.app')

@section('content')
    <div class="card">

        <!-- Header -->
        <div class="card-header">

            <div>
                <h3>Leave Details</h3>
            </div>

            <a href="{{ route('leaves.index') }}" class="back-btn btn">

                ← Back to List

            </a>

        </div>

        <!-- Details -->
        <div class="details-wrapper">

            <table class="details-table">

                <tr>

                    <td>
                        Employee Name
                    </td>

                    <td>
                        {{ $leave->employee->user->name }}
                    </td>

                </tr>

                <tr>

                    <td>
                        Leave Type
                    </td>

                    <td>
                        {{ $leave->leaveType->name }}
                    </td>

                </tr>

                <tr>

                    <td>
                        From Date
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($leave->from_date)->format('d M Y') }}
                    </td>

                </tr>

                <tr>

                    <td>
                        To Date
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($leave->to_date)->format('d M Y') }}
                    </td>

                </tr>

                <tr>

                    <td>
                        Total Days
                    </td>

                    <td>
                        {{ $leave->total_days }}
                    </td>

                </tr>

                <tr>

                    <td>
                        Reason
                    </td>

                    <td>
                        {!! nl2br(e($leave->reason)) !!}
                    </td>

                </tr>

                <tr>

                    <td>
                        Status
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

                </tr>

                <tr>

                    <td>
                        Approved By
                    </td>

                    <td>
                        {{ $leave->approver->name ?? 'N/A' }}
                    </td>

                </tr>

                <tr>

                    <td>
                        Applied At
                    </td>

                    <td>
                        {{ $leave->created_at->format('d M Y h:i A') }}
                    </td>

                </tr>

                <tr>

                    <td>
                        Approved At
                    </td>

                    <td>
                        {{ $leave->updated_at ? $leave->updated_at->format('d M Y h:i A') : 'N/A' }}
                    </td>

                </tr>

            </table>

        </div>

    </div>
@endsection
