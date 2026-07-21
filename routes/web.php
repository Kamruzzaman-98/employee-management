<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('departments', DepartmentController::class)->middleware('permission:department-view');
Route::resource('employees', EmployeeController::class);

Route::get('/employees/{id}/profile', [EmployeeController::class, 'profile'])->name('employees.profile');

Route::middleware(['auth'])->get('/my-profile', [EmployeeController::class, 'myProfile'])->name('my.profile');

Route::resource('designations', DesignationController::class);
Route::resource('leave-types', LeaveTypeController::class);
Route::resource('leaves', LeaveController::class);

Route::middleware('auth')->group(function () {

    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');

    Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');

    Route::post('/attendance/check-in', [AttendanceController::class, 'checkIn'])->name('attendance.checkin');

    Route::post('/attendance/check-out', [AttendanceController::class, 'checkOut'])->name('attendance.checkout');

    Route::resource('roles', RoleController::class);

    Route::get('roles/{id}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions');

    Route::post('roles/{id}/permissions', [RoleController::class, 'permissionsUpdate'])->name('roles.permissions.update');

    Route::resource('permissions', PermissionController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('permission:dashboard-view')->name('dashboard');
});

Route::middleware(['role:HR'])->prefix('hr')->group(function () {

    Route::get('/leave-requests', [LeaveController::class, 'hrIndex'])
        ->name('leave.index');

    Route::put('/leave/{leave}/approve', [LeaveController::class, 'approve'])
        ->name('leave.approve');

    Route::put('/leave/{leave}/reject', [LeaveController::class, 'reject'])
        ->name('leave.reject');

    Route::resource('holidays', HolidayController::class);

    Route::resource('notices', NoticeController::class);
});


require __DIR__ . '/auth.php';
