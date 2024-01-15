<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreFiliereRequest;
use App\Http\Requests\UpdateFiliereRequest;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('filieres.index', [
            'filieres' => Filiere::all()
        ]);
    }

    public function students(Filiere $filiere){

        $filiere->load('students');

        return view('filieres.students', [
            'filiere' => $filiere
        ]);
    }
    public function professors(Filiere $filiere){

        $filiere->load('professors');

        return view('filieres.professors', [
            'filiere' => $filiere
        ]);
    }


    public function notAssignedProfessors(Filiere $filiere)
    {
        // Fetch all professors that do not belong to the current filiere
        $professors = Professor::whereNotExists(function ($query) use ($filiere) {
            $query->select(DB::raw(1))
                ->from('filiere_professor')
                ->whereColumn('filiere_professor.professor_id', 'professors.id')
                ->where('filiere_professor.filiere_id', $filiere->id);
        })
            ->where('departement_id', $filiere->departement_id)
            ->get();

        // dd($professors);

        return view('filieres.assign-professors', compact('filiere', 'professors'));
    }


    public function assignProfessors(Request $request, Filiere $filiere)
    {
        // Validate the form data if needed

        // Get the selected professor IDs from the form
        $selectedProfessors = $request->input('professors', []);

        // Attach the selected professors to the filiere
        $filiere->professors()->attach($selectedProfessors);

        // Redirect back or to a success page
        return redirect()->back()->with('success', 'Professors assigned successfully');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFiliereRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Filiere $filiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFiliereRequest $request, Filiere $filiere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        //
    }
}
