@extends('templateAdmin')

@section('title', 'Liste des utilisateurs')
@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
			    <h1 class="app-page-title mb-0">La liste des utilisateurs</h1>
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
						{{-- <div class="col-auto">
							<a href="{{ route('categories.create') }}" class="btn bg-success">Ajouter une catégorie</a>
						</div> --}}
					</div><!--//row-->
				</div><!--//table-utilities-->
			</div><!--//col-auto-->
		</div>

        <div class="app-card">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nom et prenom(s)</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Date d'inscription</th>
                        <th class="text-center">Documents ajoutés</th>
                        {{-- <th class="text-center">Rôle</th> --}}
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{ $loop->iteration  }}</td>
                            <td class="text-center">{{ $user->name  }}</td>
                            <td class="text-center">{{ $user->email  }}</td>
                            <td class="text-center">{{ $user->created_at->format("d/m/Y à H:i")  }}</td>
                            <td class="text-center">{{ $user->documents_count  }}</td>
                            {{-- <td class="text-center">{{ $user->role  }}</td> --}}
                            <td class="text-center">
                                <a href="{{ route('users.show', $user) }}" class="btn btn-success btn-sm">Voir</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous supprimer cet utilisateur ?')">
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
