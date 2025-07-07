@extends('template')

@section('title', 'Liste des favoris')
@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
			    <h1 class="app-page-title mb-0">Mes favoris</h1>
			</div>
			{{-- <div class="col-auto">
				<div class="page-utilities">
					<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
						<div class="col-auto">
						</div><!--//col-->
						<div class="col-auto">
							<a href="{{ route('fichiers.create') }}" class="btn bg-success">Ajouter un document</a>
						</div>
					</div><!--//row-->
				</div><!--//table-utilities-->
			</div><!--//col-auto--> --}}
		</div>



        @if($favori->count())
        <table class="table table-bordered app-card">
            <thead>
                <tr>
                    <th class="text-center">Titre du document</th>
                    <th class="text-center">Document ajouté par </th>
                    <th class="text-center">Catégorie</th>
                    <th class="text-center">Date d'ajout</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($favori as $fav)

                    <tr>
                        <td class="text-center"> {{ $fav->document->titre }} </td>
                        <td class="text-center">

                            @if( $fav->document->user->role == 'admin')
                                L'administrateur
                            @else
                                {{ $fav->document->user->name }}
                            @endif

                        </td>
                        <td class="text-center"> {{ $fav->document->categorie->libelle }} </td>
                        <td class="text-center"> {{ $fav->created_at->format('d/m/Y à H:i') }} </td>

                        <td class="text-center">

                            <form action="{{ route('favoris.destroy', $fav->document->id) }}" method="POST" onsubmit="return confirm('Voulez-vous retirer ce document de vos favoris ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Retirer des favoris</button>
                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>
        </table>

        {{ $favori->links() }}

        @else
            <div class="alert alert-success text-center">Aucun favori trouvé !</div>
        @endif
    </div>
@endsection
