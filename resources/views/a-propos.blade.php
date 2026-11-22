@extends('layouts.app')

@section('titre', 'À propos')

@section('contenu')
    <section class="page-hero">
        <div class="page-hero-inner">
            <div class="eyebrow">TERANGA SHOP</div>
            <h1>Une boutique venue du cœur du Sénégal.</h1>
            <p>Nous proposons des produits authentiques, issus de la tradition et de l’artisanat local.</p>
        </div>
    </section>

    <section class="section">
        <div style="display: grid; grid-template-columns: 1.3fr 1fr; gap: 28px; align-items: center;">
            <div>
                <h2 style="font-size: clamp(1.8rem, 3vw, 2.5rem); margin-bottom: 16px;">Une marque inspirée par la culture et la qualité.</h2>
                <p style="color: #5a6e65; margin-bottom: 14px;">
                    TERANGA SHOP a été créé pour rendre accessibles les produits authentiques du Sénégal,
                    en mettant en avant les savoir-faire, les saveurs et les traditions locales.
                </p>
                <p style="color: #5a6e65;">
                    Notre mission est simple : valoriser les produits du terroir tout en faisant vivre les artisans,
                    les producteurs et les créateurs de notre pays.
                </p>
            </div>

            <div style="background: linear-gradient(135deg, #e8f5ef, #fdf8e8); border: 1px solid #dde8de; border-radius: 14px; padding: 28px;">
                <div class="eyebrow" style="margin-bottom: 10px;">Notre engagement</div>
                <p style="font-size: 1rem; color: #0f1f18; line-height: 1.8;">
                    Produits sélectionnés avec soin, prix justes, accompagnement humain et respect des valeurs locales.
                </p>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-nombre">8</span>
                <div class="stat-label">Produits de sélection</div>
            </div>
            <div class="stat-card">
                <span class="stat-nombre">100%</span>
                <div class="stat-label">Origine locale</div>
            </div>
            <div class="stat-card">
                <span class="stat-nombre">24/7</span>
                <div class="stat-label">Service client</div>
            </div>
        </div>

        <div class="valeurs-grid">
            <div class="valeur-card">
                <span class="valeur-icon">🌱</span>
                <h3>Authenticité</h3>
                <p>Des produits inspirés des traditions et de la culture sénégalaise.</p>
            </div>

            <div class="valeur-card">
                <span class="valeur-icon">🤝</span>
                <h3>Confiance</h3>
                <p>Un échange simple, transparent et respectueux avec nos clients.</p>
            </div>

            <div class="valeur-card">
                <span class="valeur-icon">✨</span>
                <h3>Qualité</h3>
                <p>Une sélection rigoureuse pour garantir satisfaction et authenticité.</p>
            </div>
        </div>
    </section>
@endsection
