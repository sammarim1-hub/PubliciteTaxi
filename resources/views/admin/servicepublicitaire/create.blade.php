@extends('admin.layout.layout')

@section('title', 'Create | Service Publicitaire')

@section('content')

    <div class="container my-3">
        <div class="row justify-content-center">

            <div class="col-md-10">

                <form action="{{ route('servicepublicitaire.store') }}" method="post">
                    @csrf

                    <div class="card shadow-lg">

                        <div class="card-header fs-4 fw-bold">Create Service Publicitaire</div>

                        <div class="card-body">

                            {{-- Nom service --}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label>Nom Service :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text"
                                               name="nomservice"
                                               value="{{ old('nomservice') }}"
                                               class="form-control">
                                        @error('nomservice')
                                        <div class="alert alert-danger py-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label>Description :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                        @error('description')
                                        <div class="alert alert-danger py-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Tarif --}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label>Tarif :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number"
                                               name="tarif"
                                               value="{{ old('tarif') }}"
                                               class="form-control">
                                        @error('tarif')
                                        <div class="alert alert-danger py-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Durée --}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label>Durée (jours) :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number"
                                               name="dureejour"
                                               value="{{ old('dureejour') }}"
                                               class="form-control">
                                        @error('dureejour')
                                        <div class="alert alert-danger py-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Actif --}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label>Actif :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="actif" class="form-control">
                                            <option value="1">Oui</option>
                                            <option value="0">Non</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- Annonceur --}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label>Annonceur :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="annonceur_id" class="form-control">
                                            <option value="">-- Choisir --</option>
                                            @foreach($annonceurs as $annonceur)
                                                <option value="{{ $annonceur->id }}">
                                                    {{ $annonceur->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('annonceur_id')
                                        <div class="alert alert-danger py-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Créer</button>
                            <a class="btn btn-dark" href="{{ route('servicepublicitaire.index') }}">Retour</a>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection
