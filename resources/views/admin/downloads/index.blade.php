@extends('templateAdmin')

@section('title', 'Liste des telechargements')
@section('content')
    <div class="container">

        {{-- @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif --}}

        <div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
			    <h1 class="app-page-title mb-0">Mes téléchargements</h1>
			</div>
			<div class="col-auto">
				<div class="page-utilities">
					<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
						<div class="col-auto">
							{{-- <form class="docs-search-form row gx-1 align-items-center">
					            <div class="col-auto">
					                <input type="text" id="search-docs" name="searchdocs" class="form-control search-docs" placeholder="Search">
					            </div>
					            <div class="col-auto">
					                <button type="submit" class="btn app-btn-secondary">Search</button>
					            </div>
					        </form> --}}
						</div><!--//col-->
						{{-- <div class="col-auto">
							<a href="{{ route('fichiers.create') }}" class="btn bg-success">Ajouter un document</a>
						</div> --}}
					</div><!--//row-->
				</div><!--//table-utilities-->
			</div><!--//col-auto-->
		</div>



        @if($downloads->count())
        <table class="table table-bordered app-card">
            <thead>
                <tr>
                    <th class="text-center">Document téléchargé</th>
                    <th class="text-center">Ajouté par</th>
                    <th class="text-center">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($downloads as $download)
                <tr>
                    <td class="text-center">{{ $download->document->titre }}</td>
                    <td class="text-center"> {{ $download->document->user->name }} </td>
                    <td class="text-center">{{ $download->created_at->format("d/m/Y à H:i") }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $downloads->links() }}

        @else
            <div class="alert alert-success text-center">Aucun téléchargement éffectué !</div>
        @endif
    </div>
@endsection
