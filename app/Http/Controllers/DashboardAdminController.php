<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Document;
use App\Models\Download;
use App\Models\Favori;
use App\Models\Notation;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index() {

        $categorie = Categorie::count();
        $docs = Document::count();
        $users = User::count();
        $vues = Document::sum('vues');
        $download = Document::sum('telechargements');
        $comment = Commentaire::count();
        $favoris = Favori::count();
        $notes = Notation::count();

        $mostViewedDoc = Document::orderByDesc('vues')->first();
        $mostDownloadDoc = Document::orderByDesc('telechargements')->first();
        $mostCommentDoc = Document::withCount('commentaires')->orderByDesc('commentaires_count')->first();
        $mostFavDoc = Document::withCount('favoris')->orderByDesc('favoris_count')->first();
        $mostRatingDoc = Document::withCount('notations')->orderByDesc('notations_count')->first();

        return view('admin.dashboard', compact('categorie', 'docs', 'users','vues', 'download', 'comment', 'favoris', 'notes', 'mostViewedDoc', 'mostDownloadDoc', 'mostCommentDoc', 'mostFavDoc', 'mostRatingDoc'));
    }
}
