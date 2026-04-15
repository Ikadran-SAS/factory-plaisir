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
                'name' => 'Notre concept',
                'item' => route('concept')
            ]
        ]
    ];

    $webPageSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebPage',
        '@id' => route('concept') . '#webpage',
        'url' => route('concept'),
        'name' => 'Notre Concept – Factory & Co Plaisir',
        'description' => 'Découvrez l\'univers de Factory & Co : une philosophie basée sur l\'authenticité, la passion et le savoir-faire artisanal.',
        'isPartOf' => [
            '@id' => route('home') . '#website'
        ],
        'inLanguage' => 'fr-FR',
        'breadcrumb' => [
            '@id' => route('concept') . '#breadcrumb'
        ]
    ];

    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => [
            [
                '@type' => 'Question',
                'name' => 'Quel est le concept de Factory & Co ?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Factory & Co propose une expérience de cuisine gourmande et qualitative, inspirée des diners new-yorkais, avec burgers smashés, bagels frais et desserts artisanaux. Nous alions rapidité et qualité premium.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Depuis quand existe Factory & Co ?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Factory & Co a été créé en 2009. "Since 1989" est notre tagline, un clin d'œil à l'inspiration new-yorkaise du fondateur. Nous sommes implantés à Plaisir, au cœur du centre commercial Mon Grand Plaisir.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Quels sont les horaires d\'ouverture ?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Nous sommes ouverts 7 jours sur 7. Lun-Mar-Mer-Jeu-Dim: 8h-21h30. Ven-Sam: 8h-23h.'
                ]
            ],
            [
                '@type' => 'Question',
                'name' => 'Proposez-vous des options végétariennes et halal ?',
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => 'Oui, Factory & Co propose des options pour tous : menus végétariens et halal disponibles pour accompagner tous nos clients.'
                ]
            ]
        ]
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($webPageSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
<script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@endpush

@section('content')
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>Notre concept</span></div></nav>

{{-- ════════════════════════════════════════════
     HERO SECTION
════════════════════════════════════════════ --}}
<section class="hero hero-concept">
    <div class="hero-bg" style="background-image: url('{{ asset('restaurant/plaisir/whatsapp-image-2021-12-07-at-21-45-21-4-.jpg') }}')" aria-hidden="true"></div>
    <div class="hero-overlay" aria-hidden="true"></div>
    <div class="hero-content">
        <span class="section-tag">Le concept</span>
        <h1>Bien plus qu'un restaurant. Un voyage culinaire.</h1>
        <p>L'énergie de New York s'installe aux Yvelines, au cœur de Mon Grand Plaisir.</p>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : PITCH EMOTIONNEL (REDESIGNÉ)
════════════════════════════════════════════ --}}
<section class="section pitch-section-redesigned">
    <div class="container">
        <div class="pitch-redesigned-grid">
            {{-- Colonne Contenu --}}
            <div class="pitch-redesigned-content">
                {{-- Badge --}}
                <span class="pitch-badge">
                    Notre philosophie
                </span>

                {{-- Titre principal avec highlight --}}
                <h2 class="pitch-redesigned-title">
                    Ici, on ne fait pas<br>
                    <span class="pitch-highlight">que se restaurer.</span>
                </h2>

                {{-- Accent line --}}
                <div class="pitch-accent-line"></div>

                {{-- Lead --}}
                <p class="pitch-redesigned-lead">
                    On s'accorde une vraie pause : <span class="pitch-emphasis">savoureuse, conviviale, authentique.</span>
                </p>

                {{-- Description --}}
                <p class="pitch-redesigned-description">
                    À Plaisir, entre smash burgers généreux, cheesecakes new-yorkais et notre terrasse ensoleillée, chaque visite se transforme en évasion gourmande. Le Wi-Fi gratuit, le parking à deux pas, l'ambiance chaleureuse : tout est pensé pour que vous profitiez pleinement.
                </p>

                {{-- CTA Button --}}
                <div class="pitch-cta-group">
                    <a href="javascript:void(0)" onclick="window.factoryCoNav && window.factoryCoNav.openNavigationModal()" class="btn btn-pink">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Venir chez nous
                    </a>
                </div>
            </div>

            {{-- Colonne Image --}}
            <div class="pitch-redesigned-image">
                <div class="pitch-image-wrapper">
                    <img src="{{ asset('restaurant/plaisir/whatsapp-image-2021-12-07-at-21-45-21-4-.jpg') }}" alt="Terrasse et intérieur Factory & Co Plaisir Yvelines" loading="lazy">
                    {{-- Accent corner --}}
                    <div class="pitch-image-accent"></div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ════════════════════════════════════════════
     SECTION : NOTRE CONCEPT (REDESIGNÉ)
