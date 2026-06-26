<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        return view('attendances.index');
    }

    public function checkIn()
    {
        $employeeId = auth()->user()->employee->id;
        $today = date('Y-m-d');

        $attendance = Attendance::where('employee_id', $employeeId)
            ->where('date', $today)
            ->first();

        if ($attendance) {
            return back()->with('error', 'Already checked in today');
        }

        Attendance::create([
            'employee_id' => $employeeId,
            'date' => $today,
            'check_in' => now()->format('H:i:s'),
            'status' => 'present'
        ]);

        return back()->with('success', 'Checked in successfully');
    }

    public function checkOut()
    {
        $employeeId = auth()->user()->employee->id;
        $today = date('Y-m-d');

        $attendance = Attendance::where('employee_id', $employeeId)
            ->where('date', $today)
            ->first();

        if (!$attendance) {
            return back()->with('error', 'Please check in first');
        }

        if ($attendance->check_out) {
            return back()->with('error', 'Already checked out');
        }

        $attendance->update([
            'check_out' => now()->format('H:i:s')
        ]);

        return back()->with('success', 'Checked out successfully');
    }
}
