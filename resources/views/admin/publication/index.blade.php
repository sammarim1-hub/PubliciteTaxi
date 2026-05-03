@extends('admin.layout.layout')

@section('title', 'index | publication')

@section('content')

    {{-- begin container --}}
    <div class="container my-3">

        <div class="card">

            {{-- card header --}}
            <div class="card-header fs-4 fw-bold">All {{ Str::plural('publication') }}</div>
            <br>
            {{-- card body --}}
            <div class="card-body">

                {{-- button trashes + button create --}}
                <div class="d-flex justify-content-between mb-3">
                    <br>
                    <a class="btn btn-success rounded-pill px4 fw-medium shadow-sm" href="{{ route('publication.create')}}">+ Create une Publication</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm align-middle text-nowrap">
                        <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Date Publication</th>
                            <th>Actif</th>
                            <th>URL Media</th>
                            <th>Dossier_Annonce_ID</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th >Actions</th>
                        </tr>
                        </thead>
                        <tbody>


                        {{-- listing all resources --}}
                @foreach( $publications as $publication)
                    <tr>

                        <td>{{ Str::limit($publication->titre) }}</td>
                        <td>{{ Str::limit($publication->contenu) }}</td>
                        <td>{{ Str::limit($publication->datepublication) }}</td>
                        <td>{{ Str::limit($publication->actif) }}</td>
                        <td>{{ Str::limit($publication->urlmedia) }}</td>
                        <td>{{ Str::limit($publication->dossier_annonce_id) }}</td>
                        <td>{{ $publication->created_at->diffForHumans() }}</td>
                        <td>{{ $publication->updated_at->diffForHumans() }}</td>

                        {{-- actions --}}
                        <td class="d-flex gap-1">

                            <a class="btn btn-sm btn-info text-white"
                               href="{{ route('publication.show', $publication->id)  }}">
                                show
                            </a>

                            <a class="btn btn-sm btn-warning text-dark"
                               href="{{ route('publication.edit', $publication->id)  }}">
                                edit
                            </a>

                            <form action="{{ route('publication.destroy', $publication->id)  }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick ="return confirm ('vous voulez supprimer ce produit ?')"  class="btn btn-sm btn-danger">destroy</button>
                            </form>

                        </td>
                    </tr>

                    @endforeach

            </div>

            {{-- card footer --}}
            <div class="card-footer"></div>


        </div>

    </div>
    {{-- end container --}}
    </div>
@endsection
