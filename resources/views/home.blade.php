<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque en Ligne</title>
    {{-- <link rel="website icon" type="png" href="{{asset("img/gecos.png")}}"> --}}

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> --}}

    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .hero-section {
            background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.8)),
                        url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .book-card {
            transition: transform 0.3s;
            height: 100%;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .category-badge {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        footer {
            background-color: var(--primary-color);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href=" {{ route('home') }} ">
                {{-- <img src="{{ asset("img/gecos.png")}}" alt=""> --}}
                <i class="fas fa-book-open me-2"></i>Bibliotheque numérique
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button class="nav-link active" href="">Accueil</button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cat">Catégories</a>
                    </li>
                </ul>
                @if (Route::has('login'))
                    <div class="ms-3">
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <a href="{{ url('/admin/dashboard') }}" class="btn btn-outline-light me-2">Tableaud de bord</a>
                            @else
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-light me-2">Tableaud de bord</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Se connecter</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">Inscription</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Section Hero -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4">Bienvenu(e) sur Needy</h1>
            <p class="lead mb-5">
                La plateforme collaborative de partage de documents PDF.
                <br> Partage, télécharge et découvre de nouveaux contenus facilement.
            </p>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('home') }} " method="GET" class="d-flex justify-content mb-5">
                        <input type="text" name="query" class="form-control form-control-lg" placeholder="Rechercher un document..." value="{{ request('query') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Rechercher
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col">
                    <h2 class="fw-bold">Comment ça marche ?</h2>
                    <p class="text-muted">Accédez à la connaissance en 3 étapes simples</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>1. Recherchez</h3>
                        <p class="text-muted">Trouvez le document dont vous avez besoin grâce à notre moteur de recherche puissant.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
                            </svg>
                        </div>
                        <h3>2. Télécharger</h3>
                        <p class="text-muted">Cliquez sur "télécharger" pour l'avoir à porté de main.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon">
                            {{-- <i class="fas fa-graduation-cap"></i> --}}
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h3>3. Étudiez</h3>
                        <p class="text-muted">Lisez le document hors connexion.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">

        @if(isset($query))
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold">Résultats pour "{{ $query }}"</h2>
                </div>
                <div class="row">
                    @if($documents->count())
                        <ul>
                            @foreach($documents as $docs)
                                <li>{{ $docs->titre }} - <a href="{{ route('docs.show', $docs->id) }}" class="btn btn-outline-secondary">Voir</a></li>
                            @endforeach
                        </ul>
                    @else
                        <p> Aucun résultat trouvé.</p>
                    @endif
                </div>
            </div>
        @else
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold">Derniers documents ajoutés</h2>
                    <div class="text-center mt-4">

                        <a href=" {{ route('docs.index')}} " class="btn btn-outline-secondary">Voir tous les documents</a>

                    </div>
                </div>
                <div class="row">

                        @foreach($documents as $document)
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $document->titre }}</h5>
                                        <p class="card-text">
                                            Catégorie : {{ $document->categorie->libelle }}<br>
                                            @if($document->user && $document->user->role === 'admin')
                                                Ajouté par : L'administrateur
                                                <br>Le : {{ $document->created_at->format('d/m/Y à H:i')  }}
                                            @else
                                                Ajouté par : {{ $document->user->name }}<br>
                                                Le : {{ $document->created_at->format('d/m/Y à H:i') }}
                                            @endif
                                            <br>
                                            Moyenne des notes : <strong>{{ number_format($document->notations->avg('note'), 1) }} <i class="fa fa-star text-warning"></i></strong>

                                        </p>
                                        {{-- <a href="{{ route('fichiers.show', $document->id) }}" class="btn btn-primary">Voir</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach


                </div>
            </div>
        @endif

    </section>

    <!-- Catégories -->
    <section class="py-5 bg-light" id="cat">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Parcourir par catégories</h2>
                <p class="text-muted">Découvrez nos collections thématiques</p>
            </div>
            <div class="row g-4">
                <div class="mb-4">
                    {{--  --}}
                    @foreach($categories as $category)
                        <a href="{{ route('documents.category', $category->id) }}" class="btn btn-outline-primary me-2 mb-2">
                            {{ $category->libelle }} ({{ $category->documents_count }})
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Prêt à explorer notre bibliothèque ?</h2>
            <p class="lead mb-5">Rejoignez notre communauté d'apprenants et accédez à des milliers de ressources gratuitement.</p>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg me-3">Créer un compte</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            {{-- <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="text-white mb-4">
                        <i class="fas fa-book-open me-2"></i>Bibliotheque numérique
                    </h5>
                    <p class="text-muted">La bibliothèque numérique du Médiathèque IvoireSoft, accessible à tous les élèves et enseignants.</p>
                </div>
                <div class="col-md-2 mb-4 mb-md-0">
                    <h5 class="text-white mb-4">Liens</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-muted">Accueil</a></li>
                        <li class="mb-2"><a href="#" class="text-muted">Catalogue</a></li>
                        <li class="mb-2"><a href="#" class="text-muted">Emprunts</a></li>
                        <li class="mb-2"><a href="#" class="text-muted">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5 class="text-white mb-4">Catégories</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-muted">Manuels scolaires</a></li>
                        <li class="mb-2"><a href="#" class="text-muted">Romans</a></li>
                        <li class="mb-2"><a href="#" class="text-muted">Mémoires</a></li>
                        <li class="mb-2"><a href="#" class="text-muted">Revues</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-white mb-4">Contact</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> du Médiathèque IvoireSoft, Abidjan, Côte d'Ivoire</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> +225 22 34 56 78</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> contact@mediathèqueIvoreSoft.edu</li>
                    </ul>
                    <div class="mt-4">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div> --}}
            {{-- <hr class="my-4 bg-secondary"> --}}
            <div class="row">
                <div class="text-center">
                    <p class="mb-0">&copy; 2025 Bibliothèque numérique. Tous droits réservés.</p>
                </div>
                {{-- <div class="col-md-6 text-center text-md-end">
                    <p class="small text-muted mb-0">Conçu avec <i class="fas fa-heart text-danger"></i> pour l'éducation</p>
                </div> --}}
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
