<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //select * from etudiants; 
         $etudiants = Etudiant::all();

        
         //return $etudiants;
         return view('etudiant.index', ["etudiants" => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiant.create', ["villes" => $villes]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'nom' => 'required|string|max:100',
            'adresse' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|email',
            'date_de_naissance' => 'required|date'    
        ]);
        
        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'ville_id' => $request->ville,
            'date_de_naissance' => $request->date_de_naissance
        ]);
        // return $request;
        // return $request;

        return  redirect()->route('etudiant.show', $etudiant->id)->with('success', 'Etudiant créer avec succès  !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
      
        $ville = Ville::find($etudiant->ville_id);
        // return $ville;
        return view('etudiant.show', ['etudiant' => $etudiant, 'ville' => $ville]);
        
        // return view('etudiant.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $ville_etudiant = Ville::find($etudiant->ville_id);
        $villes = Ville::all();
        return view('etudiant.edit', ['etudiant' => $etudiant, 'ville_etudiant' => $ville_etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'adresse' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|email',
            'date_de_naissance' => 'required|date'
        ]);

        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'ville_id' => $request->ville,
            'date_de_naissance' => $request->date_de_naissance
        ]);

        return redirect()->route('etudiant.show', $etudiant->id)->with('success', 'Etudiant créer avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
       return redirect()->route('etudiant.index')->with('success', 'Etudiant supprimé avec succès!');
    }
}
