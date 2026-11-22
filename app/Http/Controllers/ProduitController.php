<?php

/**
 * ============================================================
 * TERANGA SHOP — Contrôleur des Produits
 * Fichier : app/Http/Controllers/ProduitController.php
 * Auteur  : Moussavou Nelson
 * Contact : moussavounelson3@gmail.com | +221 77 272 09 87
 *
 * Description :
 *   Ce contrôleur gère l'affichage des produits de la boutique.
 *   Il contient deux méthodes principales :
 *     - index() : affiche la liste complète des produits
 *     - show($id) : affiche la fiche détaillée d'un produit
 *   Le catalogue est stocké dans une méthode privée catalogue()
 *   pour simuler une base de données (projet front-end).
 * ============================================================
 */

namespace App\Http\Controllers; // Déclare l'espace de noms du contrôleur

use Illuminate\Http\Request; // Importe la classe Request de Laravel (requêtes HTTP)

/**
 * Classe ProduitController
 * Hérite de Controller (classe de base Laravel pour tous les contrôleurs)
 */
class ProduitController extends Controller
{
    /**
     * -------------------------------------------------------
     * MÉTHODE PRIVÉE : catalogue()
     * -------------------------------------------------------
     * Retourne un tableau associatif contenant tous les produits.
     * La clé du tableau est l'ID du produit (entier).
     * Chaque produit est lui-même un tableau avec les champs :
     *   - id       : identifiant unique du produit
     *   - nom      : nom du produit
     *   - categorie: catégorie du produit
     *   - prix     : prix en francs CFA (entier)
     *   - icon     : emoji représentant le produit
     *   - description : description courte du produit
     *
     * @return array Le catalogue complet des produits
     */
    private function catalogue(): array
    {
        // On retourne un tableau de produits TERANGA SHOP
        // Chaque ligne représente un produit vendu sur la boutique
        return [
            // --- Produits TERANGA SHOP ---

            1 => [
                'id'          => 1,
                'nom'         => 'Bissap 1 L',          // Boisson à l'hibiscus
                'categorie'   => 'Boissons',
                'prix'        => 1500,                   // Prix en FCFA
                'icon'        => '🍹',                   // Icône représentative
                'description' => 'Délicieux jus d\'hibiscus fait maison, sucré et rafraîchissant.',
            ],

            2 => [
                'id'          => 2,
                'nom'         => 'Thiakry 500 g',        // Dessert sénégalais au mil
                'categorie'   => 'Desserts',
                'prix'        => 1200,
                'icon'        => '🍮',
                'description' => 'Dessert traditionnel au mil fermenté et crème fraîche.',
            ],

            3 => [
                'id'          => 3,
                'nom'         => 'Café Touba 250 g',     // Café parfumé au djar
                'categorie'   => 'Boissons',
                'prix'        => 2000,
                'icon'        => '☕',
                'description' => 'Café parfumé aux épices africaines (djar et clou de girofle).',
            ],

            4 => [
                'id'          => 4,
                'nom'         => 'Panier en osier',      // Artisanat local sénégalais
                'categorie'   => 'Artisanat',
                'prix'        => 7500,
                'icon'        => '🧺',
                'description' => 'Panier tressé à la main par des artisans sénégalais locaux.',
            ],

            5 => [
                'id'          => 5,
                'nom'         => 'Thiéboudienne Kit',    // Plat national sénégalais
                'categorie'   => 'Épicerie',
                'prix'        => 3500,
                'icon'        => '🍚',
                'description' => 'Kit d\'épices pour préparer le plat national du Sénégal.',
            ],

            6 => [
                'id'          => 6,
                'nom'         => 'Savon Karité',         // Produit cosmétique naturel
                'categorie'   => 'Beauté',
                'prix'        => 2500,
                'icon'        => '🧼',
                'description' => 'Savon naturel au beurre de karité, hydratant et doux.',
            ],

            7 => [
                'id'          => 7,
                'nom'         => 'Boubou Tissé',         // Vêtement traditionnel
                'categorie'   => 'Mode',
                'prix'        => 15000,
                'icon'        => '👘',
                'description' => 'Boubou traditionnel tissé à la main, élégant pour toutes occasions.',
            ],

            8 => [
                'id'          => 8,
                'nom'         => 'Huile de Coco 500 ml', // Huile naturelle
                'categorie'   => 'Beauté',
                'prix'        => 4000,
                'icon'        => '🥥',
                'description' => 'Huile de coco pressée à froid, pour la peau et les cheveux.',
            ],
        ];
    }

    /**
     * -------------------------------------------------------
     * MÉTHODE PUBLIQUE : index()
     * -------------------------------------------------------
     * Affiche la liste complète de tous les produits du catalogue.
     * Cette méthode est appelée quand on visite l'URL /produits
     * via la route Route::get('/produits', ...) dans web.php.
     *
     * Étapes :
     * 1. Récupère tous les produits depuis catalogue()
     * 2. Les envoie à la vue 'produits.index' avec compact()
     *
     * @return \Illuminate\View\View La vue avec la liste des produits
     */
    public function index()
    {
        // Appelle la méthode privée pour obtenir tous les produits
        $produits = $this->catalogue();

        // Passe la variable $produits à la vue 'produits/index.blade.php'
        // compact('produits') crée automatiquement ['produits' => $produits]
        return view('produits.index', compact('produits'));
    }

    /**
     * -------------------------------------------------------
     * MÉTHODE PUBLIQUE : show($id)
     * -------------------------------------------------------
     * Affiche la fiche détaillée d'un seul produit identifié par $id.
     * Cette méthode est appelée quand on visite /produits/{id}
     * ex: /produits/1 → affiche le Bissap
     *     /produits/99 → erreur 404 (produit introuvable)
     *
     * @param int $id L'identifiant du produit (extrait de l'URL)
     * @return \Illuminate\View\View La vue avec le produit
     */
    public function show($id)
    {
        // Récupère tous les produits du catalogue
        $catalogue = $this->catalogue();

        // Vérifie si l'ID existe dans le catalogue
        // array_key_exists() retourne true si la clé $id existe dans le tableau
        if (!array_key_exists($id, $catalogue)) {
            // Si le produit n'existe pas, on déclenche une erreur 404
            // abort(404) arrête l'exécution et affiche la page d'erreur Laravel
            abort(404, "Produit introuvable.");
        }

        // Récupère le produit correspondant à l'ID demandé
        $produit = $catalogue[$id];

        // Retourne la vue 'produits/show.blade.php' avec le produit
        return view('produits.show', compact('produit'));
    }
}
