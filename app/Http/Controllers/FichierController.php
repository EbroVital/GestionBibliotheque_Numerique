<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Categorie;
use App\Models\Document;
use Illuminate\Http\Request;

class FichierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::with('categorie','user')->latest()->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.documents.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequest $request)
    {
        $path = $request->file('url_fichier')->store('documents', 'public');

        Document::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'url_fichier' => $path,
            'user_id' => auth()->id(),
            'categorie_id' => $request->categorie_id,
        ]);

        return redirect()->route('documents.index')->with('success', 'Document ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $document = Document::withCount('notations', 'commentaires', 'favoris')->findOrFail($id);
        return view('admin.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $categories = Categorie::all();
        return view('admin.documents.edit', compact('document','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {

        // $document = Document::findorfail();
        $document->titre = $request->titre;
        $document->description = $request->description;

        if ($request->hasFile('fichier')) {
            // Supprimer ancien fichier si il existe
            if ($document->chemin && file_exists(public_path($document->chemin))) {
                unlink(public_path($document->chemin));
            }

            $path = $request->file('fichier')->store('documents', 'public');
            $document->chemin = $path;
        }

        $document->save();

        return redirect()->route('documents.index')->with('success', 'Document modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if ($document->chemin && file_exists(public_path($document->chemin))) {
            unlink(public_path($document->chemin));
        }

        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Documents supprimé avec succès.');
    }
}
