<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();

        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|unique:permissions,name'

        ]);


        Permission::create([

            'name' => $request->name,

            'guard_name' => 'web'

        ]);


        return redirect()->route('permissions.index')

            ->with('success', 'Permission Created Successfully');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([

            'name' => 'required|unique:permissions,name,' . $permission->id

        ]);

        $permission->update([

            'name' => $request->name

        ]);

        return redirect()->route('permissions.index')

            ->with('success', 'Permission Updated Successfully');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        $permission->roles()->detach();

        $permission->delete();

        return redirect()->route('permissions.index')
            ->with('success', 'Permission Deleted Successfully');
    }
}
