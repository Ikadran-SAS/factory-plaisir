@extends('layouts.app')

@section('title', $seo['title'])
@section('description', $seo['description'])
@section('keywords', $seo['keywords'])
@section('canonical', $seo['canonical'])

@push('schema')
@php
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Accueil',
                'item' => route('home')
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'La Carte',
                'item' => route('menu.index')
            ]
        ]
    ];

    $webPageSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebPage',
        '@id' => route('menu.index'),
        'url' => route('menu.index'),
        'name' => 'La Carte – Factory & Co Plaisir (Yvelines 78)',
        'description' => 'Menu complet Factory & Co Plaisir : smash burgers, bagels new-yorkais, cheesecakes, bowls. Options végétariennes. Mon Grand Plaisir.',
        'isPartOf' => [
            '@type' => 'WebSite',
            '@id' => route('home')
        ],
        'breadcrumb' => [
            '@id' => '#breadcrumb'
        ]
    ];

    $menuSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Menu',
        'name' => 'La Carte – Factory & Co',
        'hasMenuSection' => [
            [
                '@type' => 'MenuSection',
                'name' => 'Burgers',
                'description' => 'Nos incontournables smash burgers avec viande Angus certifiée halal',
                'position' => 1
            ],
            [
                '@type' => 'MenuSection',
                'name' => 'Bagels',
                'description' => 'Bagels authentiques New-Yorkais, breakfast dès 8h00',
                'position' => 2
            ],
            [
                '@type' => 'MenuSection',
                'name' => 'Bowls',
                'description' => 'Bowls sains, vegan et végétariens',
                'position' => 3
            ],
            [
                '@type' => 'MenuSection',
                'name' => 'Cheesecake',
                'description' => 'Cheesecake premium signatures du chef Jonathan',
                'position' => 4
            ]
        ]
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($webPageSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($menuSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

{{-- BREADCRUMB --}}
<nav class="breadcrumb">
    <div class="breadcrumb-inner">
        <a href="{{ route('home') }}">Accueil</a>
        <span class="bc-sep">›</span>
        <span>La Carte</span>
    </div>
</nav>

{{-- ════════════════════════════════════════════
     HERO SECTION - PREMIUM LANDING WITH VIDEO
════════════════════════════════════════════ --}}
<section class="hero hero-carte">
    {{-- Video Background --}}
    <video class="hero-video" autoplay muted loop playsinline>
        <source src="{{ asset('videos/hero-carte.mp4') }}" type="video/mp4">
    </video>

    {{-- Animated Background Shapes --}}
    <div class="hero-shapes">
        <div class="shape shape-burger"></div>
        <div class="shape shape-fries"></div>
        <div class="shape shape-circle-1"></div>
        <div class="shape shape-circle-2"></div>
        <div class="shape shape-circle-3"></div>
    </div>

    {{-- Gradient Overlay --}}
    <div class="hero-overlay"></div>

    {{-- Hero Content --}}
    <div class="hero-content">
        <span class="section-tag">🍔 LA CARTE</span>
        <h1>La carte Factory &amp; Co<br>Plaisir</h1>
        <p>Smash burgers, bagels, cheesecakes &amp; bowls — préparés à la minute à Mon Grand Plaisir</p>
        <div class="hero-buttons">
            <button class="btn btn-pink scroll-to-categories" aria-label="Parcourir la carte">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
                Parcourir la carte
            </button>
            <a href="{{ asset('pdf/Carte_Classique_18AVRIL (1).pdf') }}" download class="btn btn-outline-white" aria-label="Télécharger la carte PDF">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19v-7m0 0V5m0 7H5m7 0h7"></path>
                </svg>
                Télécharger la carte
            </a>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="scroll-indicator">
        <div class="scroll-dot"></div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     STICKY CATEGORY NAVIGATION
════════════════════════════════════════════ --}}
<nav class="category-nav" id="category-nav">
    <a href="#burgers" class="category-pill" data-category="burgers">
        <span class="pill-icon">🍔</span>
        <span class="pill-label">Burgers</span>
    </a>
    <a href="#bagels" class="category-pill" data-category="bagels">
        <span class="pill-icon">🥯</span>
        <span class="pill-label">Bagels</span>
    </a>
    <a href="#bowls" class="category-pill" data-category="bowls">
        <span class="pill-icon">🥗</span>
        <span class="pill-label">Bowls</span>
    </a>
    <a href="#cheesecake" class="category-pill" data-category="cheesecake">
        <span class="pill-icon">🍰</span>
        <span class="pill-label">Cheesecake</span>
    </a>
</nav>

{{-- ════════════════════════════════════════════
     CATEGORY SECTIONS
════════════════════════════════════════════ --}}

{{-- BURGERS --}}
<section class="category-section" id="burgers">
    <div class="container">
        <div class="category-hero">
            <div class="category-badge">
                <span class="badge-icon">🍔</span>
                NYC SMASH BURGERS
            </div>
            <h2 class="category-title">L'Atelier Burger</h2>
            <p class="category-subtitle">Viande Angus Rance d'origine Irlandaise, certifiée halal, smashée à la commande</p>
            <p class="category-description">Chaque burger est une création culinaire pensée pour séduire vos papilles. Sauce secrète depuis 1989, garnitures fraîches, pain grillé à la perfection.</p>
        </div>

        <div class="items-grid">
            @forelse ($burgers as $subcategory => $items)
                @foreach ($items as $product)
                    <div class="item-card">
                        <div class="item-image" style="background-image: url('{{ asset('images/burger.webp') }}')">
                            <span class="price-badge">{{ number_format($product->price, 2, ',', '') }}€</span>
                        </div>
                        <div class="item-content">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            @empty
                <p class="text-center">Aucun burger disponible</p>
            @endforelse
        </div>
    </div>
</section>

{{-- BAGELS --}}
<section class="category-section category-section-alt" id="bagels">
    <div class="container">
        <div class="category-hero">
            <div class="category-badge">
                <span class="badge-icon">🥯</span>
                BAGELS NEW-YORKAIS
            </div>
            <h2 class="category-title">Breakfast Américain</h2>
            <p class="category-subtitle">Dès 8h00 - Recette authentique à farine canadienne</p>
            <p class="category-description">Nos bagels sont préparés en-house avec la farine canadienne traditionnelle. Chauds, froids, à composer selon vos envies.</p>
        </div>

        <div class="items-grid">
            @forelse ($bagels as $subcategory => $items)
                @foreach ($items as $product)
                    <div class="item-card">
                        <div class="item-image" style="background-image: url('{{ asset('images/recettes.webp') }}')">
                            <span class="price-badge">{{ number_format($product->price, 2, ',', '') }}€</span>
                        </div>
                        <div class="item-content">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            @empty
                <p class="text-center">Aucun bagel disponible</p>
            @endforelse
        </div>
    </div>
</section>

{{-- BOWLS --}}
<section class="category-section" id="bowls">
    <div class="container">
        <div class="category-hero">
            <div class="category-badge">
                <span class="badge-icon">🥗</span>
                SUPER BOWLS SAINS
            </div>
            <h2 class="category-title">Healthy & Bien-être</h2>
            <p class="category-subtitle">Vegan, Végétarien, et délicieux</p>
            <p class="category-description">Manger sain sans compromis sur le goût. Nos bowls sont composés avec des ingrédients frais, biologiques quand possible.</p>
        </div>

        <div class="items-grid">
            @forelse ($bowls as $subcategory => $items)
                @foreach ($items as $product)
                    <div class="item-card">
                        <div class="item-image" style="background-image: url('{{ asset('images/boissons.webp') }}')">
                            <span class="price-badge">{{ number_format($product->price, 2, ',', '') }}€</span>
                        </div>
                        <div class="item-content">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            @empty
                <p class="text-center">Aucun bowl disponible</p>
            @endforelse
        </div>
    </div>
</section>

{{-- CHEESECAKE --}}
<section class="category-section category-section-alt" id="cheesecake">
    <div class="container">
        <div class="category-hero">
            <div class="category-badge">
                <span class="badge-icon">🍰</span>
                CHEESECAKE FACTORY
            </div>
            <h2 class="category-title">Pâtisseries Premium</h2>
            <p class="category-subtitle">Recettes authentiques du Chef Jonathan</p>
            <p class="category-description">Le vrai New York cheesecake préparé selon les traditions. Textures parfaites, saveurs authentiques, portions généreuses.</p>
        </div>

        <div class="items-grid">
            @forelse ($cheesecakes as $subcategory => $items)
                @foreach ($items as $product)
                    <div class="item-card">
                        <div class="item-image" style="background-image: url('{{ asset('images/desserts.webp') }}')">
                            <span class="price-badge">{{ number_format($product->price, 2, ',', '') }}€</span>
                        </div>
                        <div class="item-content">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            @empty
                <p class="text-center">Aucun cheesecake disponible</p>
            @endforelse
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     LOCALISATION - GOOGLE MAPS
════════════════════════════════════════════ --}}
<section class="section location-section">
    <div class="location-info">
        <h2>Prêt à déguster ?</h2>
        <p class="location-subtitle">Venez nous retrouver au cœur de Mon Grand Plaisir</p>
        <address class="location-address">
            1170 Av. de Saint-Germain<br>
            CC Mon Grand Plaisir<br>
            78370 Plaisir, France
        </address>
    </div>
    <div class="location-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2630.0!2d1.9480!3d48.8225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2s1170+Av+de+Saint-Germain+78370+Plaisir!5e0!3m2!1sfr!2sfr!4v1" width="100%" height="400" style="border:0;border-radius:1.5rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION AVIS
════════════════════════════════════════════ --}}
<section class="section reviews-section">
    <div class="container">
        <div class="reviews-header">
            <h2>Ce que nos clients aiment 💬</h2>
            <a href="{{ route('avis') }}" class="btn btn-outline-pink">Voir tous les avis</a>
        </div>
        <div class="reviews-grid">
            <div class="review-card">
                <div class="review-stars">⭐⭐⭐⭐⭐</div>
                <p class="review-text">"Les meilleurs burgers de Plaisir ! Qualité au rendez-vous et équipe très sympa."</p>
                <p class="review-author">— Sarah M.</p>
            </div>
            <div class="review-card">
                <div class="review-stars">⭐⭐⭐⭐⭐</div>
                <p class="review-text">"Cadre moderne, burgers savoureux et service rapide. Je recommande vivement !"</p>
                <p class="review-author">— Thomas D.</p>
            </div>
            <div class="review-card">
                <div class="review-stars">⭐⭐⭐⭐⭐</div>
                <p class="review-text">"Les cheesecakes sont divins et les options halal/végétariennes sont très variées."</p>
                <p class="review-author">— Fatima K.</p>
            </div>
        </div>
    </div>
</section>

{{-- JavaScript for Animations & Interactions --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Scroll to categories button
    const scrollBtn = document.querySelector('.scroll-to-categories');
    if (scrollBtn) {
        scrollBtn.addEventListener('click', function() {
            const nav = document.getElementById('category-nav');
            if (nav) {
                nav.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // Category pill active state on scroll
    const categoryPills = document.querySelectorAll('.category-pill');
    const categorySections = document.querySelectorAll('.category-section');

    function updateActiveCategory() {
        let current = '';
        categorySections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (window.pageYOffset >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });

        categoryPills.forEach(pill => {
            pill.classList.remove('active');
            if (pill.getAttribute('data-category') === current) {
                pill.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', updateActiveCategory);

    // Smooth scroll for category pills
    categoryPills.forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-category');
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});
</script>

@endsection
