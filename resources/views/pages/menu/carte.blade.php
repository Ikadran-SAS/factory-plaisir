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
    <div class="location-info text-center">
        <h2>Prêt à déguster ?</h2>
        <p class="location-subtitle">Venez nous retrouver au cœur de Mon Grand Plaisir</p>
        <address class="location-address">
            1170 Av. de Saint-Germain — CC Mon Grand Plaisir — 78370 Plaisir, France
        </address>
    </div>
    <div class="location-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2630.0!2d1.9480!3d48.8225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2s1170+Av+de+Saint-Germain+78370+Plaisir!5e0!3m2!1sfr!2sfr!4v1" width="100%" height="400" style="border:0;border-radius:1.5rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION AVIS
════════════════════════════════════════════ --}}
<section class="section section-dark" id="avis">
    <div class="container">
        <div class="reviews-header-section">
            <h2 class="section-title light">Ce que nos clients<br><em>aiment</em></h2>
            <div class="reviews-rating">
                <div class="reviews-stars">@for($i = 1; $i <= 5; $i++)★@endfor</div>
                <div class="reviews-score">{{ number_format($averageRating, 1, ',', '') }} <span>/5 · {{ $totalReviews }} avis Google</span></div>
            </div>
        </div>

        <div class="reviews-grid-clean">
            @foreach($featuredReviews as $review)
                <div class="review-card-clean">
                    <div class="review-card-header-clean">
                        <div class="review-avatar-clean">
                            {{ strtoupper(substr($review->author_name, 0, 1)) }}{{ strtoupper(substr(explode(' ', $review->author_name)[count(explode(' ', $review->author_name))-1], 0, 1)) }}
                        </div>
                        <div class="review-info-clean">
                            <h3>{{ $review->author_name }}</h3>
                            <p class="review-time">{{ $review->date_label }}</p>
                        </div>
                        <svg class="google-logo-clean" viewBox="0 0 24 24" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path></svg>
                    </div>
                    <div class="review-stars-clean">
                        @for ($i = 1; $i <= 5; $i++)
                            <span>@if($i <= $review->rating)★@else☆@endif</span>
                        @endfor
                    </div>
                    <p class="review-text-clean">{{ $review->content }}</p>
                </div>
            @endforeach
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
