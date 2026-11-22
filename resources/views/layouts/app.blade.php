<!DOCTYPE html>
{{--
  ============================================================
  TERANGA SHOP — Layout Principal (Template Mère)
  Fichier : resources/views/layouts/app.blade.php
  Auteur  : Moussavou Nelson
  Contact : moussavounelson3@gmail.com | +221 77 272 09 87

  Description :
    Ce fichier est le "squelette" HTML commun à toutes les pages.
    Chaque vue enfant l'étend avec @extends('layouts.app') et
    remplit les sections définies ici avec @section / @yield.

    Sections disponibles :
      - @yield('titre')   : titre de l'onglet du navigateur
      - @yield('contenu') : contenu principal de chaque page

    Ce layout inclut :
      - Google Fonts (police Poppins)
      - Le menu de navigation (via @include)
      - Tous les styles CSS (design TERANGA SHOP)
      - Le footer avec les coordonnées du vendeur
  ============================================================
--}}
<html lang="fr">
<head>
    {{-- Encodage UTF-8 : affiche correctement les accents et caractères spéciaux --}}
    <meta charset="UTF-8">

    {{-- Responsive : adapte la page à la taille de l'écran (mobile, tablette, PC) --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Token CSRF : sécurité Laravel contre les attaques de type "Cross-Site Request Forgery" --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Description SEO : texte affiché dans les résultats Google --}}
    <meta name="description" content="TERANGA SHOP — Boutique en ligne sénégalaise. Produits authentiques, boissons, artisanat et mode.">

    {{-- Auteur de la page --}}
    <meta name="author" content="Moussavou Nelson">

    {{--
      Titre de l'onglet :
      @yield('titre') est remplacé par le contenu de @section('titre') dans chaque vue enfant.
      Si aucun titre n'est fourni, on affiche 'Teranga Shop' par défaut.
    --}}
    <title>@yield('titre', 'Teranga Shop') | TERANGA SHOP 🛍️</title>

    {{-- Favicon : icône de l'onglet (emoji panier en SVG) --}}
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🛍️</text></svg>">

    {{-- Google Fonts : police Poppins (moderne et professionnelle) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- ========================================================
         STYLES CSS — Design System TERANGA SHOP
         Toutes les règles CSS sont écrites directement ici
         pour simplifier le déploiement (pas de fichier séparé requis).
         ======================================================== --}}
    <style>
        /* ── Variables CSS (couleurs et espacements réutilisables) ── */
        :root {
            --vert:        #1a7f5a;      /* Vert principal : identité de la marque */
            --vert-fonce:  #0f5c3f;      /* Vert foncé : survols et dégradés */
            --vert-clair:  #e8f5ef;      /* Vert très clair : fonds de sections */
            --or:          #f0c040;      /* Or : accents décoratifs */
            --encre:       #0f1f18;      /* Presque noir : texte principal */
            --discret:     #5a6e65;      /* Gris-vert : textes secondaires */
            --fond:        #f5f8f5;      /* Fond général de la page */
            --blanc:       #ffffff;      /* Blanc pur */
            --bordure:     #dde8de;      /* Bordures légères */
            --ombre:       0 4px 20px rgba(15, 92, 63, 0.1);  /* Ombre légère */
            --rayon:       10px;         /* Arrondi des coins */
            --transition:  0.25s ease;   /* Durée des animations */
        }

        /* ── Reset : supprime marges et paddings par défaut du navigateur ── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* ── Base : police, fond et couleur du texte ── */
        html { scroll-behavior: smooth; font-size: 16px; }
        body {
            font-family: 'Poppins', Arial, sans-serif; /* Police principale */
            background: var(--fond);                   /* Fond de page */
            color: var(--encre);                       /* Couleur texte */
            line-height: 1.65;                         /* Interligne pour lisibilité */
            min-height: 100vh;                         /* Hauteur minimale = écran entier */
            display: flex;
            flex-direction: column;                    /* Header en haut, footer en bas */
        }

        /* Tous les liens : pas de soulignement, couleur héritée */
        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }

        /* ── HEADER / BARRE DE NAVIGATION ── */
        .site-header {
            background: var(--blanc);
            border-bottom: 1px solid var(--bordure);
            position: sticky;      /* Reste collé en haut même en scrollant */
            top: 0;
            z-index: 100;          /* Passe au-dessus de tous les autres éléments */
            box-shadow: var(--ombre);
        }

        /* Conteneur intérieur du header */
        .header-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 5%;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        /* Logo TERANGA SHOP */
        .logo {
            font-size: 1.35rem;
            font-weight: 900;
            letter-spacing: -1px;
            color: var(--vert-fonce);
        }
        .logo span { color: var(--or); margin-left: 3px; } /* "SHOP" en or */
        .logo:hover { opacity: 0.85; }

        /* ── NAVIGATION ── */
        .navigation { display: flex; gap: 8px; align-items: center; }

        /* Liens du menu */
        .nav-link {
            font-size: 0.93rem;
            font-weight: 500;
            color: var(--discret);
            padding: 8px 14px;
            border-radius: 6px;
            transition: all var(--transition);
            position: relative;
        }
        /* Survol et lien actif */
        .nav-link:hover, .nav-link.active {
            color: var(--vert);
            background: var(--vert-clair);
            font-weight: 700;
        }

        /* Lien "Panier" mis en évidence */
        .nav-panier {
            background: var(--vert);
            color: var(--blanc) !important;
            font-weight: 700 !important;
            border-radius: 6px;
            padding: 8px 16px;
        }
        .nav-panier:hover { background: var(--vert-fonce) !important; }

        /* Bouton hamburger mobile */
        .menu-toggle {
            display: none;
            background: none;
            border: 2px solid var(--bordure);
            border-radius: 6px;
            font-size: 1.3rem;
            cursor: pointer;
            padding: 4px 10px;
            color: var(--vert-fonce);
        }

        /* ── CONTENU PRINCIPAL ── */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 5%;
            flex: 1;              /* Prend tout l'espace disponible (repousse le footer) */
            width: 100%;
        }

        /* ── BANDEAU D'EN-TÊTE DE PAGE ── */
        .page-hero {
            background: linear-gradient(130deg, var(--vert-clair) 0%, #faf6e0 100%);
            border-bottom: 1px solid var(--bordure);
            padding: 56px 5%;
            margin-bottom: 0;
        }
        .page-hero-inner { max-width: 1200px; margin: 0 auto; }
        .eyebrow { /* Petit texte en majuscules au-dessus du titre */
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 3px;
            color: var(--vert);
            text-transform: uppercase;
            margin-bottom: 12px;
        }
        .page-hero h1 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 900;
            letter-spacing: -1.5px;
            margin-bottom: 12px;
        }
        .page-hero p { font-size: 1.05rem; color: var(--discret); }

        /* ── SECTION ── */
        .section { padding: 60px 0; }

        /* ── BOUTONS ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: var(--rayon);
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 0.93rem;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all var(--transition);
        }
        .btn-primary { background: var(--vert); color: var(--blanc); }
        .btn-primary:hover { background: var(--vert-fonce); transform: translateY(-2px); box-shadow: var(--ombre); }
        .btn-secondary { background: transparent; color: var(--vert); border-color: var(--vert); }
        .btn-secondary:hover { background: var(--vert); color: var(--blanc); transform: translateY(-2px); }
        .btn-sm { padding: 8px 16px; font-size: 0.85rem; }

        /* ── TABLEAU DES PRODUITS ── */
        .table-container {
            background: var(--blanc);
            border: 1px solid var(--bordure);
            border-radius: 14px;
            overflow: hidden;             /* Coupe les coins arrondis */
            box-shadow: var(--ombre);
            margin: 32px 0;
        }
        table { width: 100%; border-collapse: collapse; } /* collapse : pas d'espace entre cellules */
        thead { background: linear-gradient(135deg, var(--vert-fonce), var(--vert)); }
        thead th {
            padding: 16px 20px;
            text-align: left;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--blanc);
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        tbody tr {
            border-bottom: 1px solid var(--bordure);
            transition: background var(--transition);
        }
        tbody tr:last-child { border-bottom: none; }     /* Pas de bordure sur la dernière ligne */
        tbody tr:hover { background: var(--vert-clair); } /* Couleur au survol de la ligne */
        td {
            padding: 18px 20px;
            font-size: 0.95rem;
            vertical-align: middle;
        }

        /* ── BADGES DE CATÉGORIE ── */
        .badge-categorie {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 50px;           /* Forme de pilule arrondie */
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        /* Couleurs différentes par catégorie */
        .badge-Boissons    { background: #d4f4e6; color: #0a6640; }
        .badge-Desserts    { background: #fde8d4; color: #8c4a00; }
        .badge-Artisanat   { background: #e8d4f4; color: #5c0a8c; }
        .badge-Épicerie    { background: #fdf4d4; color: #8c6a00; }
        .badge-Beauté      { background: #f4d4e8; color: #8c0a5c; }
        .badge-Mode        { background: #d4e4f4; color: #0a3c8c; }

        /* ── PRIX ── */
        .prix { font-weight: 800; color: var(--vert-fonce); font-size: 1rem; }
        .prix-ttc { color: var(--discret); font-size: 0.9rem; }

        /* ── FICHE PRODUIT (page show) ── */
        .produit-card {
            background: var(--blanc);
            border: 1px solid var(--bordure);
            border-radius: 14px;
            padding: 40px;
            box-shadow: var(--ombre);
            margin: 40px 0;
            display: grid;
            grid-template-columns: 1fr 2fr; /* 2 colonnes : icône | informations */
            gap: 40px;
            align-items: start;
        }
        .produit-visuel {
            height: 220px;
            background: linear-gradient(145deg, #dff0e8, #faf4de);
            border-radius: var(--rayon);
            display: grid;
            place-items: center;
            font-size: 6rem;              /* Grand emoji */
        }
        .produit-nom { font-size: 2rem; font-weight: 900; letter-spacing: -1px; margin-bottom: 12px; }
        .produit-info { display: grid; gap: 18px; margin: 24px 0; }
        .produit-info-ligne {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1rem;
            padding: 14px 18px;
            background: var(--fond);
            border-radius: 8px;
        }
        .produit-info-ligne strong { min-width: 140px; color: var(--discret); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; }

        /* ── NOTE / BLOC D'INFORMATION ── */
        .note {
            background: var(--vert-clair);
            border-left: 4px solid var(--vert);
            padding: 18px 22px;
            border-radius: 0 8px 8px 0;
            margin: 24px 0;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        /* ── ALERTES ── */
        .alerte { padding: 16px 20px; border-radius: 8px; margin: 20px 0; font-size: 0.95rem; }
        .alerte-info    { background: #dbeafe; border: 1px solid #93c5fd; color: #1e40af; }
        .alerte-succes  { background: var(--vert-clair); border: 1px solid var(--vert); color: var(--vert-fonce); }
        .alerte-vide    { background: var(--fond); border: 1px dashed var(--bordure); color: var(--discret); text-align: center; padding: 40px; border-radius: 12px; }

        /* ── GRILLE DE STATISTIQUES (page À propos) ── */
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin: 32px 0; }
        .stat-card {
            background: linear-gradient(135deg, var(--vert), var(--vert-fonce));
            color: var(--blanc);
            border-radius: var(--rayon);
            padding: 28px 20px;
            text-align: center;
        }
        .stat-nombre { font-size: 2.4rem; font-weight: 900; color: var(--or); display: block; }
        .stat-label  { font-size: 0.88rem; opacity: 0.85; margin-top: 6px; }

        /* ── GRILLE DE VALEURS ── */
        .valeurs-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin: 32px 0; }
        .valeur-card {
            background: var(--blanc);
            border: 1px solid var(--bordure);
            border-radius: var(--rayon);
            padding: 28px 22px;
            text-align: center;
            transition: all var(--transition);
        }
        .valeur-card:hover { transform: translateY(-4px); box-shadow: var(--ombre); border-color: var(--vert); }
        .valeur-icon { font-size: 2.4rem; margin-bottom: 12px; display: block; }
        .valeur-card h3 { font-size: 1rem; font-weight: 700; color: var(--vert-fonce); margin-bottom: 8px; }
        .valeur-card p  { font-size: 0.88rem; color: var(--discret); }

        /* ── PAGE CONTACT ── */
        .contact-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin: 32px 0; }
        .contact-card {
            background: var(--blanc);
            border: 1px solid var(--bordure);
            border-radius: var(--rayon);
            padding: 24px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            transition: all var(--transition);
        }
        .contact-card:hover { border-color: var(--vert); box-shadow: var(--ombre); }
        .contact-card .icon { font-size: 1.8rem; flex-shrink: 0; }
        .contact-card h4 { font-size: 0.8rem; font-weight: 700; color: var(--vert); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px; }
        .contact-card a, .contact-card p { font-size: 0.95rem; }
        .contact-card a:hover { color: var(--vert); }

        /* ── HERO SECTION (page accueil) ── */
        .hero {
            min-height: 500px;
            padding: 80px 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            background: linear-gradient(130deg, #e8f5ef 0%, #fdf8e8 100%);
            overflow: hidden;
        }
        .hero-content { max-width: 580px; }
        .hero h1 {
            font-size: clamp(2.8rem, 5vw, 4.2rem);
            font-weight: 900;
            line-height: 1.08;
            letter-spacing: -2.5px;
            margin-bottom: 20px;
        }
        .hero h1 span { color: var(--vert); }
        .hero p { color: var(--discret); font-size: 1.08rem; max-width: 460px; margin-bottom: 32px; }
        .hero-art {
            width: 320px; height: 320px;
            border-radius: 50%;
            background: linear-gradient(145deg, var(--vert), var(--vert-fonce));
            display: grid; place-items: center;
            position: relative; flex-shrink: 0;
            box-shadow: 24px 24px 0 var(--or);
        }
        .art-circle {
            width: 200px; height: 200px;
            border: 2px solid rgba(255,255,255,0.4);
            border-radius: 50%;
            display: grid; place-items: center;
            color: #fff; font-size: 4rem; font-weight: 900; letter-spacing: -5px;
        }
        .art-tag {
            position: absolute; right: -14px; bottom: 28px;
            background: var(--or); padding: 12px 18px;
            font-size: 0.75rem; font-weight: 900; line-height: 1.3;
            transform: rotate(-6deg); border-radius: 4px;
        }

        /* ── BANDEAU PROMOTIONNEL ── */
        .promo {
            background: linear-gradient(130deg, var(--vert-fonce) 0%, #082b1e 100%);
            color: var(--blanc);
            padding: 48px 5%;
            margin: 60px 0;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 32px;
        }
        .promo .eyebrow { color: var(--or); }
        .promo h2 { font-size: 1.8rem; font-weight: 800; line-height: 1.25; }

        /* ── FOOTER ── */
        .site-footer {
            background: var(--encre);
            color: rgba(255,255,255,0.75);
            padding: 36px 5%;
            margin-top: auto;        /* Colle le footer en bas */
        }
        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }
        .footer-logo { color: var(--blanc) !important; }
        .footer-links { display: flex; gap: 20px; flex-wrap: wrap; }
        .footer-links a { font-size: 0.88rem; color: rgba(255,255,255,0.65); transition: color var(--transition); }
        .footer-links a:hover { color: var(--or); }
        .footer-contact { font-size: 0.85rem; line-height: 1.8; }
        .footer-contact a { color: var(--or); }
        .footer-contact a:hover { color: var(--blanc); }
        .footer-copy {
            width: 100%; text-align: center;
            font-size: 0.8rem; color: rgba(255,255,255,0.4);
            margin-top: 16px; padding-top: 16px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        /* ── RESPONSIVE MOBILE ── */
        @media (max-width: 768px) {
            .menu-toggle { display: block; }         /* Affiche le bouton ☰ */
            .navigation  { display: none; }          /* Cache le menu */
            .navigation.open { display: flex; flex-direction: column; position: absolute; top: 72px; left: 0; right: 0; background: var(--blanc); padding: 16px 5%; border-bottom: 1px solid var(--bordure); box-shadow: var(--ombre); }
            .hero { display: block; padding: 55px 5%; text-align: center; min-height: auto; }
            .hero h1 { font-size: 2.6rem; }
            .hero p { margin: 0 auto 28px; }
            .hero-art { width: 190px; height: 190px; margin: 44px auto 0; box-shadow: 14px 14px 0 var(--or); }
            .art-circle { width: 125px; height: 125px; font-size: 3rem; }
            .produit-card { grid-template-columns: 1fr; }
            .stats-grid, .valeurs-grid, .contact-grid { grid-template-columns: 1fr; }
            .promo { display: grid; gap: 24px; text-align: center; }
            .footer-inner { flex-direction: column; align-items: center; text-align: center; }
            .footer-links { justify-content: center; }
            table { font-size: 0.85rem; }
            thead th, td { padding: 12px 14px; }
        }
    </style>
</head>

<body>

{{-- ============================================================
     EN-TÊTE (HEADER) — Inclus sur toutes les pages
     ============================================================ --}}
<header class="site-header" role="banner">
    <div class="header-inner">

        {{-- Logo : lien vers la page d'accueil --}}
        {{-- route('accueil') génère l'URL de la route nommée 'accueil' --}}
        <a class="logo" href="{{ route('accueil') }}" aria-label="TERANGA SHOP Accueil">
            TERANGA<span>SHOP</span>
        </a>

        {{-- Bouton hamburger ☰ : visible uniquement sur mobile --}}
        <button class="menu-toggle" aria-label="Ouvrir le menu" aria-expanded="false">☰</button>

        {{-- Menu de navigation : inclusion du partial --}}
        {{--
          @include charge un fichier Blade partiel (fragment réutilisable).
          Ici : resources/views/partials/menu.blade.php
          Cela évite de répéter le même code HTML dans chaque page.
        --}}
        @include('partials.menu')

    </div>
</header>
{{-- Fin du header --}}


{{-- ============================================================
     CONTENU PRINCIPAL
     @yield('contenu') sera remplacé par le contenu de chaque vue enfant.
     ============================================================ --}}
<main id="main-content" role="main">
    <div class="container">
        @yield('contenu')
    </div>
</main>
{{-- Fin du contenu principal --}}


{{-- ============================================================
     PIED DE PAGE (FOOTER) — Inclus sur toutes les pages
     Contient le logo, les liens de navigation, les coordonnées
     du vendeur et le copyright.
     ============================================================ --}}
<footer class="site-footer" role="contentinfo">
    <div class="footer-inner">

        {{-- Logo dans le footer --}}
        <a class="logo footer-logo" href="{{ route('accueil') }}">TERANGA<span>SHOP</span></a>

        {{-- Liens de navigation dans le footer --}}
        <nav class="footer-links" aria-label="Liens du footer">
            <a href="{{ route('accueil') }}">Accueil</a>
            <a href="{{ route('produits.index') }}">Produits</a>
            <a href="{{ route('a-propos') }}">À propos</a>
            <a href="{{ route('contact') }}">Contact</a>
            <a href="{{ route('panier') }}">Panier</a>
        </nav>

        {{-- Coordonnées du propriétaire de la boutique --}}
        {{-- Ces informations sont visibles sur toutes les pages --}}
        <address class="footer-contact" aria-label="Coordonnées TERANGA SHOP">
            📞 <a href="tel:+221772720987">+221 77 272 09 87</a><br>
            ✉️ <a href="mailto:moussavounelson3@gmail.com">moussavounelson3@gmail.com</a>
        </address>

        {{-- Copyright avec date dynamique --}}
        {{-- date('Y') retourne l'année courante en PHP --}}
        <p class="footer-copy">
            © {{ date('Y') }} TERANGA SHOP — Moussavou Nelson. Tous droits réservés.
        </p>

    </div>
</footer>
{{-- Fin du footer --}}


{{-- Script JavaScript pour le menu hamburger mobile --}}
<script>
    // Sélectionne le bouton ☰ et le menu de navigation
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.navigation');

    // Écoute le clic sur le bouton hamburger
    menuToggle?.addEventListener('click', () => {
        // toggle() ajoute ou retire la classe 'open' selon son état actuel
        const isOpen = navigation.classList.toggle('open');
        // Met à jour l'attribut aria-expanded pour l'accessibilité
        menuToggle.setAttribute('aria-expanded', String(isOpen));
        // Change l'icône selon l'état du menu
        menuToggle.textContent = isOpen ? '✕' : '☰';
    });
</script>

</body>
</html>
