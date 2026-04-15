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
            ]
        ]
    ];

    $faqMainEntity = [];
    foreach ($faqs as $faq) {
        $faqMainEntity[] = [
            '@type' => 'Question',
            'name' => $faq->question,
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => strip_tags($faq->answer)
            ]
        ];
    }

    $faqPageSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $faqMainEntity
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($faqPageSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

{{-- ════════════════════════════════════════════
     HERO SECTION - PLEIN ÉCRAN
════════════════════════════════════════════ --}}
<section class="hero" aria-label="Factory & Co Plaisir">
    <div class="hero-bg" style="background-image:url('{{ asset('restaurant/plaisir/img_0246-2.jpg') }}')" aria-hidden="true"></div>
    <div class="hero-overlay" aria-hidden="true"></div>
    <div class="hero-content">
        <p class="hero-location">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            CC Mon Grand Plaisir · 1170 Av. de Saint-Germain · Plaisir
        </p>
        <h1 class="hero-title">Factory &amp; Co Plaisir : <em>votre pause new-yorkaise aux Yvelines</em></h1>
        <p class="hero-sub">Terrasse, smash burgers &amp; cheesecakes artisanaux</p>
        <p class="hero-hours">Lun-Jeu, Dim: 8h - 21h30 · Ven-Sam: 8h - 23h · Delicious since 1989</p>
        <div class="hero-ctas">
            <a href="javascript:void(0)" onclick="window.factoryCoNav && window.factoryCoNav.openNavigationModal()" class="btn btn-pink">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                Venir chez nous
            </a>
            <a href="https://www.ubereats.com/fr" target="_blank" rel="noopener" class="btn btn-pink">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                Se faire livrer
            </a>
        </div>
        <div class="hero-ctas-secondary">
            <a href="{{ route('menu.index') }}" class="hero-badge-link">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Découvrir la carte
            </a>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : STATISTIQUES
════════════════════════════════════════════ --}}
<section class="section section-dark stats-section">
    <div class="stats-grid">
        <div class="stat-item">
            <div class="stat-number">2024</div>
            <div class="stat-label">Ouverture Plaisir</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">100%</div>
            <div class="stat-label">Frais, 100% savoureux</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">{{ number_format($averageRating, 1, ',', '') }}★</div>
            <div class="stat-label">Note Google</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">{{ number_format($totalReviews, 0, ',', ' ') }}+</div>
            <div class="stat-label">Avis Google</div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : LA PHILOSOPHIE
════════════════════════════════════════════ --}}
<section class="section section-light section-philosophy">
    <div class="container">
        <div class="concept-grid">
            <div class="concept-text">
                <span class="section-tag">Un goût de New York aux Yvelines</span>
                <h2 class="section-title dark">
                    Votre nouvelle adresse<br>
                    gourmande à Plaisir
                </h2>

                <p>Aux portes de la N12, au sein du centre commercial <strong>Mon Grand Plaisir</strong>, Factory &amp; Co pose ses valises dans les Yvelines. Jonathan Jablonski, fondateur originaire du <strong>New Jersey</strong>, y déploie depuis 2009 ses recettes authentiques certifiées <strong>halal</strong>.</p>
                <p>Chaque burger est smashé devant vous, chaque bagel livré frais chaque matin, chaque cheesecake coulé selon la recette originale new-yorkaise. <strong>Rien n'est réchauffé, tout est préparé à la commande</strong> — c'est notre promesse depuis le premier jour.</p>
                <p><strong>Profitez de notre terrasse ombragée, du Wi-Fi gratuit et du parking à deux pas.</strong> Une parenthèse gourmande à quelques minutes du Transilien Plaisir-Grignon.</p>
                <a href="{{ route('concept') }}" class="btn btn-pink">
                    Découvrir notre concept
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="concept-image">
                <img src="{{ asset('restaurant/plaisir/whatsapp-image-2021-12-07-at-21-45-21-4-.jpg') }}"
                     alt="Intérieur du restaurant Factory & Co Plaisir Yvelines - terrasse et ambiance diner"
                     loading="lazy" width="700" height="500">
                <div class="concept-badge">
                    <span class="concept-badge-title">New York</span>
                    <span class="concept-badge-sub">spirit</span>
                    <span class="concept-badge-detail">Frais & authentique</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : GALERIE PRODUITS PREMIUM
════════════════════════════════════════════ --}}
<section class="section section-dark" id="carte">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">Galerie</span>
            <h2 class="section-title light">Le meilleur de Factory &amp; Co Plaisir</h2>
        </div>

        {{-- Slider d'images produits --}}
        <div class="products-slider-wrapper">
            <div class="products-slider">
                <div class="product-item-slide">
                    <img src="{{ asset('menu/SAL%C3%89/BURGER/Smash%20Burgers/Monster/DSC03550.jpg') }}" alt="Smash Burgers préparés à la minute au restaurant Factory & Co Plaisir" loading="lazy">
                    <figcaption>Smash Burgers</figcaption>
                </div>
                <div class="product-item-slide">
                    <img src="{{ asset('menu/SUCR%C3%89/CHEESECAKE/Factory_Claye%204.JPG') }}" alt="New York Cheesecake signature Factory & Co Plaisir" loading="lazy">
                    <figcaption>Cheesecake</figcaption>
                </div>
                <div class="product-item-slide">
                    <img src="{{ asset('menu/SUCR%C3%89/BREAKFAST/DSC01073.jpg') }}" alt="Petit-déjeuner américain chez Factory & Co Plaisir" loading="lazy">
                    <figcaption>Breakfast</figcaption>
                </div>
                <div class="product-item-slide">
                    <img src="{{ asset('menu/SAL%C3%89/BAGELS/DSC00828.jpg') }}" alt="Bagels New-Yorkais frais de Factory & Co Plaisir" loading="lazy">
                    <figcaption>Bagels</figcaption>
                </div>
                <div class="product-item-slide">
                    <img src="{{ asset('menu/BOISSONS/MILKSHAKE/DSC01354.jpg') }}" alt="Milkshakes artisanaux Factory & Co Plaisir" loading="lazy">
                    <figcaption>Milkshakes</figcaption>
                </div>
                <div class="product-item-slide">
                    <img src="{{ asset('menu/BOISSONS/SMOOTHIE/Ban_a%20Manga%202.jpg') }}" alt="Smoothies frais Factory & Co Plaisir" loading="lazy">
                    <figcaption>Smoothie</figcaption>
                </div>
                <div class="product-item-slide">
                    <img src="{{ asset('menu/SAL%C3%89/BOWLS/DSC00510.jpg') }}" alt="Bowl salade chez Factory & Co Plaisir" loading="lazy">
                    <figcaption>Bowl</figcaption>
                </div>
                <div class="product-item-slide">
                    <img src="{{ asset('menu/BOISSONS/COFFESHOP/DSC09733%20(Caf%C3%A9%203).jpg') }}" alt="Coffeeshop Factory & Co Plaisir, cafés signature" loading="lazy">
                    <figcaption>Coffeeshop</figcaption>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : AVIS CLIENTS
════════════════════════════════════════════ --}}
<section class="section section-dark" id="avis">
    <div class="container">
        <div class="reviews-header-section">
            <h2 class="section-title light">Ce qu'ils en<br><em>disent</em></h2>
            <div class="reviews-rating">
                <div class="reviews-stars">@for($i = 1; $i <= 5; $i++)★@endfor</div>
                <div class="reviews-score">{{ number_format($averageRating, 1, ',', '') }} <span>/5 · {{ $totalReviews }} avis Google</span></div>
            </div>
        </div>

        {{-- Affichage des avis épurés --}}
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

{{-- ════════════════════════════════════════════
     SECTION : LOCALISATION
════════════════════════════════════════════ --}}
<section class="section section-light" id="horaires">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">Nous visiter</span>
            <h2 class="section-title dark">Au cœur de Mon Grand Plaisir</h2>
        </div>

        <div class="location-info-compact">
            <div class="location-block">
                <strong>1170 Av. de Saint-Germain, 78370 Plaisir</strong>
                <p>Parking gratuit • Terrasse • Wi-Fi</p>
            </div>
            <div class="location-block">
                <strong>Horaires</strong>
                <ul>
                    @foreach($openingHours as $hours)
                        <li>{{ $hours->days_label }}: {{ $hours->opens_at_formatted }} – {{ $hours->closes_at_formatted }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="map-wrap">
            <iframe
                title="Localisation Factory & Co Plaisir"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2630.0!2d1.9480!3d48.8225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2s1170+Av+de+Saint-Germain+78370+Plaisir!5e0!3m2!1sfr!2sfr!4v1"
                allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : CTA COMMANDER
════════════════════════════════════════════ --}}
<section class="section section-cta-large">
    <div class="container">
        <div class="cta-large-content">
            <img src="{{ asset('restaurant/plaisir/img_0246-2.jpg') }}" alt="Factory & Co Plaisir - à emporter ou en terrasse" class="cta-image">
            <div class="cta-text">
                <h2>À emporter ou en terrasse</h2>
                <p>Entre deux enseignes de Mon Grand Plaisir ou en route sur la N12, arrêtez-vous le temps d'un vrai repas. Commandez au comptoir, installez-vous en terrasse avec vue sur les Yvelines ou repartez avec votre menu — toujours préparé à la commande, toujours généreux.</p>
                <a href="{{ route('menu.index') }}" class="btn btn-pink">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    Voir la carte
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : FAQ
════════════════════════════════════════════ --}}
<section class="section section-light" id="faq">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-tag">Questions ?</span>
            <h2 class="section-title dark">Questions fréquentes</h2>
        </div>
        {{-- Accordéon FAQs avec Vue --}}
        <div id="faq-accordion-app" data-faqs="{{ base64_encode(json_encode($faqs)) }}"></div>
        <div class="faq-cta text-center">
            <p>Vous avez d'autres questions ?</p>
            <a href="{{ route('contact') }}" class="btn btn-outline-pink">Nous contacter</a>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : NEWSLETTER
════════════════════════════════════════════ --}}
<section class="section section-dark newsletter-section">
    <div class="container">
        <div class="newsletter-content">
            <h2>Restez connecté</h2>
            <p>Offres exclusives, nouveautés à la carte et événements à Plaisir : inscrivez-vous pour ne rien manquer.</p>
            <form class="newsletter-form" method="POST" action="#">
                @csrf
                <input type="email" placeholder="votre@email.com" required>
                <button type="submit" class="btn btn-pink">S'abonner</button>
            </form>
        </div>
    </div>
</section>

@endsection
