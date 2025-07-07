@extends('docs.template')

@section('title', 'Tous les documents')
@section('content')


    <div class="row g-3 mb-4 align-items-center justify-content-between">
		<div class="col-auto">
			<h1 class="app-page-title mb-0">Les documents</h1>
		</div>
		<div class="col-auto">
			<div class="page-utilities">
				<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
					{{-- <div class="col-auto">
								    <form class="docs-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-docs" name="searchdocs" class="form-control search-docs" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>

					</div><!--//col--> --}}
					<div class="col-auto">
                        <form action="{{ route('docs.index') }}" method="GET" class="mb-4">
                            <select class="form-select" onchange="this.form.submit()" name="categorie_id" id="categorie_id">
                                <option value="">Toutes les catégories</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}" {{ request('categorie_id') == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                                    @endforeach
                            </select>
                        </form>
					</div>
				</div><!--//row-->
			</div>
        </div>    <!--//table-utilities-->
	</div>

        <hr class="mb-4">

    <div class="row g-4">
        @foreach ($documents as $document)
            <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
                <div class="app-card app-card-doc shadow-sm h-100">
                    <div class="app-card-thumb-holder p-3">
                        <span class="icon-holder">
                            <i class="fas fa-file-pdf pdf-file"></i>
                        </span>
                    </div>
                    <div class="app-card-body p-3 has-card-actions">
                        <h4 class="app-doc-title truncate mb-0"> {{ $document->titre }} </h4>
                        <div class="app-doc-meta">
                            <ul class="list-unstyled mb-0">
                                        <li>
                                            <span class="text-muted">Description :</span>
                                            {{ $document->description}}
                                        </li>
                                        <li>
                                            @if ($document->user->role == "admin")
                                                <span class="text-muted">Ajouté par :</span>
                                                    L'administrateur
                                            @else
                                                <span class="text-muted">Ajouté par :</span>
                                                {{ $document->user->name }}
                                            @endif
                                        </li>
                                        <li>
                                            <span class="text-muted">Date d'ajout :</span>
                                                {{ $document->created_at->format("d/m/Y à H:i") }}
                                        </li>
                            </ul>
                        </div><!--//app-doc-meta-->
                        <div class="app-card-actions">
                            <div class="dropdown">
                                <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                            </svg>
                                </div><!--//dropdown-toggle-->
                                <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('docs.show', $document)}} ">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                    </svg> Voir
                                                </a>
                                            </li>
                                </ul>
                            </div><!--//dropdown-->
                        </div><!--//app-card-actions-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div>
        @endforeach
    </div>

@endsection


