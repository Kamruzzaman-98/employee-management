<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $leaveTypes = LeaveType::latest()->paginate(10);

        return view('leave-types.index', compact('leaveTypes'));
    }

    public function create()
    {
        return view('leave-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'max_days' => 'required|integer|min:0',
        ]);

        LeaveType::create([
            'name' => $request->name,
            'max_days' => $request->max_days,
            'is_paid' => $request->is_paid,
            'status' => $request->status,
        ]);

        return redirect()->route('leave-types.index')
            ->with('success', 'Leave Type Created Successfully.');
    }

    public function edit(LeaveType $leaveType)
    {
        return view('leave-types.edit', compact('leaveType'));
    }

    public function update(Request $request, LeaveType $leaveType)
    {
        $request->validate([
            'name' => 'required|max:255',
            'max_days' => 'required|integer|min:0',
        ]);

        $leaveType->update([
            'name' => $request->name,
            'max_days' => $request->max_days,
            'is_paid' => $request->is_paid,
            'status' => $request->status,
        ]);

        return redirect()->route('leave-types.index')
            ->with('success', 'Leave Type Updated Successfully.');
    }
}
