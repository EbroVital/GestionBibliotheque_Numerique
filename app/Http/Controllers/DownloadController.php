<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DownloadController extends Controller
{


    public function index(){

        $docDownload = Download::with('document')->where('user_id', auth()->id())->latest()->paginate(10);
        return view('download.index', compact('docDownload'));

    }

    public function telecharger($id)
    {
        $document = Document::findOrFail($id);

        // Chemin du fichier
        $filePath = $document->url_fichier;

        $fullPath = storage_path('app/public/' . $filePath);

        // Vérifier si le fichier existe
        if (!Storage::disk('public')->exists($filePath)) {
            return redirect()->back()->with('error', 'Le fichier est introuvable.');
        }

         // Incrémenter le compteur de téléchargements
        $document->increment('telechargements');

        // Enregistrer dans la table "downloads"
        if (Auth::check()) {
            Download::create([
                'user_id' => Auth::id(),
                'document_id' => $document->id,
            ]);

        }

        $fileName = $document->titre . '.' . pathinfo($filePath, PATHINFO_EXTENSION);

        return response()->download($fullPath, $fileName);
    }

}
