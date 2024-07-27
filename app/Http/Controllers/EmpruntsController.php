<?php

namespace App\Http\Controllers;

use App\Models\Emprunts;
use App\Models\Livre;
use Illuminate\Http\Request;

class EmpruntsController extends Controller
{
    /**
     * Afficher la liste des emprunts.
     */
    public function index()
    {
        $emprunts = Emprunts::with('livre')->paginate(10);
        return view('emprunts.index', compact('emprunts'));
    }

    /**
     * Afficher le formulaire pour créer un nouvel emprunt.
     */
    public function create()
    {
        $livres = Livre::all();
        return view('emprunts.create', compact('livres'));
    }

    /**
     * Stocker un nouvel emprunt dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'livre_id' => 'required',
            'date_emprunt' => 'required',
            'date_retour' => 'required'
        ]);

        Emprunts::create($request->all());
        return redirect()->route('emprunts.index')->with('success', 'Nouvel emprunt ajouté avec succès.');
    }

    /**
     * Afficher les détails d'un emprunt spécifique.
     */
    public function show(Emprunts $emprunt)
    {
        return view('emprunts.show', compact('emprunt'));
    }

    /**
     * Afficher le formulaire pour modifier un emprunt existant.
     */
    public function edit(Emprunts $emprunt)
    {
        $livres = Livre::all();
        return view('emprunts.edit', compact('emprunt', 'livres'));
    }

    /**
     * Mettre à jour les informations d'un emprunt dans la base de données.
     */
    public function update(Request $request, Emprunts $emprunt)
    {
        $request->validate([
            'livre_id' => 'required',
            'date_emprunt' => 'required',
            'date_retour' => 'required'
        ]);

        $emprunt->update($request->all());
        return redirect()->route('emprunts.index')->with('success', 'Détails de l\'emprunt mis à jour avec succès.');
    }

    /**
     * Supprimer un emprunt existant de la base de données.
     */
    public function destroy(Emprunts $emprunt)
    {
        $emprunt->delete();
        return redirect()->route('emprunts.index')->with('success', 'Emprunt supprimé avec succès.');
    }
    public function search(Request $request)
    {

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');


        $emprunts = Emprunts::where('date_emprunt', '>', $start_date)
        ->where('date_emprunt', '<', $end_date)
        ->get();




        return view('emprunts.search', compact('emprunts'));
    }


}

