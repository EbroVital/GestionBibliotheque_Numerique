<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Document;
use App\Models\Download;
use App\Models\Favori;
use App\Models\Notation;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    public function index(){

        $user = Auth::user();

        $docs = Document::where('user_id', auth()->id())->count();
        $vues = Document::where('user_id', auth()->id())->sum('vues') ;
        $download = Document::where('user_id', auth()->id())->sum('telechargements');
        $docDownload = Download::with('documents')->where('user_id', auth()->id())->count();
        $favori = Favori::where('user_id', auth()->id())->count();
        $comment = Commentaire::where('user_id', auth()->id())->count();
        $note = Notation::where('user_id', auth()->id())->count();
        $date = $user->created_at->format("d/m/Y à H:i");

        $mostViewedDocument = $user->documents()->orderByDesc('vues')->first();
        $mostDownloadedDocumentByCreator = $user->documents()->orderByDesc('telechargements')->first();
        $mostCommentedDocument = $user->documents()->withCount('commentaires') ->orderByDesc('commentaires_count')->first();
         $highestRatedDocument = $user->documents()->withCount('notations')->first();

        $mostFavoritedDocument = $user->documents()->withCount('favoris')->first();

        // dd($mostFavoritedDocument);

        return view('dashboard.index', compact('docs', 'vues', 'download', 'favori', 'comment', 'note', 'docDownload', 'date', 'mostViewedDocument', 'mostDownloadedDocumentByCreator', 'mostCommentedDocument', 'highestRatedDocument', 'mostFavoritedDocument'));
    }
}