════════════════════════════════════════════ --}}
<section class="section section-dark concept-section-redesigned">
    <div class="container">
        {{-- Header Premium --}}
        <div class="concept-header-redesigned">
            <h2 class="concept-title-redesigned">
                Notre <span class="concept-highlight">concept</span>
            </h2>
            <p class="concept-subtitle-redesigned">L'énergie new-yorkaise, le savoir-faire français</p>
        </div>

        {{-- Intro text en citation --}}
        <blockquote class="concept-quote">
            Notre concept à Plaisir : une cuisine gourmande et qualitative, dans un cadre inspiré des diners new-yorkais — avec terrasse, Wi-Fi et l'énergie de New York au cœur des Yvelines.
        </blockquote>

        {{-- 3 Piliers en cards --}}
        <div class="concept-pillars-grid">
            {{-- Pilier 1 --}}
            <div class="concept-pillar-card">
                <div class="pillar-content">
                    <h3 class="pillar-title">La rapidité<br>rencontre la qualité</h3>
                    <p class="pillar-description">
                        Chaque burger smashé sur plaque brûlante, chaque commande préparée à la minute. Fast, mais premium.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>

            {{-- Pilier 2 --}}
            <div class="concept-pillar-card">
                <div class="pillar-content">
                    <h3 class="pillar-title">La street food<br>devient expérience</h3>
                    <p class="pillar-description">
                        Plus qu'un repas, c'est un moment. Chaque détail immersif crée une véritable parenthèse gourmande.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>

            {{-- Pilier 3 --}}
            <div class="concept-pillar-card">
                <div class="pillar-content">
                    <h3 class="pillar-title">Chaque détail<br>pensé pour vous</h3>
                    <p class="pillar-description">
                        De l'ambiance au service, tout est conçu pour transformer un simple repas en souvenir délicieux.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>
        </div>

        {{-- Conclusion impactante --}}
        <div class="concept-conclusion">
            <p class="concept-conclusion-text">
                Ici, tout est préparé avec exigence, dans un esprit <span class="concept-conclusion-highlight">fast casual premium</span> : rapide, frais, et toujours authentique.
            </p>
            <p class="concept-conclusion-subtext">
                ✓ Factory & Co depuis 2009 – Votre adresse gourmande à Mon Grand Plaisir
            </p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : L'EXPÉRIENCE CLIENT (REDESIGNÉE)
════════════════════════════════════════════ --}}
<section class="section experience-section-redesigned">
    <div class="container">
        {{-- Header Premium --}}
        <div class="experience-header-redesigned">
            <h2 class="experience-title-redesigned">
                L'<span class="experience-highlight">expérience client</span>
            </h2>
            <p class="experience-subtitle-redesigned">Un moment qui s'adapte à vous</p>
        </div>

        {{-- Intro text en citation premium --}}
        <blockquote class="experience-intro-quote">
            Que vous arriviez de la N12, du Transilien à Plaisir-Grignon ou en pleine session shopping à Mon Grand Plaisir, notre restaurant s'adapte à votre rythme.
        </blockquote>

        {{-- 4 Moments/Expériences en grille 2x2 premium --}}
        <div class="experience-moments-grid">
            {{-- Moment 1: Prendre le temps --}}
            <div class="experience-moment-card">
                <div class="moment-content">
                    <h3 class="moment-title">Prendre le temps</h3>
                    <p class="moment-description">Vous poser et savourer chaque bouchée</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 2: Manger rapidement --}}
            <div class="experience-moment-card">
                <div class="moment-content">
                    <h3 class="moment-title">Manger rapidement</h3>
                    <p class="moment-description">Sans compromis sur la qualité</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 3: Partager un moment --}}
            <div class="experience-moment-card">
                <div class="moment-content">
                    <h3 class="moment-title">Partager un moment</h3>
                    <p class="moment-description">Convivial et chaleureux</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 4: S'offrir une pause --}}
            <div class="experience-moment-card">
                <div class="moment-content">
                    <h3 class="moment-title">S'offrir une pause</h3>
                    <p class="moment-description">Gourmande et réconfortante</p>
                </div>
                <div class="moment-accent"></div>
            </div>
        </div>

        {{-- Conclusion impactante --}}
        <div class="experience-conclusion">
            <p class="experience-conclusion-text">
                Ici, tout est conçu pour être <span class="experience-conclusion-highlight">accessible, convivial et savoureux.</span>
            </p>
            <p class="experience-conclusion-subtext">
                ✓ Factory & Co Plaisir – Terrasse, Wi-Fi, parking gratuit, ouvert 7j/7
            </p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : POURQUOI NOUS CHOISIR - VISUELS FORTS
════════════════════════════════════════════ --}}
<section class="section why-choose-visual-hero">
    <div class="container">
        {{-- Header Premium --}}
        <div class="why-choose-header">
            <span class="why-choose-badge">
                Pourquoi nous choisir
            </span>
            <h2 class="why-choose-title">
                <span class="why-choose-highlight">L'expérience</span> fait la différence
            </h2>
            <p class="why-choose-subtitle">Plus qu'un restaurant, une destination mémorable</p>
        </div>

        {{-- CARD 1: Identité Forte --}}
        <div class="why-choose-card-visual">
            <div class="card-visual-image">
                <img src="{{ asset('restaurant/plaisir/whatsapp-image-2021-12-07-at-21-45-21-4-.jpg') }}" alt="Intérieur Factory & Co Plaisir - Design unique et mémorable" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">01</div>
                <h3 class="card-visual-title">Identité forte</h3>
                <p class="card-visual-description">Un design unique et reconnaissable qui marque les esprits dès l'entrée</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- CARD 2: Ambiance Immersive --}}
        <div class="why-choose-card-visual card-visual-reverse">
            <div class="card-visual-image">
                <img src="{{ asset('menu/SAL%C3%89/BURGER/Smash%20Burgers/Spicy%20Smash/Spicy%20Smash%20Big/DSC03815.jpg') }}" alt="Spicy Smash Burger Factory & Co" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">02</div>
                <h3 class="card-visual-title">Ambiance immersive</h3>
                <p class="card-visual-description">Une atmosphère energique qui vous transporte loin de l'ordinaire</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- CARD 3: Cuisine Généreuse --}}
        <div class="why-choose-card-visual">
            <div class="card-visual-image">
                <img src="{{ asset('menu/SUCR%C3%89/DESSERTS/X/DSC00466.jpg') }}" alt="Desserts gourmands Factory & Co" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">03</div>
                <h3 class="card-visual-title">Cuisine généreuse</h3>
                <p class="card-visual-description">Des produits frais, des portions généreuses, une qualité sans compromis</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- CARD 4: Expérience Complète --}}
        <div class="why-choose-card-visual card-visual-reverse">
            <div class="card-visual-image">
                <img src="{{ asset('menu/SUCR%C3%89/BREAKFAST/DSC01094.jpg') }}" alt="Breakfast Factory & Co - Moments en famille" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">04</div>
                <h3 class="card-visual-title">Expérience complète</h3>
                <p class="card-visual-description">Entrée, plat, dessert et moment précieux, tout en un seul endroit</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- Conclusion Impactante --}}
        <div class="why-choose-conclusion-visual">
            <blockquote class="conclusion-quote">
                <span class="quote-mark">"</span>
                <p>Ici, vous ne consommez pas une simple commande.</p>
                <p class="conclusion-highlight">Vous vivez une expérience.</p>
                <span class="quote-mark close">"</span>
            </blockquote>
        </div>
    </div>
