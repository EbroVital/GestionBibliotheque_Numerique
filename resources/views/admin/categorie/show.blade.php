@extends('templateAdmin')

@section('title', 'detais de la catégorie')
@section('content')
    <div class="container">
        <h3>Détails de la catégorie</h3>

        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">{{ $categorie->libelle }}</h4>
                {{-- <p class="card-text"><strong>ID:</strong> {{ $categorie->id }}</p> --}}
            </div>
        </div>

        <h5>Documents liés à cette catégorie :</h5>
        @if($categorie->documents->count())
            <ul class="list-group">
                @foreach($categorie->documents as $document)
                    <li class="list-group-item">
                        <strong> {{ $document->titre }} </strong>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="alert alert-info text-center">Aucun document pour cette catégorie.</p>
        @endif

        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Retour</a>
    </div>
@endsection
