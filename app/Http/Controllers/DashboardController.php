<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Notice;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $totalEmployees = Employee::count();
        $totalDepartments = Department::count();
        $totalDesignations = Designation::count();

        $presentToday = Attendance::whereDate('date', $today)->count();
        $absentToday = $totalEmployees - $presentToday;

        $pendingLeaves = Leave::where('status', 'Pending')->count();
        $approvedLeaves = Leave::where('status', 'Approved')->count();
        $rejectedLeaves = Leave::where('status', 'Rejected')->count();

        $recentEmployees = Employee::latest()->take(5)->get();

        $recentNotices = Notice::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalEmployees',
            'totalDepartments',
            'totalDesignations',
            'presentToday',
            'absentToday',
            'pendingLeaves',
            'approvedLeaves',
            'rejectedLeaves',
            'recentEmployees',
            'recentNotices'
        ));
    }
}