</section>


{{-- ════════════════════════════════════════════
     SECTION : L'AMBIANCE DU LIEU (REDESIGNÉE)
════════════════════════════════════════════ --}}
<section class="section ambiance-section-redesigned">
    <div class="container">
        {{-- Header Premium --}}
        <div class="ambiance-header-redesigned">
            <span class="ambiance-badge">
                L'Ambiance du Lieu
            </span>
            <h2 class="ambiance-title-redesigned">
                Un espace <span class="ambiance-highlight">vivant et mémorable</span>
            </h2>
            <p class="ambiance-subtitle-redesigned">Dès l'entrée, l'atmosphère vous transporte</p>
        </div>

        {{-- Intro Quote --}}
        <blockquote class="ambiance-intro-quote">
            Factory & Co n'est pas juste un restaurant. C'est un univers pensé dans les moindres détails pour transformer chaque visite en souvenir.
        </blockquote>

        {{-- 3 Premium Ambiance Cards avec images --}}
        <div class="ambiance-cards-grid">
            {{-- Card 1: Design Urbain --}}
            <div class="ambiance-card-premium">
                <div class="ambiance-card-image">
                    <img src="{{ asset('restaurant/plaisir/whatsapp-image-2021-12-07-at-21-45-21-4-.jpg') }}" alt="Design urbain Factory & Co - Intérieur moderne et inspiré" loading="lazy">
                    <div class="ambiance-card-overlay"></div>
                </div>
                <div class="ambiance-card-content">
                    <h3 class="ambiance-card-title">Design urbain</h3>
                    <p class="ambiance-card-description">Inspiré des grandes villes, notre intérieur fusionne style new-yorkais et savoir-faire français</p>
                    <div class="ambiance-card-accent"></div>
                </div>
            </div>

            {{-- Card 2: Ambiance Conviviale --}}
            <div class="ambiance-card-premium">
                <div class="ambiance-card-image">
                    <img src="{{ asset('images/factory-val-3.webp') }}" alt="Ambiance conviviale Factory & Co - Moments en famille" loading="lazy">
                    <div class="ambiance-card-overlay"></div>
                </div>
                <div class="ambiance-card-content">
                    <h3 class="ambiance-card-title">Ambiance conviviale</h3>
                    <p class="ambiance-card-description">Un espace chaleureux pensé pour les moments partagés, où chacun se sent bienvenu</p>
                    <div class="ambiance-card-accent"></div>
                </div>
            </div>

            {{-- Card 3: Espace Détente --}}
            <div class="ambiance-card-premium">
                <div class="ambiance-card-image">
                    <img src="{{ asset('images/ashley.webp') }}" alt="Espace détente Factory & Co - Confort et relaxation" loading="lazy">
                    <div class="ambiance-card-overlay"></div>
                </div>
                <div class="ambiance-card-content">
                    <h3 class="ambiance-card-title">Espace détente</h3>
                    <p class="ambiance-card-description">Que ce soit rapide ou détente, nos installations vous offrent le confort et la sérénité</p>
                    <div class="ambiance-card-accent"></div>
                </div>
            </div>
        </div>

        {{-- Ambiance Message --}}
        <div class="ambiance-message">
            <blockquote class="ambiance-tagline">
                L'ambiance n'est pas une décoration.<br>
                <span class="ambiance-tagline-emphasis">C'est l'âme du lieu.</span>
            </blockquote>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : POUR TOUS LES MOMENTS (REDESIGNÉE)
