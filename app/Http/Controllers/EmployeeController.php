<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
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
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'designation_id' => $request->designation_id,
            'salary' => $request->salary,
            'image' => $imageName,
            'department_id' => $request->department_id,
        ]);

        return redirect()->route('employees.index');
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
