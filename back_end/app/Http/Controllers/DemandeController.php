<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;

class DemandeController extends Controller
{
    public function index()
    {
        return Demande::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo_de' => 'required',
            'titre_de' => 'required',
            'description_de' => 'required'
        ]);
        return Demande::create($request->all());
    }

    public function show($id)
    {
        return Demande::find($id);
    }

    public function update(Request $request, $id)
    {
        $demande = Demande::find($id);
        $demande->update($request->all());
        return $demande;
    }

    public function destroy($id)
    {
        return Demande::destroy($id);
    }

    public function search($titre_de)
    {
        return Demande::where('titre_de', 'like', '%' . $titre_de . '%')->get();
    }

}
