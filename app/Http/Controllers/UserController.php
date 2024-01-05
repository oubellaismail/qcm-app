<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Filiere;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller

{
    public function index() {
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

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role_id' => 'required',
        ]);
        
        if ($request['departement_id'] || $request['filiere_id']) {
            if ($request['role_id'] == 3 ){
                $validatedData['filiere_id'] = $request['filiere_id'];
                $validatedData['departement_id'] = Filiere::find($request['filiere_id'])->departement_id;
            }
            
            else {
                $validatedData['filiere_id'] = NULL;
                $validatedData['departement_id'] = $request['departement_id'];
            }
        }

        else {
            return back();
        }

        // dd($validatedData);
        // Create a new user
        User::create($validatedData);
        return redirect(route('user.index'))->with('success', 'Registration successful!');
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

    public function login(){
        return view ('users.login');
    }

    public function auth(){
        $form_fields = request()->validate([
            'email' => 'required|email', 
            'password' => 'required',
        ]);

        if(auth()->attempt($form_fields)) {
            return redirect(route('user.index'));
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
