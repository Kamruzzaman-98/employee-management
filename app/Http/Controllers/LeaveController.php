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

    public function edit($id)
    {
        $leave = Leave::findOrFail($id);
        $employees = Employee::all();
        $leaveTypes = LeaveType::where('status', 1)->get();

        return view('leaves.edit', compact('leave', 'employees', 'leaveTypes'));
    }

    public function update(Request $request, $id)
    {
        $leave = Leave::findOrFail($id);

        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type_id' => 'required|exists:leave_types,id',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'required',
        ]);

        $days = Carbon::parse($request->from_date)
            ->diffInDays(Carbon::parse($request->to_date)) + 1;

        $leave->update([
            'employee_id' => $request->employee_id,
            'leave_type_id' => $request->leave_type_id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'total_days' => $days,
            'reason' => $request->reason,
        ]);

        return redirect()->route('leaves.index')
            ->with('success', 'Leave Updated Successfully.');
    }

    public function destroy($id)
    {
        $leave = Leave::findOrFail($id);

        $leave->delete();

        return redirect()->route('leaves.index')
            ->with('success', 'Leave Deleted Successfully.');
    }

    public function hrIndex()
    {
        $leaves = Leave::with('employee')->latest()->get();

        return view('hr.leave.index', compact('leaves'));
    }

    public function approve(Leave $leave)
    {

        if ($leave->status != 'Pending') {
            abort(403, 'Already processed');
        }

        $leave->update([
            'status' => 'Approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Leave Approved Successfully');
    }

    public function reject(Leave $leave)
    {
        if ($leave->status != 'Pending') {
            abort(403, 'Already processed');
        }

        $leave->update([
            'status' => 'Rejected',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Leave Rejected Successfully');
    }
}
