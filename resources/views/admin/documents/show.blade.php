@extends('templateAdmin')

@section('title', 'Details')
@section('content')
    <div class="container">
        <h1>Détails du document</h1>

        <div class="card">
            <div class="card-body">
                <h3>Titre : {{ $document->titre }}</h3>
                <p>Description : {{ $document->description ?? 'Pas de description' }}</p>
                <p>
                    Nombre de vues : {{ $document->vues }}
                </p>
                <p>
                    Nombre de téléchargement : {{ $document->telechargements }}
                </p>
                {{-- <p>Ajouté par : {{ $document->user->name ?? 'Inconnu' }}</p> --}}
                <p>
                    Nombre de commentaire : {{ $document->commentaires_count }}
                </p>

                <p>
                    Nombre de notations : {{ $document->notations_count }}
                </p>

                <p>
                    Nombre de favoris : {{ $document->favoris_count }}
                </p>

            </div>
        </div>

        <a href="{{ route('documents.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    </div>
@endsection
