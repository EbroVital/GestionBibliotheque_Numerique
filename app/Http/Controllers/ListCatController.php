<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class ListCatController extends Controller
{
    public function index(string $id){

        $cats = Categorie::with('documents')->findOrFail($id);
        return view('categories.index', compact('cats'));
    }
}
