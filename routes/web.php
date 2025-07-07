<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DownloadAdminController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\FavController;
use App\Http\Controllers\FavoriController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListCatController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\NotationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecentDocumentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/test-role', function () {
//     return auth()->user()->role ?? 'non connecté';
// })->middleware('auth');


// Route::get('/', function () {
//     return view('home');
// })->name("home");

// la route de la page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/', [HomeController::class, 'search'])->name('searchFile');

Route::middleware(['auth', 'role:admin'])->group(function () {

    // Gestion des categories
    Route::resource('categories', CategoryController::class);

    // Gestion des telechargements
    Route::get('/telechargement', [DownloadAdminController::class, 'index']);

    // Gestion des commentaires
    Route::get('/Comment', [CommentController::class, 'index'])->name('comment');
    Route::delete('/Comment/{id}', [CommentController::class, 'destroy']);

    // Gestion des favoris
    Route::get('/Favori', [FavController::class, 'index'])->name('Fav');
    Route::delete('/Favori/{id}', [FavController::class, 'destroy']);

    // Gestion des notations
    Route::get('/notations', [RatingController::class, 'index'])->name('ratings');

    // Gestion des documents
    Route::resource('documents', FichierController::class);

    // Gestion des utilisateurs
    Route::resource('users', UserController::class);

    // dashboard
    Route::get('/admin/dashboard',[DashboardAdminController::class, 'index'])->name('admin.dashboard');

});

// Route des utilisateurs connectés
Route::middleware(['auth'])->group(function () {

    // les favoris
    Route::resource('favoris', FavoriController::class);

    // les ccommentaires
    Route::resource('commentaire', CommentaireController::class);

    // les notations
    Route::resource('notation', NotationController::class);

    // Documents
    Route::resource('fichiers', DocumentController::class);

    // Téléchargements
    Route::get('/download/{id}', [DownloadController::class, 'telecharger'])->name('document.download');
    Route::get('/telechargements', [DownloadController::class, 'index'])->name('download.index');

    // tableau de bord
    Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('dashboardUser');

    // liste de tous les documents du site
    Route::resource('docs', RecentDocumentController::class);

    // liste de toutes les category
    Route::get('/category/{id}', [ListCatController::class, 'index'])->name('documents.category');
});


// route for users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
