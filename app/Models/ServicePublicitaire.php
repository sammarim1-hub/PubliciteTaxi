<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServicePublicitaire extends Model
{
    protected $fillable = [
        'nomservice',
        'description',
        'tarif',
        'dureejour',
        'actif',
        'annonceur_id',
    ];

    public function annonceur(): BelongsTo
    {
        return $this->belongsTo(Annonceur::class);
    }
    public function timeSheets()
    {
        return $this->hasMany(TimeSheet::class, 'panneau_publicitaire_id', 'Service_publicitaire_id');
    }
    public function DossierAnnonces()
    {
        return $this->hasMany(TimeSheet::class);
    }
    public function publication()
    {
        return $this->hasManyThrough(
            Publication::class,
            DossierAnnonce::class,
            'id',
            'id',
            'dossierAnnonce',
            'publication'
        );
    }

    public function statutvalidation()
    {
        return $this->hasManyThrough(
            Statutvalidation::class,
            DossierAnnonce::class,
            'id',
            'id',
            'dossierAnnonce',
            'statutvalidation'
        );
    }
    // Pas de relation Eloquent vers Produit (.NET externe)
    // On expose juste l'ID pour jointure manuelle si besoin
    public function getProduitId(): ?int
    {
        return $this->idProduit;
    }

    protected function casts(): array
    {
        return [
            'actif' => 'boolean',
        ];
    }
}
