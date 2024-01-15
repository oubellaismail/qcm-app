<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use App\Models\Filiere;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller

{
    public function index() {
        if (auth()->user()->role->id != 1) {
            abort(404);
        }
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.register', [
            'departements' => Departement::all(),
            'filieres' => Filiere::all(),
            'roles' => Role::all()
        ]);
    }
    

    // check register controller !
    public function store (Request $request) {

        if($request['departement_id']) {
            $validator = $request->validate([
                'departement_id' => 'required'
            ]);
        }

        else {
            if ($request['filiere_id']) {
                $validator = $request->validate([
                    'filiere_id' => 'required'
                ]);
            }
            else {
                return back() -> withErrors([
                    'error' => 'Departement or filiere must be provided'
                ]);
            }
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role_id' => 'required',
        ]);
        
        $user = User::create($validatedData);
        $validator['user_id'] = $user->id;
        
        if($request['departement_id']) {
            Professor::create($validator);
        }
        if ($request['filiere_id']) {
            Student::create($validator);
        }



        // dd($validatedData);
        // Create a new user
        return redirect(route('user.index'))->with('success', 'Registration successful!');
    }

    public function edit (User $user){
        if (auth()->user()->role->id != 1) {
            abort(404);
        }
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

    public function login(){
        return view ('users.login');
    }

    public function auth(){
        $form_fields = request()->validate([
            'email' => 'required|email', 
            'password' => 'required',
        ]);

        if(auth()->attempt($form_fields)) {
            if(auth()->user()->role->id == 1)
                return redirect(route('user.index'));
            else 
                if (auth()->user()->role->id == 2)
                    return redirect(route('quiz.index'));
                else 
                    return redirect(view ('student.index'));
        }

        return back() -> withErrors([
            'error' => 'Invalid email or password'
        ]);

    }

    public function logout() {
        auth()->logout();
        return redirect(route('user.index'));
    }
}
