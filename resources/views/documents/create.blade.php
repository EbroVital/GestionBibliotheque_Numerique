@extends('template')

@section('title', 'Ajout de document')
@section('content')
    <div class="container">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
            </ul>
        </div>
        @endif

        <div class="app-content">
		    <div class="container-xl">
			    <h1 class="app-page-title">Ajouter un nouveau document</h1>
			    {{-- <hr class="mb-4"> --}}
                <div class="row settings-section">
	                {{-- <div class="col-12 col-md-4">
		                <h3 class="section-title">General</h3>
		                <div class="section-intro">Settings section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="help.html">Learn more</a></div>
	                </div> --}}
	                <div>
		                <div class="app-card app-card-settings shadow-sm p-4">

						    <div class="app-card-body">

                                <form action="{{ route('fichiers.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="titre" class="form-label">Titre</label>
                                        <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description </label>
                                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="categorie_id" class="form-label">Catégorie</label>
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
                                        <label for="chemin" class="form-label">Document (PDF de préférence)</label>
                                        <input type="file" name="url_fichier" id="fichier" class="form-control" accept="application/pdf">

                                    </div>

                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                    <a href="{{ route('fichiers.index') }}" class="btn btn-secondary">Annuler</a>
                                </form>

						    </div><!--//app-card-body-->

						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
		    </div><!--//container-fluid-->
	    </div>

    </div>
@endsection
