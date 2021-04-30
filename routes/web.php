<?php

use App\Models\Produit;
use App\Mail\AjoutProduit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\FormationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', [MainController::class, 'acceuil'])->middleware(['auth', 'isAdmin'])->name('acceuil'); si on applique un middweare cest pour forcer a se connecter avant d'acceder a la page dacceuil

// Route::middleware(['auth', 'isAdmin'])->group(function () {
    // });
    Route::get('/', [MainController::class, 'acceuil'])->name('acceuil');

    
    Route::resource('categories', CategoryController::class);

Route::resource('produits', ProduitsController::class);

Route::get('export', [ProduitsController::class, 'export'])->name('export');

Route::get('test-mail', function ()
{
    return new AjoutProduit(Produit::orderByDesc('id')->first());
});

Route::get('index', [FormationController::class, 'index']);

Route::get('ajouter-produit', [FormationController::class, 'ajouterProduit']);
Route::get('ajouter-produit-2', [FormationController::class, 'ajouterProduit2']);
Route::get('update-produit', [FormationController::class, 'updateProduit']);
Route::get('update-produit-2/{produit}', [FormationController::class, 'updateProduit2']);
Route::get('update-produit-2/{produit}', [FormationController::class, 'updateProduit2']);
Route::get('suppression-produit', [FormationController::class, 'suppressionProduit']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
