<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Annonceur;
use App\Models\DossierAnnonce;
use App\Models\ServicePublicitaire;
use Illuminate\Http\Request;

class DossierAnnonceController extends Controller
{
    public function index()
    {
        $dossierannonces = DossierAnnonce::all();
        return view('admin.dossierannonce.index', compact('dossierannonces'));
    }

    public function create()
    {
        return view('admin.dossierannonce.create', [
            'annonceurs' => Annonceur::all(),
            'servicepublicitaires' => ServicePublicitaire::all(),
        ]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'datecreation' => 'required',
            'annonceur_id' => 'required',
            'service_publicitaire_id' => 'required',
        ],[
            'datecreation.required' => 'la datecreation est obligatoire',

        ]);
        DossierAnnonce::create($data);
        return redirect()->route('dossierannonce.index');
    }

    public function show(DossierAnnonce $dossierAnnonce)
    {
        return view('admin.dossierannonce.show', compact('dossierAnnonce'));
    }

    public function edit(DossierAnnonce $dossierAnnonce)
    {
        return view('admin.dossierannonce.edit', compact('dossierAnnonce'));
    }

    public function update(Request $request, DossierAnnonce $dossierAnnonce)
    {
        $data = $request->validate([
            'datecreation' => 'required',
            'annonceur_id' => 'required',
            'service_publicitaire_id' => 'required',
        ],[
            'datecreation.required' => 'la datecreation est obligatoire',
            ]);
        $dossierAnnonce->update($data);
        return redirect()->route('dossierannonce.index');
    }

    public function destroy(DossierAnnonce $dossierAnnonce)
    {
        $dossierAnnonce->delete();
        return redirect()->route('dossierannonce.index');
    }
}
