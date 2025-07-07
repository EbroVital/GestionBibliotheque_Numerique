@extends('templateAdmin')

@section('title', 'Ajout de catégorie')
@section('content')
    <div class="container">

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <div class="app-content">
		    <div class="container-xl">
			    <h1 class="app-page-title">Ajouter une nouvelle categorie</h1>
			    {{-- <hr class="mb-4"> --}}
                <div class="row settings-section">
	                {{-- <div class="col-12 col-md-4">
		                <h3 class="section-title">General</h3>
		                <div class="section-intro">Settings section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="help.html">Learn more</a></div>
	                </div> --}}
	                <div>
		                <div class="app-card app-card-settings shadow-sm p-4">

						    <div class="app-card-body">

                                <form action="{{ route('categories.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="libelle" class="form-label">Libellé</label>
                                        <input type="text" name="libelle" id="titre" class="form-control" value="{{ old('libelle') }}">
                                    </div>

                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
                                </form>

						    </div><!--//app-card-body-->

						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
		    </div><!--//container-fluid-->
	    </div>

    </div>
@endsection
