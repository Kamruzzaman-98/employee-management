<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Employee;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        $employees = Employee::with(['department', 'designation'])

            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%")
                    ->orWhere('id', 'like', "%{$request->search}%");
            })

            ->when($request->department_id, function ($query) use ($request) {
                $query->where('department_id', $request->department_id);
            })

            ->when($request->designation_id, function ($query) use ($request) {
                $query->where('designation_id', $request->designation_id);
            })

            ->latest()
            ->paginate(10);

        return view('employees.index', [
            'employees' => $employees,
            'departments' => Department::all(),
            'designations' => Designation::all(),
        ]);
    }

    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('employees.create', compact('designations', 'departments'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email|unique:employees,email',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        DB::transaction(function () use ($request, $imageName) {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('12345678'),
            ]);

            Employee::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'designation_id' => $request->designation_id,
                'salary' => $request->salary,
                'image' => $imageName,
                'department_id' => $request->department_id,
            ]);
        });

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        //
    }

    public function edit($id)
    {
        $departments = Department::all();
        $designations = Designation::all();
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee', 'designations', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imageName = $employee->image;

        if ($request->hasFile('image')) {

            if ($employee->image && file_exists(public_path('uploads/' . $employee->image))) {
                unlink(public_path('uploads/' . $employee->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'designation_id' => $request->designation_id,
            'department_id' => $request->department_id,
            'salary' => $request->salary,
            'image' => $imageName,
        ]);

        return redirect()->route('employees.index')->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->image && file_exists(public_path('uploads/' . $employee->image))) {
            unlink(public_path('uploads/' . $employee->image));
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Deleted successfully');
    }
}
