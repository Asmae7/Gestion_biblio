<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Afficher la liste des auteurs.
     */
    public function index()
    {
        $auteurs = Auteur::paginate(10);
        return view('auteurs.index', compact('auteurs'));
    }

    /**
     * Afficher le formulaire pour créer un nouvel auteur.
     */
    public function create()
    {
        return view('auteurs.create');
    }

    /**
     * Stocker un nouvel auteur dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des données entrées par l'utilisateur
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required'
        ]);

        // Création d'un nouvel auteur avec les données validées
        Auteur::create($validatedData);

        // Redirection vers la liste des auteurs avec un message de succès
        return redirect()->route('auteurs.index')->with('success', 'Nouvel auteur ajouté avec succès.');
    }


    /**
     * Afficher les détails d'un auteur spécifique.
     */
    public function show(Auteur $auteur)
    {
        return view('auteurs.show', compact('auteur'));
    }

    /**
     * Afficher le formulaire pour modifier un auteur existant.
     */
    public function edit(Auteur $auteur)
    {
        return view('auteurs.edit', compact('auteur'));
    }

    /**
     * Mettre à jour les informations d'un auteur dans la base de données.
     */
    public function update(Request $request, Auteur $auteur)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required'
        ]);

        $auteur->update($request->all());
        return redirect()->route('auteurs.index')->with('success', 'Détails de l\'auteur mis à jour avec succès.');
    }

    /**
     * Supprimer un auteur existant de la base de données.
     */
    public function destroy(Auteur $auteur)
    {
        $auteur->delete();
        return redirect()->route('auteurs.index')->with('success', 'Auteur supprimé avec succès.');
    }
}
