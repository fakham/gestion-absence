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

    public function delete(Filiere $filiere) {
        $filiere->delete();
    }
}
