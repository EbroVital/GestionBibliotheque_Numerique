@extends('docs.template')

@section('title', 'Details')
@section('content')
    <div class="container">
        <h1>Détails du document</h1>

        <hr class="mb-4">

         @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="row">
                <div class="col">
                    <div class="card-body">
                        <h3>Titre : {{ $document->titre }}</h3>
                        <p>Description : {{ $document->description ?? 'Pas de description' }}</p>

                        <p>
                            <a href="{{ asset('storage/' . $document->url_fichier) }}" target="_blank" class="btn btn-primary">Voir l'aperçu </a>

                            <a href="{{ route('document.download', ['id' => $document->id]) }}" class="btn btn-primary">Télécharger</a>

                        </p>

                        <p>
                            @if (!$document->isFavoriBy(auth()->id()))
                                <form action="{{ route('favoris.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="document_id" value="{{ $document->id }}">
                                    <button type="submit" class="btn btn-primary">Ajouter aux favoris</button>
                                </form>
                            @else
                                <div class="alert alert-info mt-2 text-center">
                                    Ce document est déjà dans vos favoris. Retirez-le pour pouvoir l'ajouter à nouveau.
                                </div>
                            @endif

                        </p>

                    </div>
                </div>

                <div class="col p-3">

                    <h4>Noter ce document</h4>

                    @if(Auth::check() && !$document->notations->where('user_id', Auth::id())->count())
                        <form action="{{ route('notation.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="document_id" value="{{ $document->id }}">
                            <select name="note" class="form-select w-50">
                                <option value="">Choisir une note</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }} ★</option>
                                @endfor
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Valider</button>
                        </form>
                    @elseif(Auth::check())
                        <div class="alert alert-info mt-2 text-center">
                            Vous avez déjà noté ce document. Une seule notation est autorisée.
                        </div>
                    @endif

                </div>

            </div>

        </div>

        <hr class="mb-4">

        <h4>Commentaires</h4>

        @foreach($document->commentaires as $commentaire)
            <div class="mb-2 border p-2 rounded">
                <strong>
                    @if ( $commentaire->user->role == 'admin' )
                        L'administrateur
                    @else
                        {{ $commentaire->user->name }}
                    @endif
                </strong> <br>
                {{ $commentaire->contenu }} <br>
                <small>Fait le {{ $commentaire->created_at->format('d/m/Y à H:i') }}</small>
            </div>
        @endforeach

        @if(Auth::check())
            <form action="{{ route('commentaire.store') }}" method="POST">
                @csrf
                <input type="hidden" name="document_id" value="{{ $document->id }}">
                <div class="form-group">
                    <label for="contenu">Ajouter un commentaire</label>
                    <textarea name="contenu" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-2">Envoyer</button>
            </form>
        @endif

        <hr class="mb-4">

        <h4>Notations</h4>

        @if($document->notations->count() > 0)

            <ul class="list-group mt-3">
                @foreach($document->notations as $notation)
                    <li class="list-group-item">
                        <strong>
                            @if( $notation->user->role == 'admin' )
                                L'administrateur
                            @else
                                {{ $notation->user->name  }}
                            @endif
                        </strong>  a ajouté {{ $notation->note }} ★
                        <br>
                        <small>Noté le {{ $notation->created_at->format('d/m/Y à H:i') }}</small>
                    </li>
                @endforeach
            </ul>

            <p class="mt-2">
                Moyenne des notes : <strong>{{ number_format($document->notations->avg('note'), 1) }} ★</strong>
                ({{ $document->notations->count() }} note(s))
            </p>

        @endif


        <a href="{{ route('docs.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    </div>

@endsection
