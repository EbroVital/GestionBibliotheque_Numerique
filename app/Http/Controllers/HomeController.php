<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Document;
use App\Models\Notation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $categories = Categorie::withCount('documents')->get();

        if($query){

            $documents = Document::with(['categorie', 'user', 'notations'])
                ->where('titre', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->get();
            // $rechercheActive = true;

        } else {

            $documents = Document::with(['categorie', 'user', 'notations'])->orderBy('created_at', 'desc')->take(3)->get();
            // $rechercheActive = true;
        }

        // $note = round(Notation::with('document')->avg('note') * 2) / 2;
        return view('home', compact('categories', 'documents', 'query'));

    }


}

