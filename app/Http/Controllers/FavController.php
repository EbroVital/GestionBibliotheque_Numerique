<?php

namespace App\Http\Controllers;

use App\Models\Favori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavController extends Controller
{
    public function index(){

        // $document = Favori::where('user_id', auth()->id());
        $favori = Favori::with('user', 'document')->where('user_id', auth()->id())->latest()->paginate(10);
        // dd($favori);
        return view('admin.favoris.index', compact('favori'));
    }

    public function destroy(string $id)
    {
        Favori::where('user_id', Auth::id())->where('document_id', $id)->delete();
        return redirect()->route('Fav')->with('success', 'Retiré des favoris');
    }
}
