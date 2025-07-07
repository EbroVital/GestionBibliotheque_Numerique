<?php

namespace App\Http\Controllers;

use App\Models\Notation;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(){

        $notes = Notation::with('user', 'document')->where('user_id', auth()->id())->latest()->paginate(10);
        return view('admin.notes.index', compact('notes'));
    }
}
