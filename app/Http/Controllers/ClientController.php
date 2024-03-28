<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\Client;
use App\Models\Ville;
use App\Models\User;
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
         $etudiants = Client::all();
         $users = User::all();
        //  $etudiants = Etudiant::latest()->get();

         //return $etudiants;
         return view('etudiant.index', ["etudiants" => $etudiants, "users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Client $client)
    {
        $villes = Ville::all();
        // return $user;
        return view('client.create', ["villes" => $villes]);
        
    }
    /**
     * Show the form for creating a new resource.
     */
    // public function testCreate()
    // {
    //     $villes = Ville::all();
    //     return view('etudiant.test', ["villes" => $villes]);
        
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function teststore(Request $request )
    // {   
    //     $request->validate([
    //         'adresse' => 'required|string',
    //         'telephone' => 'required|string',
    //         'number' => 'integer',
    //         'date_de_naissance' => 'required|date|date_format:m/d/Y'    
    //     ]);
        
    //     $etudiant = Etudiant::create([
    //         'adresse' => $request->adresse,
    //         'telephone' => $request->telephone,
    //         'ville_id' => $request->ville,
    //         'date_de_naissance' => $request->date_de_naissance
    //     ]);
    //     // return $request;
    //     // return $request;

    //     return  redirect()->route('etudiant.show', $etudiant->id)->with('success', 'Etudiant créer avec succès  !');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {   
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'city_id' => 'required|string|exist',
            'email' => 'required|email',
            'phone' => 'required|string',
            'birthday' => 'required|date'    
        ]);
       
        $id = Route::current();
        return ($id);
        $etudiant = Client::create([
            'name'=> $request->name,
            'address' => $request->address,
            'city_id' => $request->city,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthday' => $request->birthday
        ]);
        // return $request;
        // return $request;

        return  redirect()->route('client.show', $client->id)->with('success', 'Client créer avec succès  !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
      
        $ville = Ville::find($etudiant->ville_id);
        $user = User::find($etudiant->id);
        // return $ville;
        return view('etudiant.show', ['etudiant' => $etudiant, 'ville' => $ville, 'user' => $user]);
        
        // return view('etudiant.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $ville_etudiant = Ville::find($etudiant->ville_id);
        $villes = Ville::all();
        $user = User::find($etudiant->id);
        return view('etudiant.edit', ['etudiant' => $etudiant, 'ville_etudiant' => $ville_etudiant, 'villes' => $villes, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant, User $user)
    {
        $user = User::find($etudiant->id);

        $request->validate([
            'name' => 'required|string',
            'adresse' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|email',
            'date_de_naissance' => 'required|date'
        ]);
        $user ->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $etudiant->update([
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'ville_id' => $request->ville,
            'date_de_naissance' => $request->date_de_naissance
        ]);

        return redirect()->route('etudiant.show', $etudiant->id)->with('success', 'Etudiant mise à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant, User $user)
    {
        $user = User::find($etudiant->id);
        $etudiant->delete();
        $user->delete();
       return redirect()->route('etudiant.index')->with('success', 'Etudiant supprimé avec succès!');
    }
}
