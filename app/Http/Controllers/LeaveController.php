<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\LeaveType;
use Carbon\Carbon;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with(['employee', 'leaveType', 'approver'])
            ->latest()
            ->paginate(10);

        return view('leaves.index', compact('leaves'));
    }

    public function create()
    {
        $userId = auth()->id();

        $employee = Employee::where('user_id', $userId)->first();
        $leaveTypes = LeaveType::where('status', 1)->get();

        return view('leaves.create', compact('employee', 'leaveTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type_id' => 'required|exists:leave_types,id',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'required',
        ]);

        $days = Carbon::parse($request->from_date)
            ->diffInDays(Carbon::parse($request->to_date)) + 1;

        Leave::create([
            'employee_id' => $request->employee_id,
            'leave_type_id' => $request->leave_type_id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'total_days' => $days,
            'reason' => $request->reason,
        ]);

        return redirect()->route('leaves.index')
            ->with('success', 'Leave Created Successfully.');
    }
}
