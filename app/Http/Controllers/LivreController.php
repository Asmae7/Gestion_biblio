<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres=Livre::with('auteur')->paginate(10);
        return view('Livres.index',compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auteurs = Auteur::all();
        return view('livres.create', compact('auteurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'annee_pub' => 'required|integer',
            'nombre_de_pages' => 'nullable|integer',
            'auteur_id' => 'required|exists:auteurs,id',

        ]);
        Livre::create($request->all());
        return redirect()->route('livres.index')->with('success', 'Livre ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {

        $livre = Livre::with('auteur')->findOrFail($livre->id);
        return view('livres.show', compact('livre'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        $auteurs = Auteur::all();
        return view('livres.edit', compact('livre', 'auteurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        $livre->update($request->all());
        return redirect()->route('livres.index')->with('success', 'Livre modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        $livre->delete();
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès.');
    }


public function confirmDelete(Livre $livre)
{
    return view('livres.confirm', compact('livre'));
}

}
