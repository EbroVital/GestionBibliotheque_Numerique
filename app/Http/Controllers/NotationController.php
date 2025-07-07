<?php

namespace App\Http\Controllers;

use App\Models\Notation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotationController extends Controller
{

    public function index(){

        $notes = Notation::with('user', 'document')->where('user_id', auth()->id())->latest()->paginate(10);
        return view('notes.index', compact('notes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'document_id' => 'required|exists:documents,id',
            'note' => 'required|integer|min:1|max:5',
        ]);

        Notation::updateOrCreate([
            'user_id' => Auth::id(),
            'document_id' => $request->document_id,
            'note' => $request->note,
        ]);

        return back()->with('success', 'Note enregistrée.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
