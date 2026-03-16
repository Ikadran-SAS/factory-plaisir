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
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')

{{-- ════════════════════════════════════════════
     HERO SECTION - PLEIN ÉCRAN
════════════════════════════════════════════ --}}
<section class="hero" aria-label="Factory & Co Val d'Europe">
    <div class="hero-bg" style="background-image:url('{{ asset('images/factory-val.webp') }}')" aria-hidden="true"></div>
    <div class="hero-overlay" aria-hidden="true"></div>
    <div class="hero-content">
        <p class="hero-location">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            CC Val d'Europe · 14 Rue du Danube · Serris
        </p>
        <h1 class="hero-title">
            Factory &amp; Co<br>
            Val d'Europe :<br>
            L'<em>Authentique Diner</em> Américain
        </h1>
        <p class="hero-sub">Smash Burgers · Bagels New-Yorkais · Cheesecake Factory · Healthy Bowls</p>
        <p class="hero-hours">Ouvert 7j/7 · 07:00 – 22:30 · Delicious since 2008</p>
        <div class="hero-ctas">
            <a href="javascript:void(0)" onclick="window.factoryCoNav && window.factoryCoNav.openNavigationModal()" class="btn btn-pink">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                Venir chez nous
            </a>
            <a href="{{ route('menu.burgers') }}" class="btn btn-outline-white">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Découvrir la carte
            </a>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : STATISTIQUES
════════════════════════════════════════════ --}}
<section class="section section-dark stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">2008</div>
                <div class="stat-label">Année de création</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Préparé à la minute</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">4.5★</div>
                <div class="stat-label">Note Google</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">320+</div>
                <div class="stat-label">Avis clients</div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : LA PHILOSOPHIE
════════════════════════════════════════════ --}}
<section class="section section-light">
    <div class="container">
        <div class="concept-grid">
            <div class="concept-text">
                <span class="section-tag">La liberté de la gastronomie</span>
                <h2 class="section-title dark">
                    Une escale gourmande<br>
                    Authentiquement américaine
                </h2>
                <p>Factory &amp; Co, c'est l'histoire d'une passion : celle du chef <strong>Jonathan Jablonski</strong>, formé aux côtés des plus grands cuisiniers de <strong>Brooklyn</strong>. En 2008, il a décidé de transporter l'âme authentique des diners new-yorkais au cœur du centre commercial Val d'Europe.</p>
                <p>Chez nous, <strong>rien n'est surgelé, tout est préparé à la minute</strong>. Chaque burger est smashé sur plaque brûlante. Chaque bagel est frais du jour. Chaque cheesecake respire les meilleures traditions new-yorkaises.</p>
                <p><strong>Factory &amp; Co, c'est la liberté de bien manger, sans compromis.</strong></p>
                <a href="{{ route('menu.burgers') }}" class="btn btn-navy">
                    Explorer notre concept
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="concept-image">
                <img src="{{ asset('images/factory-val-interieur.webp') }}"
                     alt="Ambiance diner américain Factory & Co Val d'Europe"
                     loading="lazy" width="700" height="500">
                <div class="concept-badge">
                    <span class="concept-badge-title">Delicious</span>
                    <span class="concept-badge-sub">since 2008</span>
                    <span class="concept-badge-detail">Fait maison · À la commande</span>
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
            <h2 class="section-title light">Le meilleur de Factory &amp; Co Val d'Europe</h2>
        </div>

        {{-- Affichage des produits en slider --}}
        <div class="products-slider-wrapper">
            @php
                $allProducts = collect($featuredProducts)->flatten(1);
            @endphp
            <div class="products-slider">
                @foreach($allProducts as $product)
                    <div class="product-slide">
                        @if($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-img">
                        @endif
                        <h4>{{ $product->name }}</h4>
                        <p class="product-desc">{{ $product->description }}</p>
                        <div class="product-price">{{ $product->price }}€</div>
                    </div>
                @endforeach
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
            <h2 class="section-title light">Pourquoi ils nous<br><em>ont choisi</em></h2>
            <div class="reviews-rating">
                <div class="reviews-stars">★★★★★</div>
                <div class="reviews-score">4.8 <span>/5 · +200 avis Google</span></div>
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
                            <h4>{{ $review->author_name }}</h4>
                            <p class="review-time">il y a quelques jours</p>
                        </div>
                        <svg class="google-logo-clean" viewBox="0 0 24 24" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path></svg>
                    </div>
                    <div class="review-stars-clean">
                        @for ($i = 0; $i < 5; $i++)
                            <span>★</span>
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
            <h2 class="section-title dark">Au cœur de Val d'Europe</h2>
        </div>

        <div class="location-grid">
            <div class="location-info">
                <div class="info-card info-address">
                    <div class="info-icon">📍</div>
                    <div class="info-content">
                        <h3>Nous trouver</h3>
                        <p class="info-main">14 Rue du Danube</p>
                        <p class="info-sub">CC Val d'Europe • 77700 Serris</p>
                    </div>
                </div>

                <div class="info-card info-hours">
                    <div class="info-icon">🕐</div>
                    <div class="info-content">
                        <h3>Horaires d'ouverture</h3>
                        <div class="hours-grid">
                            @foreach($openingHours as $hours)
                                <div class="hour-item">
                                    <span class="day-label">{{ $hours->days_label }}</span>
                                    <span class="day-hours">{{ $hours->opens_at_formatted }} – {{ $hours->closes_at_formatted }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="info-card info-access">
                    <div class="info-icon">🚗</div>
                    <div class="info-content">
                        <h3>Accès & Transport</h3>
                        <ul class="access-list">
                            <li><strong>🅿️ Parking gratuit</strong> du centre commercial</li>
                            <li><strong>🚆 RER E</strong> Gare du Val d'Europe</li>
                            <li><strong>✨ À 15 min</strong> de Disneyland Paris</li>
                        </ul>
                    </div>
                </div>

                <div class="services-showcase">
                    <p class="services-title">Nos Services</p>
                    <div class="services-grid">
                        @foreach(['Sur place', 'À emporter', 'Click & Collect', 'Halal', 'Végétarien', 'Family Friendly', 'Accessible PMR'] as $badge)
                            <span class="service-tag">{{ $badge }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="map-wrap">
                <iframe
                    title="Localisation Factory & Co Val d'Europe"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622.0!2d2.7758!3d48.8753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e614d4c8c8c8c8%3A0x1!2sFactory+%26+Co+Val+d%27Europe!5e0!3m2!1sfr!2sfr!4v1"
                    allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : CTA COMMANDER
════════════════════════════════════════════ --}}
<section class="section section-cta-large">
    <div class="container">
        <div class="cta-large-content">
            <img src="{{ asset('images/ashley.webp') }}" alt="Commander chez Factory & Co" class="cta-image">
            <div class="cta-text">
                <h2>Commander pour plus tard</h2>
                <p>Anticipez votre visite ! Commandez en ligne et récupérez votre repas au moment choisi. Parfait pour les visiteurs pressés ou ceux qui veulent optimiser leur temps au centre commercial.</p>
                <a href="{{ route('click-collect') }}" class="btn btn-pink">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    Commander maintenant
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
            <a href="{{ route('contact') }}" class="btn btn-outline-navy">Nous contacter</a>
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
            <p>Recevez nos bons plans, nouveaux menus et actualités Factory &amp; Co en avant-première.</p>
            <form class="newsletter-form" method="POST" action="#">
                @csrf
                <input type="email" placeholder="votre@email.com" required>
                <button type="submit" class="btn btn-pink">S'abonner</button>
            </form>
        </div>
    </div>
</section>

@endsection
