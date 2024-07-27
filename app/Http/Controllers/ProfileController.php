<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        // Votre logique pour afficher une liste de profils
    }

    /**
     * Affiche le formulaire de création de ressource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Stocke une nouvelle ressource.
     */
    public function store(Request $request)
    {
        $profile = new Profile();
        $profile->nom = $request->input('nom');
        $profile->prenom = $request->input('prenom');
        $profile->email = $request->input('email');
        // Assurez-vous que le mot de passe est hashé avant de l'enregistrer
        $profile->password = bcrypt($request->input('password'));
   
        $profile->save();

        return redirect()->route('emprunts.index');
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(Profile $profile)
    {
        // Votre logique pour afficher un profil spécifique
    }

    /**
     * Affiche le formulaire pour modifier la ressource spécifiée.
     */
    public function edit(Profile $profile)
    {
        // Votre logique pour afficher le formulaire de modification
    }

    /**
     * Met à jour la ressource spécifiée dans le stockage.
     */
    public function update(Request $request, Profile $profile)
    {
        // Votre logique pour mettre à jour le profil
    }

    /**
     * Supprime la ressource spécifiée du stockage.
     */
    public function destroy(Profile $profile)
    {
        // Votre logique pour supprimer le profil
    }
}

