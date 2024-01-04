<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller

{
    public function index() {
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.register');
    }
    

    // check register controller !
    public function store (Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $validatedData["role_id"] = $request["role"] == "professor" ? 2 : 3;          

        // Create a new user
        $user = User::create($validatedData);
        return redirect('/users')->with('success', 'Registration successful!');
    }

    public function edit (User $user){
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user->update($validatedData);

        return redirect(route('user.index'))->with('success', 'Updating successful!');

    }


    
    public function destroy(string $id) {
        $users=User::find($id);
        $users->delete();

        return redirect()->route('user.index')->with('success', 'Task created successfully!');
    }
}
