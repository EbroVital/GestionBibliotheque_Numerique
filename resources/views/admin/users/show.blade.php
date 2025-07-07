@extends('templateAdmin')

@section('tilte', 'Détails')
@section('content')
<div class="container">
    <h2>Détails de l'utilisateur : {{ $user->name }}</h2>

    <p><strong>Email :</strong> {{ $user->email }}</p>
    <p><strong>Nombre de documents ajoutés :</strong> {{ $user->documents->count() }}</p>

    <hr>

    <h4>Documents ajoutés</h4>
    @if($user->documents->isEmpty())
        <p class="alert alert-info text-center">Aucun document ajouté.</p>
    @else
        <ul class="list-group">
            @foreach($user->documents as $document)
                <li class="list-group-item">
                    Nom : <strong>{{ $document->titre }}</strong> <br>
                    Catégorie : {{ $document->categorie->libelle ?? 'Non classé' }} <br>
                    Ajouté le : {{ $document->created_at->format('d/m/Y à H:i') }}
                </li>

            @endforeach
        </ul>
    @endif

    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>

@endsection
