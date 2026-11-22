<?php

/**
 * ============================================================
 * TERANGA SHOP — Fichier de Routes Web
 * Fichier : routes/web.php
 * Auteur  : Moussavou Nelson
 * Contact : moussavounelson3@gmail.com | +221 77 272 09 87
 *
 * Description :
 *   Ce fichier définit toutes les routes HTTP du site TERANGA SHOP.
 *   Une route associe une URL (ex: /produits) à une action
 *   (contrôleur, vue ou fonction anonyme).
 *   Laravel lit ce fichier à chaque requête pour savoir quoi faire.
 * ============================================================
 */

use Illuminate\Support\Facades\Route;      // Façade Route : permet de définir des routes
use App\Http\Controllers\ProduitController; // Importe notre contrôleur de produits


/*
|--------------------------------------------------------------------------
| ROUTE 1 — Page d'accueil (/)
|--------------------------------------------------------------------------
| URL     : GET /
| Action  : Retourne la vue 'accueil' (resources/views/accueil.blade.php)
| Nom     : 'accueil' — permet de générer l'URL avec route('accueil')
|           dans les templates Blade (ex: href="{{ route('accueil') }}")
*/
Route::get('/', function () {
    // La fonction anonyme retourne directement la vue 'accueil'
    return view('accueil'); // Charge resources/views/accueil.blade.php
})->name('accueil'); // Nom de la route pour y faire référence dans les vues


/*
|--------------------------------------------------------------------------
| ROUTE 2 — Page À propos (/a-propos)
|--------------------------------------------------------------------------
| URL     : GET /a-propos
| Action  : Route::view() est un raccourci qui retourne directement une vue
|           sans avoir besoin d'un contrôleur ni d'une fonction anonyme.
| Nom     : 'a-propos'
*/
Route::view('/a-propos', 'a-propos') // Charge resources/views/a-propos.blade.php
     ->name('a-propos');             // Nommage de la route


/*
|--------------------------------------------------------------------------
| ROUTE 3 — Redirection permanente /boutique → /produits (301)
|--------------------------------------------------------------------------
| Lorsqu'un visiteur accède à /boutique, il est automatiquement redirigé
| vers /produits. Le code 301 indique une redirection permanente
| (cela aide aussi pour le référencement SEO).
*/
Route::redirect('/boutique', '/produits', 301); // 301 = redirection permanente


/*
|--------------------------------------------------------------------------
| ROUTE 4 — Liste des produits (/produits)
|--------------------------------------------------------------------------
| URL       : GET /produits
| Contrôleur: ProduitController, méthode index()
| Nom       : 'produits.index' (convention Laravel : ressource.action)
|
| Quand un visiteur accède à /produits, Laravel appelle
| ProduitController::index() qui charge la liste de tous les produits.
*/
Route::get('/produits', [ProduitController::class, 'index'])
     ->name('produits.index'); // Nommage : utilisé dans Blade avec route('produits.index')


/*
|--------------------------------------------------------------------------
| ROUTE 5 — Fiche d'un produit (/produits/{id})
|--------------------------------------------------------------------------
| URL       : GET /produits/{id}  — ex: /produits/1, /produits/3
| Contrôleur: ProduitController, méthode show($id)
| Nom       : 'produits.show'
| Contrainte: ->where('id', '[0-9]+') garantit que {id} ne contient
|             QUE des chiffres (0 à 9). Si l'URL contient une lettre
|             (ex: /produits/abc), Laravel retourne une erreur 404
|             sans même appeler le contrôleur.
*/
Route::get('/produits/{id}', [ProduitController::class, 'show'])
     ->name('produits.show')       // Nom de la route
     ->where('id', '[0-9]+');      // Contrainte : chiffres uniquement (regex)


/*
|--------------------------------------------------------------------------
| ROUTE 6 — Page Contact (/contact)
|--------------------------------------------------------------------------
| Affiche la page de contact avec les coordonnées du vendeur.
*/
Route::view('/contact', 'contact') // Charge resources/views/contact.blade.php
     ->name('contact');             // Nom de la route


/*
|--------------------------------------------------------------------------
| ROUTE 7 — Page Panier (/panier)
|--------------------------------------------------------------------------
| Page d'information sur comment passer commande.
*/
Route::view('/panier', 'panier') // Charge resources/views/panier.blade.php
     ->name('panier');            // Nom de la route
