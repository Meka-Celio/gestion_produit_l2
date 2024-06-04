<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
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

/**
 * Pour créer des routes dans notre application
 */
Route::get('/', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produits/{produit_id}/delete', [ProduitController::class, 'destroy'])->name('produits.delete');
Route::post('mettreaupannier', [CommandeController::class, 'mettreaupanier'])->name('mettreaupanier');
Route::get('/panier', [CommandeController::class, 'showpanier'])->name('panier.show');

/**
 * Les différentes routes pour les catégories
 */
Route::resource('categories', CategorieController::class)->names([
    'index' => 'categories.index',
    'create' => 'categories.create',
    'store' => 'categories.store',
    'edit' => 'categories.edit',
    'update' => 'categories.update',
    'show' => 'categories.show'
]);
Route::delete('/categories/{category}', [CategorieController::class, 'destroy'])->name('categories.destroy');

/**
 * On peut regrouper les différentes routes en une seulee fois plutot que de 
 * créer plusieurs fois des routes différentes
 * 
 * Les différentes routes pour les produits
 */
Route::resource('produits', ProduitController::class)->names([
    'index' => 'produits.index',
    'create' => 'produits.create',
    'store' => 'produits.store',
    'edit' => 'produits.edit',
    'update' => 'produits.update',
    'show' => 'produits.show'
]);
