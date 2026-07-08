<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        return redirect()
            ->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('roles.edit', compact('role'));
    }
}
