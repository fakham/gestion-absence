<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filiere;
use Illuminate\Support\Facades\Auth;

class FiliereController extends Controller
{
    public function index() {

        $user = Auth()->user();

        $filieres = Filiere::where('user_id', $user->id)->get();

        return view('filiere.index', compact('filieres'));
    }

    public function store(Request $request) {

        $user = Auth()->user()->filieres()->create([
            'nom' => $request->nom,
            'description' => $request->description,
            'departement' => $request->departement
        ]);

    }

    public function edit(Filiere $filiere) {

        return view('filiere.edit', compact('filiere'));

    }

    public function delete(Filiere $filiere) {
        $filiere->delete();

        return back();
    }

    public function edited(Request $request, Filiere $filiere) {

        $filiere->nom = $request->nom;
        $filiere->description = $request->description;
        $filiere->departement = $request->departement;

        $filiere->save();

        $user = Auth()->user();

        $filieres = Filiere::where('user_id', $user->id)->get();

        return view('filiere.index', compact('filieres'));

    }
}
