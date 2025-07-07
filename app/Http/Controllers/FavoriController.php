<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Favori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriController extends Controller
{


    public function index(){

        // $document = Favori::where('user_id', auth()->id());
        $favori = Favori::with('user', 'document')->where('user_id', auth()->id())->latest()->paginate(10);
        // dd($favori);
        return view('favoris.index', compact('favori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Favori::firstOrCreate([
            'user_id' => Auth::id(),
            'document_id' => $request->document_id,
        ]);

        return back()->with('success', 'Ajouté aux favoris');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Favori::where('user_id', Auth::id())->where('document_id', $id)->delete();
        return redirect()->route('favoris.index')->with('success', 'Retiré des favoris');
    }
}
