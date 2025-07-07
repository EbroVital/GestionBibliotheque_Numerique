@extends('template')

@section('title', 'Liste des commentaires')
@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
			    <h1 class="app-page-title mb-0">Mes notations</h1>
			</div>

		</div>



        @if($notes->count())
        <table class="table table-bordered app-card">
            <thead>
                <tr>
                    <th class="text-center">Titre du document</th>
                    <th class="text-center">Document ajouté par </th>
                    <th class="text-center">Catégorie</th>
                    <th class="text-center">Ma note</th>
                    <th class="text-center">Date d'ajout</th>
                    {{-- <th class="text-center">Actions</th> --}}
                </tr>
            </thead>
            <tbody>

                @foreach($notes as $note)

                    <tr>
                        <td class="text-center"> {{ $note->document->titre }} </td>
                        <td class="text-center">

                            @if( $note->document->user->role == 'admin')
                                L'administrateur
                            @else
                                {{ $note->document->user->name }}
                            @endif

                        </td>
                        <td class="text-center"> {{ $note->document->categorie->libelle }} </td>

                         <td class="text-center"> {{ $note->note }}★ </td>

                        <td class="text-center"> {{ $note->created_at->format('d/m/Y à H:i') }} </td>


                    </tr>

                @endforeach

            </tbody>
        </table>

        {{ $notes->links() }}

        @else
            <div class="alert alert-success text-center">Aucune notation trouvée !</div>
        @endif
    </div>
@endsection
