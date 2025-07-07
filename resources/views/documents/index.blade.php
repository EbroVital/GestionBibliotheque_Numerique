@extends('template')

@section('title', 'Liste des documents')
@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
			    <h1 class="app-page-title mb-0">Mes documents</h1>
			</div>
			<div class="col-auto">
				<div class="page-utilities">
					<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
						<div class="col-auto">
							{{-- <form class="docs-search-form row gx-1 align-items-center">
					            <div class="col-auto">
					                <input type="text" id="search-docs" name="searchdocs" class="form-control search-docs" placeholder="Search">
					            </div>
					            <div class="col-auto">
					                <button type="submit" class="btn app-btn-secondary">Search</button>
					            </div>
					        </form> --}}
						</div><!--//col-->
						<div class="col-auto">
							<a href="{{ route('fichiers.create') }}" class="btn bg-success">Ajouter un document</a>
						</div>
					</div><!--//row-->
				</div><!--//table-utilities-->
			</div><!--//col-auto-->
		</div>



        @if($documents->count())
        <table class="table table-bordered app-card">
            <thead>
                <tr>
                    <th class="text-center">Titre</th>
                    <th class="text-center">Description</th>
                    {{-- <th class="text-center">URL</th> --}}
                    <th class="text-center">Catégorie</th>
                    <th class="text-center">Date d'ajout</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $document)
                <tr>
                    <td class="text-center">{{ $document->titre }}</td>
                    <td class="text-center">{{ Str::limit($document->description, 50) }}</td>
                    {{-- <td class="text-center"><a href="{{ $document->url_chemin }}" target="_blank">Voir</a></td> --}}
                    <td class="text-center">{{ $document->categorie->libelle  }}</td>
                    <td class="text-center"> {{ $document->created_at->format("d/m/Y à H:i")}} </td>
                    <td class="text-center">
                        <a href="{{ route('fichiers.show', $document) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('fichiers.edit', $document->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('fichiers.destroy', $document) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous supprimer ce document ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $documents->links() }}

        @else
            <div class="alert alert-success text-center">Aucun document trouvé !</div>
        @endif
    </div>
@endsection
