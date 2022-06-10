<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('back-office.roles.index', compact('roles'));
    }

    public function create(){
        $permissions = Permission::all();
        return view('back-office.roles.create', compact('permissions'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles|max:255',
            'permissions' => 'required',
        ]);
        $role = Role::create([
            'name' => $request->name,
        ]);
        $role->givePermissionTo($request->permissions);

        toastr()->success('Role created successfully.');
        return redirect()->route('roles.index');
    }

    public function show($id){
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('back-office.roles.show', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:roles,name,'.$id,
            'permissions' => 'required',
        ]);
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
        ]);
        $role->syncPermissions($request->permissions);

        toastr()->success('Role updated successfully.');
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        toastr()->success('Role deleted successfully.');
        return redirect()->route('roles.index');
    }
}
