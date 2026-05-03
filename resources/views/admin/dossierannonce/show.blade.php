@extends('admin.layout.layout')

@section('title', 'index | dossierannonce')

@section('content')

    <div class="container my-3">

        <div class="row justify-content-center">
            <div class="col-8">{{-- card width --}}

                <div class="card shadow-lg">

                    {{--card header--}}
                    <div class="card-header fs-4 fw-bold">dossierannonce Details</div>

                    {{--card body--}}
                    <ul class="list-group list-group-flush">


                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">DateCreation :</div>
                                <div class="col-6">{{$dossierAnnonce->datecreation}}</div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">Annonceur_ID : </div>
                                <div class="col-6">{{$dossierAnnonce->annonceur_id}}</div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-4 text-secondary">ServicePublicitaire : </div>
                                <div class="col-6">{{$dossierAnnonce->service_publicitaire_id}}</div>
                            </div>
                        </li>

                    </ul>

                    {{-- footer --}}
                    <div class="card-footer">
                        <a class="btn btn-dark" href="{{ route('dossierannonce.index') }}">Retour</a>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection
