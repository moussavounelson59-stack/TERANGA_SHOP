@extends('layouts.app')

@section('titre', 'Panier')

@section('contenu')
    <section class="page-hero">
        <div class="page-hero-inner">
            <div class="eyebrow">Mon panier</div>
            <h1>Votre sélection est en cours.</h1>
            <p>Ajoutez des produits, vérifiez votre commande et passez à l’étape suivante.</p>
        </div>
    </section>

    <section class="section">
        <div class="alerte alerte-vide">
            <strong>Votre panier est vide pour le moment.</strong><br>
            Explorez notre catalogue pour ajouter vos produits préférés.
        </div>

        <div style="text-align: center; margin-top: 22px;">
            <a href="{{ route('produits.index') }}" class="btn btn-primary">Retourner à la boutique</a>
        </div>
    </section>
@endsection
