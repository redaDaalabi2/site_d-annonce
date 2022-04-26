<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;

class OffreController extends Controller
{
    //
    public function index()
    {
        return Offre::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required',
            'titre'=> 'required',
            'description' => 'required',
            'prix'=> 'required'
        ]);
        return Offre::create($request->all());
    }

    public function show($id)
    {
        return Offre::find($id);
    }

    public function update(Request $request, $id)
    {
        $offre = Offre::find($id);
        $offre->update($request->all());
        return $offre;
    }

    public function destroy($id)
    {
        return Offre::destroy($id);
    }

    public function search($titre)
    {
        return Offre::where('titre', 'like', '%'.$titre.'%')->get();
    }

}
