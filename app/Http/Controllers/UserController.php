<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index(){
        $users = User::all();
        return view('back-office.users.index', compact('users'));
    }

    public function create(){
        $roles = Role::all();
        return view('back-office.users.create', compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->assignRole($request->role);

        toastr()->success('User created successfully!');
        return redirect()->route('users.index');
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('back-office.users.show', compact('user'));
    }


    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->save();

        toastr()->success('User updated successfully!');
        return redirect()->route('users.index');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        toastr()->success('User deleted successfully!');
        return redirect()->route('users.index');
    }
}
