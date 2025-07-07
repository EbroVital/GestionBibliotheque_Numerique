<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Document;
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

        return view('home', compact('categories', 'documents', 'query'));

    }


}
