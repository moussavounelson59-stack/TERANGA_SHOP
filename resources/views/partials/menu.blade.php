{{--
  ============================================================
  TERANGA SHOP — Partiel Menu de Navigation
  Fichier : resources/views/partials/menu.blade.php
  Auteur  : Moussavou Nelson

  Description :
    Ce fichier contient uniquement le menu <nav>.
    Il est inclus dans le layout principal via @include('partials.menu').
    Avantage : si on modifie le menu, cela se répercute sur TOUTES
    les pages automatiquement (principe DRY = Don't Repeat Yourself).

    Fonctionnalité "lien actif" :
    La directive Blade @if(request()->routeIs('nom.route'))
    ajoute la classe CSS 'active' sur le lien de la page courante,
    ce qui le met en surbrillance dans le menu.
  ============================================================
--}}

{{-- Élément <nav> : balise HTML sémantique pour la navigation --}}
<nav class="navigation" id="main-nav" role="navigation" aria-label="Navigation principale">

    {{--
      Lien "Accueil" — Route nommée 'accueil'
      request()->routeIs('accueil') retourne true si on est sur la page d'accueil.
      L'opérateur ternaire Blade ajoute 'active' si c'est la page courante.
    --}}
    <a href="{{ route('accueil') }}"
       class="nav-link {{ request()->routeIs('accueil') ? 'active' : '' }}"
       {{ request()->routeIs('accueil') ? 'aria-current=page' : '' }}>
        🏠 Accueil
    </a>

    {{--
      Lien "Produits" — Route nommée 'produits.index'
      request()->routeIs('produits.*') : le wildcard * détecte TOUTES les routes
      commençant par 'produits.' (ex: produits.index ET produits.show).
      Ainsi, le lien reste en surbrillance aussi bien sur la liste que sur une fiche.
    --}}
    <a href="{{ route('produits.index') }}"
       class="nav-link {{ request()->routeIs('produits.*') ? 'active' : '' }}"
       {{ request()->routeIs('produits.*') ? 'aria-current=page' : '' }}>
        🛍️ Produits
    </a>

    {{--
      Lien "À propos" — Route nommée 'a-propos'
    --}}
    <a href="{{ route('a-propos') }}"
       class="nav-link {{ request()->routeIs('a-propos') ? 'active' : '' }}"
       {{ request()->routeIs('a-propos') ? 'aria-current=page' : '' }}>
        ℹ️ À propos
    </a>

    {{--
      Lien "Contact" — Route nommée 'contact'
    --}}
    <a href="{{ route('contact') }}"
       class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
       {{ request()->routeIs('contact') ? 'aria-current=page' : '' }}>
        📞 Contact
    </a>

    {{--
      Lien "Panier" — Mis en évidence avec un style différent (fond vert)
      La classe 'nav-panier' lui donne un look de bouton CTA (Call To Action).
    --}}
    <a href="{{ route('panier') }}"
       class="nav-link nav-panier"
       aria-label="Mon panier">
        🛒 Panier
    </a>

</nav>
{{-- Fin du menu de navigation --}}
