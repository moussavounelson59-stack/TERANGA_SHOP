@extends('layouts.app')

@section('titre', 'Accueil')

@section('contenu')
    <section class="hero">
        <div class="hero-content">
            <div class="eyebrow">Boutique sénégalaise</div>
            <h1>Des saveurs et produits <span>authentiques</span> du Sénégal.</h1>
            <p>
                TERANGA SHOP met à votre portée des produits locaux sélectionnés
                avec soin : boissons, épices, artisanat, beauté et mode.
            </p>

            <div style="display: flex; gap: 14px; flex-wrap: wrap;">
                <a href="{{ route('produits.index') }}" class="btn btn-primary">Découvrir les produits</a>
                <a href="{{ route('a-propos') }}" class="btn btn-secondary">Qui sommes-nous ?</a>
            </div>
        </div>

        <div class="hero-art" aria-hidden="true">
            <div class="art-circle">🌍</div>
            <div class="art-tag">TERANGA<br>SHOP</div>
        </div>
    </section>

    <section class="section" style="padding-top: 40px;">
        <div class="eyebrow" style="text-align: center;">Nos incontournables</div>

        <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 24px; margin-top: 28px;">
            <div style="background: #fff; border: 1px solid #dde8de; border-radius: 14px; padding: 24px; box-shadow: 0 4px 20px rgba(15, 92, 63, 0.08);">
                <div style="font-size: 2.5rem; margin-bottom: 12px;">🍹</div>
                <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Boissons</h3>
                <p style="color: #5a6e65; font-size: 0.92rem;">
                    Bissap, café Touba et boissons traditionnelles, préparées avec goût.
                </p>
            </div>

            <div style="background: #fff; border: 1px solid #dde8de; border-radius: 14px; padding: 24px; box-shadow: 0 4px 20px rgba(15, 92, 63, 0.08);">
                <div style="font-size: 2.5rem; margin-bottom: 12px;">🧺</div>
                <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Artisanat</h3>
                <p style="color: #5a6e65; font-size: 0.92rem;">
                    Des créations locales confectionnées à la main par des artisans du pays.
                </p>
            </div>

            <div style="background: #fff; border: 1px solid #dde8de; border-radius: 14px; padding: 24px; box-shadow: 0 4px 20px rgba(15, 92, 63, 0.08);">
                <div style="font-size: 2.5rem; margin-bottom: 12px;">👘</div>
                <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Mode & culture</h3>
                <p style="color: #5a6e65; font-size: 0.92rem;">
                    Une sélection inspirée des traditions sénégalaises modernes et élégantes.
                </p>
            </div>
        </div>
    </section>

    <section class="promo">
        <div>
            <div class="eyebrow">Offre du moment</div>
            <h2>Profitez d’une sélection locale pensée pour votre quotidien.</h2>
        </div>

        <a href="{{ route('produits.index') }}" class="btn btn-primary">Voir le catalogue</a>
    </section>
@endsection
