<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartementRequest;
use App\Http\Requests\UpdateDepartementRequest;
use App\Models\Departement;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('departements.index', [
            'departments' => Departement::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $formfieldes = request()->validate([
            'name' => 'required'
        ]);

        Departement::create($formfieldes);

        return redirect(route('departement.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        $departement->load('professors');

        return view('departements.show', [
            'department' => $departement,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartementRequest $request, Departement $departement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        $departement->delete();

        return redirect()->route('departement.index');
    }

}
