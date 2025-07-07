@extends('templateAdmin')

@section('title', 'Liste des catégories')
@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
			    <h1 class="app-page-title mb-0">Les catégories</h1>
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
							<a href="{{ route('categories.create') }}" class="btn bg-success">Ajouter une catégorie</a>
						</div>
					</div><!--//row-->
				</div><!--//table-utilities-->
			</div><!--//col-auto-->
		</div>

        <div class="app-card">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Libellé</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorie as $cat)
                        <tr>
                            <td class="text-center">{{ $cat->libelle  }}</td>
                            <td class="text-center">
                                <a href="{{ route('categories.show', $cat) }}" class="btn btn-success btn-sm">Voir</a>
                                <a href="{{ route('categories.edit', $cat) }}" class="btn btn-warning btn-sm">Modifier</a>
                                <form action="{{ route('categories.destroy', $cat) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette catégorie ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    {{-- @empty
                        <div class="alert alert-success text-center">Aucune catégorie trouvée !</div> --}}
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
