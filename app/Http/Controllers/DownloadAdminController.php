<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;

class DownloadAdminController extends Controller
{
    public function index(){
        $downloads = Download::with('document')->where('user_id', auth()->id())->latest()->paginate(10);
        // dd($downloads);
        return view('admin.downloads.index', compact('downloads'));
    }
}
