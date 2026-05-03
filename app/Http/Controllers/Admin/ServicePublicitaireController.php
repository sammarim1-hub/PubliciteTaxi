<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Annonceur;
use App\Models\ServicePublicitaire;
use Illuminate\Http\Request;

class ServicePublicitaireController extends Controller
{
    public function index()
    {
        $servicePublicitaires = ServicePublicitaire::with('annonceur')->get();
        return view('admin.servicepublicitaire.index', compact('servicePublicitaires'));
    }

    public function create()
    {
        $annonceurs = Annonceur::all();
        return view('admin.servicepublicitaire.create', compact('annonceurs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nomservice' => 'required',
            'description' => 'required',
            'tarif' => 'required|numeric',
            'dureejour' => 'required|integer',
            'actif' => 'required|boolean',
            'annonceur_id' => 'required|exists:annonceurs,id',
        ], [
            'nomservice.required' => 'le nom du service est obligatoire',
            'description.required' => 'la description est obligatoire',
            'tarif.required' => 'le tarif est obligatoire',
            'dureejour.required' => 'la durée est obligatoire',
            'annonceur_id.required' => 'l’annonceur est obligatoire',
        ]);

        ServicePublicitaire::create($data);

        return redirect()->route('servicepublicitaire.index');
    }

    public function show(ServicePublicitaire $servicePublicitaire)
    {
        return view('admin.servicepublicitaire.show', compact('servicePublicitaire'));
    }

    public function edit(ServicePublicitaire $servicePublicitaire)
    {
        $annonceurs = Annonceur::all();

        return view('admin.servicepublicitaire.edit', compact('servicePublicitaire', 'annonceurs'));
    }

    public function update(Request $request, ServicePublicitaire $servicePublicitaire)
    {
        $data = $request->validate([
            'nomservice' => 'required',
            'description' => 'required',
            'tarif' => 'required|numeric',
            'dureejour' => 'required|integer',
            'actif' => 'required|boolean',
            'annonceur_id' => 'required|exists:annonceurs,id',
        ]);

        $servicePublicitaire->update($data);

        return redirect()->route('servicepublicitaire.index');
    }

    public function destroy(ServicePublicitaire $servicePublicitaire)
    {

        $servicePublicitaire->dossierAnnonces()->delete();

        $servicePublicitaire->delete();

        return redirect()->route('servicepublicitaire.index');
    }
}
