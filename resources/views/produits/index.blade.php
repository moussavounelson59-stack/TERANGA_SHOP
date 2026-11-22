@extends('layouts.app')

@section('titre', 'Produits')

@section('contenu')
    <section class="page-hero">
        <div class="page-hero-inner">
            <div class="eyebrow">Catalogue</div>
            <h1>Nos produits sélectionnés.</h1>
            <p>Découvrez notre gamme de saveurs, accessoires, mode et produits de beauté.</p>
        </div>
    </section>

    <section class="section">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produit</th>
                        <th>Catégorie</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $produit)
                        <tr>
                            <td>#{{ $produit['id'] }}</td>
                            <td>
                                <strong>{{ $produit['icon'] }} {{ $produit['nom'] }}</strong>
                            </td>
                            <td>
                                <span class="badge-categorie badge-{{ $produit['categorie'] }}">
                                    {{ $produit['categorie'] }}
                                </span>
                            </td>
                            <td class="prix">{{ number_format($produit['prix'], 0, ',', ' ') }} FCFA</td>
                            <td>
                                <a href="{{ route('produits.show', ['id' => $produit['id']]) }}" class="btn btn-sm btn-secondary">
                                    Voir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
