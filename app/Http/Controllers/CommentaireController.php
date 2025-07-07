<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{


    public function index(){

        $comment = Commentaire::with('user', 'document')->where('user_id', auth()->id())->latest()->paginate(10);
        return view('comment.index', compact('comment'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'document_id' => 'required|exists:documents,id',
            'contenu' => 'required|string|max:1000',

        ]);

        Commentaire::create([
            'user_id' => Auth::id(),
            'document_id' => $request->document_id,
            'contenu' => $request->contenu,
        ]);

        return back()->with('success', 'Commentaire ajouté.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $com = Commentaire::findorfail($id);
        $com->delete();
        return redirect()->route('commentaire.index')->with('success', 'Commentaire supprimé.');
    }
}
