<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {

        $roles = Role::latest()->get();
        $users = User::with('roles')->get();
        $perms = Permission::latest()->get();
        return view('superadmin.Roles.index', [
            'roles' => $roles,
            'users' => $users,
            'perms' => $perms
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);
        flash()->addSuccess('Role Succesfully Added!');
        return back();
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role->update([
            'name' => $request->name,
        ]);
        flash()->addSuccess('Role Succesfully Updated!');
        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();
        flash()->addSuccess('Role Deleted!');
        return back();
    }
}
