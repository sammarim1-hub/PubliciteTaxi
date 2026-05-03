@extends('admin.layout.layout')

@section('title', 'Edit | dossierannonce' )

@section('content')

    <div class="container my-3">
        <div class="row justify-content-center">

            <div class="col-md-10">

                {{-- form begin --}}
                <form action="{{ route('dossierannonce.update', $dossierAnnonce->id) }}" method="post" enctype="multipart/form-data" class="">
                    @csrf
                    @method('PUT')


                    <div class="card shadow-lg">

                        {{--card title--}}
                        <div class="card-header fs-4 fw-bold">Edit dossierannonce</div>

                        {{--card body--}}
                        <div class="card-body">


                            {{-- text --}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label for="">Edit DateCreation : </label>
                                    </div>
                                    <div class="col-md-9">
                                      , <input type="date"
                                               name="datecreation"
                                               value="{{ old('datecreation', $dossierAnnonce->datecreation) }}"
                                               class="form-control">
                                        @error('datecreation')
                                        <div class="alert alert-danger py-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            {{-- selectbox--}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label for="">Edit Annonceur</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="annonceur_id" class="form-select" aria-label="Default select example">
                                            <option selected disabled>Open this select menu</option>
                                            @foreach($annonceurs as $annonceur)

                                                <option value="{{$annonceur->id}}">{{$annonceur->nom}}</option>
                                            @endforeach
                                        </select>
                                        @error('annonceur_id')
                                        <div class="alert alert-danger py-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            {{-- selectbox--}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label for="">Edit Service Publicitaire</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="service_publicitaire_id" class="form-select" aria-label="Default select example">
                                            <option selected disabled>Open this select menu</option>
                                            @foreach($servicepublicitaires as $servicepublicitaire)

                                                <option value="{{$servicepublicitaire->id}}">{{$servicepublicitaire->nomservice}}</option>
                                            @endforeach
                                        </select>
                                        @error('service_publicitaire_id')
                                        <div class="alert alert-danger py-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>{{--end card body--}}

                        {{--card footer--}}
                        <div class="card-footer">

                            <button type="submit" class="btn btn-primary">Submit</button>

                            <a class="btn btn-dark" href="{{ route('dossierannonce.index') }}">Retour</a>

                        </div>

                    </div>
                </form>
                {{-- form end --}}

            </div>

        </div>
    </div>

@endsection
