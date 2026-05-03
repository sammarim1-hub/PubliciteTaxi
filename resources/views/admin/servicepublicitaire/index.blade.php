@extends('admin.layout.layout')

@section('title', 'Index | Service Publicitaire')

@section('content')

    <div class="container my-3">

        <div class="card">

            {{-- header --}}
            <div class="card-header fs-4 fw-bold">
                All {{ Str::plural('Service Publicitaire') }}
            </div>

            <div class="card-body">

                {{-- bouton create --}}
                <div class="d-flex justify-content-between mb-3">
                    <a class="btn btn-success rounded-pill px-4 fw-medium shadow-sm"
                       href="{{ route('servicepublicitaire.create') }}">
                        + Create Service
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-sm align-middle text-nowrap">

                        <thead>
                        <tr>
                            <th>Nom Service</th>
                            <th>Description</th>
                            <th>Tarif</th>
                            <th>Durée</th>
                            <th>Actif</th>
                            <th>Annonceur</th>
                            <th>Created_at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($servicePublicitaires as $service)
                            <tr>

                                <td>{{ Str::limit($service->nomservice, 20) }}</td>
                                <td>{{ Str::limit($service->description, 30) }}</td>
                                <td>{{ $service->tarif }}</td>
                                <td>{{ $service->dureejour }} jours</td>

                                <td>
                                    @if($service->actif)
                                        <span class="badge bg-success">Oui</span>
                                    @else
                                        <span class="badge bg-danger">Non</span>
                                    @endif
                                </td>

                                <td>{{ $service->annonceur->nom ?? 'N/A' }}</td>

                                <td>{{ $service->created_at->diffForHumans() }}</td>

                                {{-- actions --}}
                                <td class="d-flex gap-1">

                                    <a class="btn btn-sm btn-info text-white"
                                       href="{{ route('servicepublicitaire.show', $service->id) }}">
                                        show
                                    </a>

                                    <a class="btn btn-sm btn-warning text-dark"
                                       href="{{ route('servicepublicitaire.edit', $service->id) }}">
                                        edit
                                    </a>

                                    <form action="{{ route('servicepublicitaire.destroy', $service->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Supprimer ce service ?')"
                                                class="btn btn-sm btn-danger">
                                            delete
                                        </button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>

            </div>

            <div class="card-footer"></div>

        </div>

    </div>

@endsection
