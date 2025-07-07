<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecentDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Categorie::all();

        $documents = Document::query();

        if ($request->filled('categorie_id')) {
            $documents->where('categorie_id', $request->categorie_id);
        }

        $documents = $documents->latest()->get();

        // $documents = Document::with('user')->get();
        return view('docs.index', compact('categories','documents'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $user = Auth::user();
        $document = Document::with('user', 'notations')->FindOrFail($id);
        if (auth()->check() && auth()->id() !== $document->user_id) {
            $document->increment('vues');
        }

        // dd($document->url_fichier);

        return view('docs.show', compact('document'));
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
        //
    }
}
