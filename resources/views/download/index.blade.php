@extends('template')

@section('title', 'Liste des téléchargements')
@section('content')
    <div class="container">

        {{-- @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif --}}

        <div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
			    <h1 class="app-page-title mb-0">Mes Téléchargements</h1>
			</div>

		</div>



        @if($docDownload->count())
        <table class="table table-bordered app-card">
            <thead>
                <tr>
                    <th class="text-center">Titre du document</th>
                    <th class="text-center">Document ajouté par </th>
                    <th class="text-center">Catégorie</th>
                    <th class="text-center">Télécharger le </th>
                </tr>
            </thead>
            <tbody>

                @foreach($docDownload as $doc)

                    <tr>
                        <td class="text-center"> {{ $doc->document->titre }} </td>
                        <td class="text-center">

                            @if( $doc->document->user->role == 'admin')
                                L'administrateur
                            @else
                                {{ $doc->document->user->name }}
                            @endif

                        </td>
                        <td class="text-center"> {{ $doc->document->categorie->libelle }} </td>

                        <td class="text-center"> {{ $doc->created_at->format('d/m/Y à H:i') }} </td>
                    </tr>

                @endforeach

            </tbody>
        </table>

        {{ $docDownload->links() }}

        @else
            <div class="alert alert-success text-center">Aucun Téléchargement fait  !</div>
        @endif
    </div>
@endsection
