@extends('admin.layout.layout')

@section('title', 'Edit | publication' )

@section('content')

    <div class="container my-3">
        <div class="row justify-content-center">

            <div class="col-md-10">

                {{-- form begin --}}
                <form action="{{ route('publication.update', $publication->id) }}" method="post" enctype="multipart/form-data" class="">
                    @csrf
@method('PUT')

                    <div class="card shadow-lg">

                        {{--card title--}}
                        <div class="card-header fs-4 fw-bold">Edit publication</div>

                        {{--card body--}}
                        <div class="card-body">

                            {{--text --}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label>Nom Service :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text"
                                               name="titre"
                                               value="{{ old('titre', $publication->titre) }}"
                                               class="form-control">
                                        @error('titre')
                                        <div class="alert alert-danger py-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{--text --}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label>Contenu :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text"
                                               name="contenu"
                                               value="{{ old('contenu', $publication->contenu) }}"
                                               class="form-control">
                                        @error('contenu')
                                        <div class="alert alert-danger py-2 mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- text --}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label for="">Insert Date Publication : </label>
                                    </div>
                                    <div class="col-md-9">

                                        <input type="date"
                                               name="titre"
                                               value="{{ old('datepublication', $publication->datepublication) }}"
                                               class="form-control">
                                        @error('datepublication')
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

                            {{--text --}}
                            <div class="mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <label>Url Media :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text"
                                               name="urlmedia"
                                               value="{{ old('urlmedia', $publication->urlmedia) }}"
                                               class="form-control">
                                        @error('urlmedia')
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
                                        <select name="dossier_annonce_id" class="form-select" aria-label="Default select example">
                                            <option selected disabled>Open this select menu</option>
                                            @foreach($dossierAnnonces as $dossierAnnonce)

                                                <option value="{{$dossierAnnonce->id}}">{{$dossierAnnonce->datecreation}}</option>
                                            @endforeach
                                        </select>
                                        @error('dossier_annonce_id')
                                        <div class="alert alert-danger py-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>




                        </div>{{--end card body--}}

                        {{--card footer--}}
                        <div class="card-footer">

                            <button type="submit" class="btn btn-primary">Submit</button>

                            <a class="btn btn-dark" href="{{ route('publication.index') }}">Retour</a>

                        </div>

                    </div>
                </form>
                {{-- form end --}}

            </div>

        </div>
    </div>

@endsection
