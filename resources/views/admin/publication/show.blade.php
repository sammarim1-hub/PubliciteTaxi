@extends('admin.layout.layout')

@section('title', 'index | publication')

@section('content')

    <div class="container my-3">

        <div class="row justify-content-center">
            <div class="col-8">{{-- card width --}}

                <div class="card shadow-lg">

                    {{--card header--}}
                    <div class="card-header fs-4 fw-bold">publication Details</div>

                    {{--card body--}}
                    <ul class="list-group list-group-flush">


                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">Titre : </div>
                                <div class="col-6">{{$publication->titre}}</div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">Contenu : </div>
                                <div class="col-6">{{$publication->contenu}}</div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">Date Publication : </div>
                                <div class="col-6">{{$publication->datepublication}}</div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">Url Media :</div>
                                <div class="col-6">{{$publication->urlmedia}}</div>
                            </div>
                        </li>

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

                        {{-- Dates --}}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6 text-secondary">
                                    Créé : {{ $publication->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6 text-secondary">
                                    Modifié : {{ $publication->updated_at->diffForHumans() }}
                                </div>
                            </div>
                        </li>


                    </ul>

                    {{-- footer --}}
                    <div class="card-footer">
                        <a class="btn btn-dark" href="{{ route('publication.index') }}">Retour</a>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection
