<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $employee = auth()->user()->employee;

        $attendances = Attendance::where('employee_id', $employee->id)
            ->latest('attendance_date')
            ->paginate(20);

        return view('attendances.index', compact('attendances'));
    }

    public function checkIn()
    {
        $employee = auth()->user()->employee;

        $today = Carbon::today();

        $attendance = Attendance::where('employee_id', $employee->id)
            ->whereDate('attendance_date', $today)
            ->first();

        if ($attendance) {
            return back()->with('error', 'Already checked in.');
        }

        $officeStart = Carbon::today()->setTime(9, 0);

        $now = now();

        $late = 0;

        $status = 'present';

        if ($now->greaterThan($officeStart)) {
            $late = $officeStart->diffInMinutes($now);
            $status = 'late';
        }

        Attendance::create([

            'employee_id' => $employee->id,

            'attendance_date' => $today,

            'check_in' => $now,

            'late_minutes' => $late,

            'status' => $status,

        ]);

        return back()->with('success', 'Check In Successful.');
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