════════════════════════════════════════════ --}}
<section class="section moments-section-redesigned">
    <div class="container">
        {{-- Header Premium --}}
        <div class="moments-header-redesigned">
            <span class="moments-badge">
                Pour tous les moments
            </span>
            <h2 class="moments-title-redesigned">
                Chaque heure a sa <span class="moments-highlight">bonne raison</span>
            </h2>
            <p class="moments-subtitle-redesigned">Petit-déjeuner, déjeuner, goûter, dîner… à chaque heure sa spécialité</p>
        </div>

        {{-- Intro Quote --}}
        <blockquote class="moments-intro-quote">
            Factory & Co s'adapte à votre rythme. Que ce soit une pause rapide ou un moment à savourer, nous sommes là pour chaque occasion.
        </blockquote>

        {{-- 4 Premium Moments Cards --}}
        <div class="moments-cards-grid">
            {{-- Card 1: Petit-déjeuner américain --}}
            <div class="moments-card-premium">
                <div class="moments-card-image">
                    <img src="{{ asset('menu/SUCR%C3%89/BREAKFAST/DSC01073.jpg') }}" alt="Petit-déjeuner américain Factory & Co" loading="lazy">
                    <div class="moments-card-overlay"></div>
                </div>
                <div class="moments-card-content">
                    <div class="moments-card-number">01</div>
                    <h3 class="moments-card-title">Petit-déjeuner américain</h3>
                    <p class="moments-card-description">Dès 8h00, bagels frais, oeufs brouillés, bacon croustillant, pâtisseries artisanales et café de qualité pour bien commencer la journée</p>
                    <div class="moments-card-accent"></div>
                </div>
            </div>

            {{-- Card 2: Pause Déjeuner --}}
            <div class="moments-card-premium">
                <div class="moments-card-image">
                    <img src="{{ asset('menu/SAL%C3%89/BURGER/Smash%20Burgers/Cheeseburger/Cheeseburger%20Regular/DSC03883.jpg') }}" alt="Pause déjeuner Factory & Co - Burger savoureux" loading="lazy">
                    <div class="moments-card-overlay"></div>
                </div>
                <div class="moments-card-content">
                    <div class="moments-card-number">02</div>
                    <h3 class="moments-card-title">Pause déjeuner</h3>
                    <p class="moments-card-description">Burgers savoureux et bagels généreux pour votre pause shopping ou pause professionnelle. Nourrissant, rapide et délicieux</p>
                    <div class="moments-card-accent"></div>
                </div>
            </div>

            {{-- Card 3: Goûter Gourmand --}}
            <div class="moments-card-premium">
                <div class="moments-card-image">
                    <img src="{{ asset('menu/SUCR%C3%89/CHEESECAKE/Factory_Claye%204.JPG') }}" alt="Goûter gourmand Factory & Co - Desserts délicieux" loading="lazy">
                    <div class="moments-card-overlay"></div>
                </div>
                <div class="moments-card-content">
                    <div class="moments-card-number">03</div>
                    <h3 class="moments-card-title">Goûter gourmand</h3>
                    <p class="moments-card-description">Nos cheesecakes onctueux, pâtisseries artisanales et douceurs artisanales. La pause sucrée qu'on attend avec impatience</p>
                    <div class="moments-card-accent"></div>
                </div>
            </div>

            {{-- Card 4: Dîner Décontracté --}}
            <div class="moments-card-premium">
                <div class="moments-card-image">
                    <img src="{{ asset('restaurant/plaisir/whatsapp-image-2021-12-07-at-21-45-21-4-.jpg') }}" alt="Dîner Factory & Co - Ambiance conviviale" loading="lazy">
                    <div class="moments-card-overlay"></div>
                </div>
                <div class="moments-card-content">
                    <div class="moments-card-number">04</div>
                    <h3 class="moments-card-title">Dîner décontracté</h3>
                    <p class="moments-card-description">Burgers savoureux, bagels généreux et cheesecakes gourmands pour une soirée en famille ou entre amis, en toute détente</p>
                    <div class="moments-card-accent"></div>
                </div>
            </div>
        </div>

        {{-- Closing Message --}}
        <div class="moments-closing-message">
            <p class="moments-closing-text">
                Peu importe l'heure, il y a toujours une bonne raison de venir.<br>
                <span class="moments-closing-emphasis">Factory & Co s'adapte à chaque moment de votre vie.</span>
            </p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     SECTION : CE QUE NOS CLIENTS AIMENT (REDESIGNÉE)
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

