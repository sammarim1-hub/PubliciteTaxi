@extends('admin.layout.layout')

@section('title', 'index | dossierannonce')

@section('content')

    {{-- begin container --}}
    <div class="container my-3">

        <div class="card">

            {{-- card header --}}
            <div class="card-header fs-4 fw-bold">All {{ Str::plural('dossierannonce') }}</div>
            <br>
            {{-- card body --}}
            <div class="card-body">

                {{-- button trashes + button create --}}
                <div class="d-flex justify-content-between mb-3">
                    <br>
                    <a class="btn btn-success rounded-pill px4 fw-medium shadow-sm" href="{{ route('dossierannonce.create')}}">+ Create un Dossier</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm align-middle text-nowrap">
                        <thead>
                        <tr>
                            <th>DateCreation</th>
                            <th>Annonceur_id</th>
                            <th>Service_publicitaire_id</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th >Actions</th>
                        </tr>
                        </thead>
                        <tbody>


                        {{-- listing all resources --}}
                @foreach( $dossierannonces as $dossierannonce)
                    <tr>

                        <td>{{ Str::limit($dossierannonce->datecreation) }}</td>
                        <td>{{ Str::limit($dossierannonce->annonceur_id) }}</td>
                        <td>{{ Str::limit($dossierannonce->service_publicitaire_id) }}</td>
                        <td>{{ $dossierannonce->created_at->diffForHumans() }}</td>
                        <td>{{ $dossierannonce->updated_at->diffForHumans() }}</td>


                        {{-- actions --}}
                        <td class="d-flex gap-1">

                            <a class="btn btn-sm btn-info text-white"
                               href="{{ route('dossierannonce.show', $dossierannonce->id)  }}">
                                show
                            </a>

                            <a class="btn btn-sm btn-warning text-dark"
                               href="{{ route('dossierannonce.edit', $dossierannonce->id)  }}">
                                edit
                            </a>

                            <form action="{{ route('dossierannonce.destroy', $dossierannonce->id)  }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick ="return confirm ('vous voulez supprimer ce dossier ?')"  class="btn btn-sm btn-danger">destroy</button>
                            </form>

                        </td>
                    </tr>

                    @endforeach

                        </tbody>
                    </table>
                </div>


                {{-- card footer --}}
            <div class="card-footer"></div>


        </div>

    </div>
    {{-- end container --}}
    </div>
@endsection
