@extends('layouts.app')

@section('titre', $produit['nom'])

@section('contenu')
    <section class="page-hero">
        <div class="page-hero-inner">
            <div class="eyebrow">Produit</div>
            <h1>{{ $produit['nom'] }}</h1>
            <p>{{ $produit['description'] }}</p>
        </div>
    </section>

    <section class="section">
        <div class="produit-card">
            <div class="produit-visuel" aria-hidden="true">{{ $produit['icon'] }}</div>

            <div>
                <h2 class="produit-nom">{{ $produit['nom'] }}</h2>

                <div class="produit-info">
                    <div class="produit-info-ligne">
                        <strong>Catégorie</strong>
                        <span class="badge-categorie badge-{{ $produit['categorie'] }}">{{ $produit['categorie'] }}</span>
                    </div>

                    <div class="produit-info-ligne">
                        <strong>Prix</strong>
                        <span class="prix">{{ number_format($produit['prix'], 0, ',', ' ') }} FCFA</span>
                    </div>

                    <div class="produit-info-ligne">
                        <strong>Description</strong>
                        <span>{{ $produit['description'] }}</span>
                    </div>
                </div>

                <div class="note">
                    Produit sélectionné avec soin pour offrir une expérience authentique et gourmande.
                </div>

                <div style="display: flex; gap: 14px; flex-wrap: wrap; margin-top: 24px;">
                    <a href="{{ route('produits.index') }}" class="btn btn-secondary">Retour au catalogue</a>
                    <a href="{{ route('panier') }}" class="btn btn-primary">Ajouter au panier</a>
                </div>
            </div>
        </div>
    </section>
@endsection
