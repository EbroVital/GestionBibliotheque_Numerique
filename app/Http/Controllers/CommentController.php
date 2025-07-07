<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(){

        $comment = Commentaire::with('user', 'document')->where('user_id', auth()->id())->latest()->paginate(10);
        return view('admin.comment.index', compact('comment'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([

    //         'document_id' => 'required|exists:documents,id',
    //         'contenu' => 'required|string|max:1000',

    //     ]);

    //     Commentaire::create([
    //         'user_id' => Auth::id(),
    //         'document_id' => $request->document_id,
    //         'contenu' => $request->contenu,
    //     ]);

    //     return back()->with('success', 'Commentaire ajouté.');
    // }

    public function destroy(string $id)
    {
        $com = Commentaire::findorfail($id);
        $com->delete();
        return redirect()->route('comment')->with('success', 'Commentaire supprimé.');
    }

}
