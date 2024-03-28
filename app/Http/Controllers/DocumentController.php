<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;


class DocumentController extends Controller
{
    public function index()
    {
        // $documents = Document::paginate(10); 
        $documents = Document::all(); 
        return view('document.index', ['document' => $documents]);
        
        
    }

    public function create()
    {
        return view('document.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'fichier' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $document = $request->file('fichier');
        $docName = time() . '_' . $document->getClientOriginalName();
        $fichier = $document->move(public_path('img'), $docName);     


        $document = new Document();
        $document->titre = $request->titre;
        $document->fichier = $fichier;
        $document->langue = $request ->langue;
        $document->user_id = auth()->user()->id;
        $document->save();

        return redirect()->route('document.index')->with('success', 'Document uploaded successfully.');
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('document.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required',
            'fichier' => 'required|file|mimes:jpg,jpeg,pdf,png|max:2048',
        ]);

        $document = Document::findOrFail($id);

        $document->titre = $request->titre;
    
        if ($request->hasFile('fichier')) {
            $nouveauDoc = $request->file('fichier');
            $docName = time() . '_' . $nouveauDoc->getClientOriginalName();
            $fichier = $nouveauDoc->move(public_path('img'), $docName);
            Storage::delete($document->fichier);
            $document->fichier = 'img/' . $docName;
        }
        $document->save();

        return redirect()->route('document.index')->with('success', 'Document updated successfully.');
    }


    public function delete($id)
    {
        $document = Document::findOrFail($id);
        Storage::delete($document->fichier); 
        $document->delete();

        return redirect()->route('document.index')->with('success', 'Document deleted successfully.');
    }

}
