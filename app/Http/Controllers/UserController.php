<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller

{
    public function create()
    {
    return view('/registrer');
    }
    public function index()
{
    $users = User::all();
    return view('index', compact('users'));
}
public function destroy(string $id)
{
    $users=User::find($id);
    $users->delete();

    return redirect()->route('home')->with('success', 'Task created successfully!');
}
}
