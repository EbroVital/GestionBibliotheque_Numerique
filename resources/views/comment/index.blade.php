@extends('template')

@section('title', 'Liste des commentaires')
@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
			    <h1 class="app-page-title mb-0">Mes commentaires</h1>
			</div>

		</div>



        @if($comment->count())
        <table class="table table-bordered app-card">
            <thead>
                <tr>
                    <th class="text-center">Titre du document</th>
                    <th class="text-center">Document ajouté par </th>
                    <th class="text-center">Catégorie</th>
                    <th class="text-center">Contenu</th>
                    <th class="text-center">Date d'ajout</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($comment as $com)

                    <tr>
                        <td class="text-center"> {{ $com->document->titre }} </td>
                        <td class="text-center">

                            @if( $com->document->user->role == 'admin')
                                L'administrateur
                            @else
                                {{ $com->document->user->name }}
                            @endif

                        </td>
                        <td class="text-center"> {{ $com->document->categorie->libelle }} </td>

                         <td class="text-center"> {{ $com->contenu }} </td>

                        <td class="text-center"> {{ $com->created_at->format('d/m/Y à H:i') }} </td>

                        <td class="text-center">
                            <form action="{{ route('commentaire.destroy', $com) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous supprimer ce commentaire ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>

                    </tr>

                @endforeach

            </tbody>
        </table>

        {{ $comment->links() }}

        @else
            <div class="alert alert-success text-center">Aucun Commentaire trouvé !</div>
        @endif
    </div>
@endsection
