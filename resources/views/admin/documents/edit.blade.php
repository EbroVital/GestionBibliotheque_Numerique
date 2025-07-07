@extends('templateAdmin')

@section('title', 'Modification')
@section('content')
    <div class="container">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif

        <div class="app-content">
		    <div class="container-xl">
			    <h1 class="app-page-title">Modifier un document</h1>
			    {{-- <hr class="mb-4"> --}}
                <div class="row settings-section">
	                <div>
		                <div class="app-card app-card-settings shadow-sm p-4">

						    <div class="app-card-body">

                                <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="titre" class="form-label">Titre</label>
                                        <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $document->titre) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description </label>
                                        <textarea name="description" id="description" class="form-control">{{ old('description', $document->description) }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Catégorie</label>
                                        <select name="categorie_id" id="category_id" class="form-select" required>
                                            <option value="">-- Choisissez une catégorie --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ (old('categorie_id') ?? ($document->categorie_id ?? '')) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->libelle }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="chemin" class="form-label">URL du document (PDF de préférence)</label>
                                        <input type="file" name="url_chemin" id="chemin" class="form-control" value="{{ old('url_chemin', $document->url_chemin) }}">
                                    </div>

                                    <button type="submit" class="btn btn-success">Modifier</button>
                                    <a href="{{ route('documents.index') }}" class="btn btn-secondary">Annuler</a>
                                </form>

						    </div><!--//app-card-body-->

						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
		    </div><!--//container-fluid-->
	    </div>

    </div>
@endsection