{{-- ════════════════════════════════════════════
     SECTION : LOCALISATION (REDESIGNÉE)
════════════════════════════════════════════ --}}
<section class="section location-section-redesigned">
    <div class="container">
        {{-- Header Premium --}}
        <div class="location-header">
            <span class="location-badge">
                Au coeur de votre centre commercial
            </span>
            <h2 class="location-title">
                Facile, <span class="location-highlight">accessible,</span> évident
            </h2>
            <p class="location-subtitle">Le point de pause parfait dans votre journée</p>
        </div>

        {{-- Intro Text --}}
        <p class="location-intro">
            Idéalement situé au coeur de votre centre commercial, Factory & Co est toujours à portée de main pour vos moments de détente.
        </p>

        {{-- 3 Premium Location Benefit Cards --}}
        <div class="location-benefits-grid">
            {{-- Card 1: Localisation --}}
            <div class="location-benefit-card">
                <h3 class="location-benefit-title">Au milieu du shopping</h3>
                <p class="location-benefit-text">Situé stratégiquement pour une pause naturelle dans votre parcours</p>
            </div>

            {{-- Card 2: Accessibilité --}}
            <div class="location-benefit-card">
                <h3 class="location-benefit-title">Accessible rapidement</h3>
                <p class="location-benefit-text">Facile à trouver, entièrement accessible de tous les sens du centre</p>
            </div>

            {{-- Card 3: Flexibilité --}}
            <div class="location-benefit-card">
                <h3 class="location-benefit-title">Adapté à tous les rythmes</h3>
                <p class="location-benefit-text">Ouvert à tous les moments, du matin jusqu'au soir, 7 jours sur 7</p>
            </div>
        </div>

        {{-- Closing Message --}}
        <div class="location-closing">
            <p class="location-closing-text">
                Un lieu pratique, sans aucun compromis sur l'expérience et la qualité.
            </p>
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════════
     CTA FINAL - EXPÉRIENCE À VIVRE
════════════════════════════════════════════ --}}
<section class="section-cta-final">
    <div class="section-cta-bg"></div>
    <div class="container">
        <div class="cta-inner">
            {{-- Badge ── --}}
            <span class="cta-badge">Expérience à vivre</span>

            {{-- Titre principal ── --}}
            <h2 class="cta-title">
                Prêt à découvrir<br>
                <span class="cta-highlight">l'authentique expérience ?</span>
            </h2>

            {{-- Description ── --}}
            <p class="cta-description">
                Bien plus qu'un restaurant, Factory & Co est une parenthèse gourmande<br>
                et mémorable au cœur de votre centre commercial.
            </p>

            {{-- CTA Buttons ── --}}
            <div class="cta-buttons">
                <a href="{{ route('menu.index') }}" class="btn btn-pink cta-btn-primary">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m0 0h6" />
                    </svg>
                    Voir la carte
                </a>
                <a href="javascript:void(0)" onclick="window.factoryCoNav && window.factoryCoNav.openNavigationModal()" class="btn btn-outline-white cta-btn-secondary">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="18" height="18">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Venir chez nous
                </a>
            </div>

            {{-- Accent line ── --}}
            <div class="cta-accent"></div>

            {{-- Tagline finale ── --}}
            <p class="cta-tagline">
                ✓ Factory & Co Since 1989<br>
                <span class="cta-tagline-small">Une vraie différence. Un vrai plaisir.</span>
            </p>
        </div>
    </div>
</section>

@endsection
