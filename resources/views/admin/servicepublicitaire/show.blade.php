@extends('admin.layout.layout')

@section('title', 'Show | Service Publicitaire')

@section('content')

    <div class="container my-3">

        <div class="row justify-content-center">
            <div class="col-8">

                <div class="card shadow-lg">

                    {{-- header --}}
                    <div class="card-header fs-4 fw-bold">
                        Service Publicitaire Details
                    </div>

                    {{-- body --}}
                    <ul class="list-group list-group-flush">

                        {{-- Nom service --}}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">Nom Service :</div>
                                <div class="col-6">{{ $servicePublicitaire->nomservice }}</div>
                            </div>
                        </li>

                        {{-- Description --}}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">Description :</div>
                                <div class="col-6">{{ $servicePublicitaire->description }}</div>
                            </div>
                        </li>

                        {{-- Tarif --}}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">Tarif :</div>
                                <div class="col-6">{{ $servicePublicitaire->tarif }}</div>
                            </div>
                        </li>

                        {{-- Durée --}}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">Durée :</div>
                                <div class="col-6">{{ $servicePublicitaire->dureejour }} jours</div>
                            </div>
                        </li>

                        {{-- Actif --}}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">Actif :</div>
                                <div class="col-6">
                                    @if($servicePublicitaire->actif)
                                        <span class="badge bg-success">Oui</span>
                                    @else
                                        <span class="badge bg-danger">Non</span>
                                    @endif
                                </div>
                            </div>
                        </li>

                        {{-- Annonceur --}}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">Annonceur :</div>
                                <div class="col-6">
                                    {{ $servicePublicitaire->annonceur->nom ?? 'N/A' }}
                                </div>
                            </div>
                        </li>

                        {{-- Dates --}}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6 text-secondary">
                                    Créé : {{ $servicePublicitaire->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6 text-secondary">
                                    Modifié : {{ $servicePublicitaire->updated_at->diffForHumans() }}
                                </div>
                            </div>
                        </li>

                    </ul>

                    {{-- footer --}}
                    <div class="card-footer">
                        <a class="btn btn-dark" href="{{ route('servicepublicitaire.index') }}">
                            Retour
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection
