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
     SECTION 1 : HERO PLEIN ÉCRAN
════════════════════════════════════════════ --}}
<section class="hero" aria-label="Présentation Factory & Co Toulouse-Blagnac">
    <div class="hero-bg" style="background-image:url('https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=1600&q=80')" aria-hidden="true"></div>
    <div class="hero-overlay" aria-hidden="true"></div>
    <div class="hero-content">
        <p class="hero-location">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            Aéroport Toulouse-Blagnac · Hall C · Portes 30–36
        </p>
        <h1 class="hero-title">
            Factory &amp; Co Toulouse-Blagnac :<br>
            Votre <em>Escale Gourmet</em><br>
            en Zone d'Embarquement
        </h1>
        <p class="hero-sub">Après la sécurité, Hall C · Proche Porte 30 · Tramway T2 Aéroport</p>
        <p class="hero-hours">Ouvert 7j/7 · 07:00 – 22:30 · Delicious since 2008</p>
        <div class="hero-ctas">
            <a href="{{ route('click-collect') }}" class="btn btn-pink">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                Commander en Click &amp; Collect
            </a>
            <a href="{{ route('menu.burgers') }}" class="btn btn-outline-white">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Consulter la Carte
            </a>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION 2 : TICKER CATÉGORIES
════════════════════════════════════════════ --}}
<div class="ticker" aria-hidden="true">
    <div class="ticker-track">
        @foreach(range(1, 2) as $_)
            <span>🍔 Smash Burgers</span>
            <span class="ticker-dot">·</span>
            <span>🥯 Bagels New-Yorkais</span>
            <span class="ticker-dot">·</span>
            <span>🍰 Cheesecake Factory</span>
            <span class="ticker-dot">·</span>
            <span>🥗 Healthy &amp; Bowls</span>
            <span class="ticker-dot">·</span>
            <span>☕ Coffee Shop</span>
            <span class="ticker-dot">·</span>
            <span>🌅 Breakfast dès 07h00</span>
            <span class="ticker-dot">·</span>
            <span>✅ Halal disponible</span>
            <span class="ticker-dot">·</span>
            <span>🌿 Options Végétariennes</span>
            <span class="ticker-dot">·</span>
            <span>📦 Click &amp; Collect</span>
            <span class="ticker-dot">·</span>
        @endforeach
    </div>
</div>

{{-- ════════════════════════════════════════════
     SECTION 3 : CONCEPT (SEO riche)
════════════════════════════════════════════ --}}
<section class="section section-light" id="concept">
    <div class="container">
        <div class="concept-grid">
            <div class="concept-text">
                <span class="section-tag">Only for New York Food Lovers</span>
                <h2 class="section-title dark">
                    Le goût de New York à Toulouse,<br>
                    du bagel matinal au burger de minuit
                </h2>
                <p>Derrière chaque assiette de Factory &amp; Co, il y a le savoir-faire de <strong>Jonathan Jablonski</strong>, chef formé à New York, qui a apporté l'ADN authentique du diner américain au cœur de l'Aéroport Toulouse-Blagnac. Ici, rien n'est surgelé, tout est préparé à la minute.</p>
                <p>Notre concept <strong>"Bakery &amp; Burger"</strong> en service continu de <strong>07h00 à 22h30</strong> répond à chaque moment de votre journée : un <em>bagel &amp; café</em> avant l'embarquement, un <em>smash burger juteux</em> à l'escale, un <em>cheesecake</em> à emporter pour la famille.</p>
                <a href="{{ route('menu.burgers') }}" class="btn btn-navy">
                    Découvrir nos spécialités
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="concept-image">
                <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=700&q=80"
                     alt="Ambiance diner américain Factory & Co Toulouse-Blagnac"
                     loading="lazy" width="700" height="500">
                <div class="concept-badge">
                    <span class="concept-badge-title">Delicious</span>
                    <span class="concept-badge-sub">since 2008</span>
                    <span class="concept-badge-detail">Fait maison · Préparé à la commande</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION 4 : SILOS PRODUITS (Vue.js)
════════════════════════════════════════════ --}}
<section class="section section-dark" id="carte">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Notre Carte</span>
            <h2 class="section-title light">Quatre univers gourmands, une seule adresse à l'Aéroport de Toulouse.</h2>
        </div>
        {{-- Composant Vue.js : données injectées depuis Blade --}}
        <product-grid
            :products="{{ json_encode($featuredProducts) }}"
            :routes="{{ json_encode([
                'burgers'    => route('menu.burgers'),
                'bagels'     => route('menu.bagels'),
                'cheesecake' => route('menu.cheesecake'),
                'bowls'      => route('menu.bowls'),
            ]) }}"
        ></product-grid>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION 5 : FOCUS CHEESECAKE
════════════════════════════════════════════ --}}
<section class="section section-pink" id="cheesecake">
    <div class="container">
        <div class="cheesecake-grid">
            <div>
                <span class="section-tag dark">Signature</span>
                <h2 class="section-title dark">Cheesecake Factory –<br>La Pâtisserie New-Yorkaise</h2>
                <p class="text-dark">Chaque cheesecake est préparé selon les recettes originales du chef <strong>Jonathan Jablonski</strong>, formé dans les meilleures pâtisseries de New York. Texture crémeuse, base biscuitée croustillante, sans gélatine.</p>
                <ul class="cheesecake-list">
                    @if(isset($featuredProducts['cheesecake']))
                        @foreach($featuredProducts['cheesecake'] as $product)
                            <li>
                                <span class="cheesecake-name">{{ $product->name }}</span>
                                <span class="cheesecake-price">{{ $product->formatted_price }}</span>
                            </li>
                        @endforeach
                    @else
                        <li><span class="cheesecake-name">New-Yorkais Classique</span><span class="cheesecake-price">6,90 €</span></li>
                        <li><span class="cheesecake-name">Oreo</span><span class="cheesecake-price">7,50 €</span></li>
                        <li><span class="cheesecake-name">Kinder Bueno</span><span class="cheesecake-price">7,50 €</span></li>
                        <li><span class="cheesecake-name">Spéculoos</span><span class="cheesecake-price">7,50 €</span></li>
                    @endif
                </ul>
                <a href="{{ route('menu.cheesecake') }}" class="btn btn-navy">
                    Voir tous les cheesecakes
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="cheesecake-image">
                <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&q=80"
                     alt="Cheesecake New-Yorkais Factory & Co Toulouse-Blagnac"
                     loading="lazy" width="600" height="450">
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION 6 : AVIS GOOGLE (Vue.js)
════════════════════════════════════════════ --}}
<section class="section section-light" id="avis">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Google Reviews &amp; TripAdvisor</span>
            <h2 class="section-title dark">Ce que disent nos voyageurs</h2>
        </div>
        <reviews-carousel
            :reviews="{{ json_encode($featuredReviews) }}"
            aggregate-rating="4.5"
            review-count="320"
        ></reviews-carousel>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION 7 : HORAIRES & LOCALISATION
════════════════════════════════════════════ --}}
<section class="section section-dark" id="horaires">
    <div class="container">
        <div class="hours-grid">
            <div>
                <span class="section-tag">Localisation &amp; Accès Hall C</span>
                <h2 class="section-title light">
                    Nous sommes situés <em>après le contrôle de sécurité</em>, dans la zone réservée Hall C
                </h2>
                <p class="text-light-muted">Accessible uniquement aux passagers munis d'une carte d'embarquement.</p>

                <div class="access-steps">
                    <div class="access-step">
                        <span class="access-step-num">1</span>
                        <div>
                            <h4>Tramway T2</h4>
                            <p>Arrêt "Aéroport" depuis le centre de Toulouse</p>
                        </div>
                    </div>
                    <div class="access-step">
                        <span class="access-step-num">2</span>
                        <div>
                            <h4>Contrôle Sécurité</h4>
                            <p>Passez la sécurité avec votre carte d'embarquement</p>
                        </div>
                    </div>
                    <div class="access-step">
                        <span class="access-step-num">3</span>
                        <div>
                            <h4>Hall C · Porte 30</h4>
                            <p>Factory &amp; Co se trouve juste après, sur votre droite</p>
                        </div>
                    </div>
                </div>

                <table class="hours-table" aria-label="Horaires d'ouverture Factory & Co Toulouse-Blagnac">
                    <thead>
                        <tr><th>Jours</th><th>Ouverture</th><th>Fermeture</th></tr>
                    </thead>
                    <tbody>
                        @foreach($openingHours as $hours)
                            <tr>
                                <td>{{ $hours->days_label }}</td>
                                <td>{{ $hours->opens_at_formatted }}</td>
                                <td>{{ $hours->closes_at_formatted }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="service-badges">
                    @foreach(['Sur place', 'À emporter', 'Click & Collect', 'Halal', 'Végétarien', 'Family Friendly', 'Accessible PMR'] as $badge)
                        <span class="service-badge">{{ $badge }}</span>
                    @endforeach
                </div>
            </div>

            <div class="map-wrap">
                <iframe
                    title="Localisation Factory & Co Toulouse-Blagnac"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2888.0!2d1.3678!3d43.6290!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aebb6e6e6e6e6e%3A0x1!2sFactory+%26+Co+A%C3%A9roport+Toulouse-Blagnac!5e0!3m2!1sfr!2sfr!4v1"
                    allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION 8 : CTA FINAL
════════════════════════════════════════════ --}}
<section class="section section-cta">
    <div class="container">
        <div class="cta-block">
            <h2>Prêt à succomber ?</h2>
            <p>Commandez en Click &amp; Collect pour récupérer votre repas sans attendre, ou installez-vous confortablement dans notre diner après la sécurité.</p>
            <div class="cta-buttons">
                <a href="{{ route('click-collect') }}" class="btn btn-navy">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    Commander en Click &amp; Collect
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline-dark">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
