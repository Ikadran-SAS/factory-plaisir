{{-- ── NAVBAR PRINCIPALE ── --}}
<header class="navbar-modern" x-data="{ mobileOpen: false, dropdownOpen: false }">
    <div class="navbar-container">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="navbar-logo">
            <img src="{{ asset('images/logo-fact.svg') }}" alt="Factory & Co" height="32" width="auto">
        </a>

        {{-- Navigation desktop --}}
        <nav class="navbar-menu">
            <a href="{{ route('home') }}" @class(['navbar-link', 'navbar-link-active' => request()->routeIs('home')])>
                Accueil
            </a>
            <a href="{{ route('menu.burgers') }}" @class(['navbar-link', 'navbar-link-active' => request()->routeIs('menu.*')])>
                La carte
            </a>
            <a href="{{ route('home') }}#concept" class="navbar-link">
                Notre concept
            </a>
            <a href="{{ route('home') }}#specialites" class="navbar-link">
                Nos spécialités
            </a>
            <a href="{{ route('home') }}#avis" class="navbar-link">
                Avis
            </a>
            <a href="{{ route('blog.index') }}" @class(['navbar-link', 'navbar-link-active' => request()->routeIs('blog.*')])>
                Le blog
            </a>
        </nav>

        {{-- Right side CTA --}}
        <div class="navbar-actions">
            <a href="{{ route('home') }}#horaires" class="navbar-cta">
                Venir chez nous
            </a>
            <button class="navbar-toggle" @click="mobileOpen = !mobileOpen" type="button" aria-label="Menu">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Divider --}}
    <div class="navbar-divider"></div>

    {{-- Menu mobile --}}
    <nav class="navbar-mobile" x-show="mobileOpen" x-transition>
        <a href="{{ route('home') }}" @class(['navbar-mobile-link', 'active' => request()->routeIs('home')])>Accueil</a>
        <a href="{{ route('menu.burgers') }}" @class(['navbar-mobile-link', 'active' => request()->routeIs('menu.*')])>La carte</a>
        <a href="{{ route('home') }}#concept" class="navbar-mobile-link">Notre concept</a>
        <a href="{{ route('home') }}#specialites" class="navbar-mobile-link">Nos spécialités</a>
        <a href="{{ route('home') }}#avis" class="navbar-mobile-link">Avis</a>
        <a href="{{ route('blog.index') }}" @class(['navbar-mobile-link', 'active' => request()->routeIs('blog.*')])>Le blog</a>
    </nav>
</header>
