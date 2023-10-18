<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class Etudiantcontroller extends Controller
{

public function liste_etudiant()

{
    $etudiants = Etudiant::paginate(4);
    return view('etudiant.liste', compact('etudiants'));
}

public function ajouter_etudiant()
{
    return view('etudiant.ajouter');
}

public function ajouter_etudiant_traitement(Request $Request)
{
    $Request->validate([
        'nom'=> 'required',
        'prenom'=> 'required',
        'classe'=> 'required',
    ]);

    $etudiant = new Etudiant();
    $etudiant->nom = $Request->nom;
    $etudiant->prenom = $Request->prenom;
    $etudiant->classe = $Request->classe;
    $etudiant->save();

    return redirect('/ajouter')->with('status', 'L\étudiant a bien été ajouter avec succes.');
}



public function delete_etudiant($id) {
    $etudiant = Etudiant::find($id);
    $etudiant ->delete();
 return redirect('/etudiant')->with('status', 'L\étudiant a bien été supprimé avec succes.');
}
      
}
