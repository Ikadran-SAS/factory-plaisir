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
                    'text' => 'Factory & Co a été créé en 2009. "Since 1989" est notre tagline, un clin d\'œil à l\'inspiration new-yorkaise du fondateur. Nous sommes implantés à Plaisir, au cœur du centre commercial Mon Grand Plaisir.'
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
            <p class="concept-subtitle-redesigned">L'esprit Brooklyn, l'exigence des Yvelines</p>
        </div>

        {{-- Intro text en citation --}}
        <blockquote class="concept-quote">
            Jonathan Jablonski a fondé Factory & Co en 2009, après avoir grandi entre le New Jersey et la France. Chaque recette, chaque technique, chaque ingrédient a été ramené de l'autre côté de l'Atlantique. À Plaisir, cette authenticité prend vie avec une terrasse, du Wi-Fi gratuit et le parking de Mon Grand Plaisir.
            <cite>— Jonathan Jablonski, Fondateur</cite>
        </blockquote>

        {{-- 3 Piliers en cards --}}
        <div class="concept-pillars-grid">
            {{-- Pilier 1 --}}
            <div class="concept-pillar-card">
                <div class="pillar-content">
                    <h3 class="pillar-title">L'efficacité<br>au service du goût</h3>
                    <p class="pillar-description">
                        Plaque chauffée à blanc, smash précis, assemblage soigné. Votre commande est prête en quelques minutes, sans jamais sacrifier la saveur.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>

            {{-- Pilier 2 --}}
            <div class="concept-pillar-card">
                <div class="pillar-content">
                    <h3 class="pillar-title">Le fast casual<br>version premium</h3>
                    <p class="pillar-description">
                        On a pris le meilleur de la street food américaine et on l'a élevé. Produits sélectionnés, recettes calibrées, ambiance soignée.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>

            {{-- Pilier 3 --}}
            <div class="concept-pillar-card">
                <div class="pillar-content">
                    <h3 class="pillar-title">Un cadre<br>qui raconte une histoire</h3>
                    <p class="pillar-description">
                        Du mobilier aux luminaires, de la playlist aux uniformes : chaque élément du restaurant prolonge le voyage jusqu'à New York.
                    </p>
                </div>
                <div class="pillar-accent-bar"></div>
            </div>
        </div>

        {{-- Conclusion impactante --}}
        <div class="concept-conclusion">
            <p class="concept-conclusion-text">
                Notre promesse à Plaisir : une cuisine <span class="concept-conclusion-highlight">généreuse et sans concession</span>, servie avec la rigueur d'un chef et la vitesse d'un diner.
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
            <p class="experience-subtitle-redesigned">Votre rythme, notre engagement</p>
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
                    <h3 class="moment-title">S'installer en terrasse</h3>
                    <p class="moment-description">Profiter du soleil des Yvelines et déguster sans se presser</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 2: Manger rapidement --}}
            <div class="experience-moment-card">
                <div class="moment-content">
                    <h3 class="moment-title">Déjeuner sur le pouce</h3>
                    <p class="moment-description">Pause express entre deux courses, qualité intacte</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 3: Partager un moment --}}
            <div class="experience-moment-card">
                <div class="moment-content">
                    <h3 class="moment-title">Réunir sa tribu</h3>
                    <p class="moment-description">En famille ou entre amis, autour d'une table généreuse</p>
                </div>
                <div class="moment-accent"></div>
            </div>

            {{-- Moment 4: S'offrir une pause --}}
            <div class="experience-moment-card">
                <div class="moment-content">
                    <h3 class="moment-title">Se faire plaisir</h3>
                    <p class="moment-description">Un cheesecake, un café : la parenthèse sucrée idéale</p>
                </div>
                <div class="moment-accent"></div>
            </div>
        </div>

        {{-- Conclusion impactante --}}
        <div class="experience-conclusion">
            <p class="experience-conclusion-text">
                Que vous arriviez de la N12 ou du Transilien, tout est pensé pour être <span class="experience-conclusion-highlight">fluide, accueillant et gourmand.</span>
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
                Ce qui nous rend <span class="why-choose-highlight">uniques</span> à Plaisir
            </h2>
            <p class="why-choose-subtitle">Terrasse, parking gratuit, halal : tout est réuni</p>
        </div>

        {{-- CARD 1: Identité Forte --}}
        <div class="why-choose-card-visual">
            <div class="card-visual-image">
                <img src="{{ asset('restaurant/plaisir/whatsapp-image-2021-12-07-at-21-45-21-4-.jpg') }}" alt="Intérieur Factory & Co Plaisir - Design unique et mémorable" loading="lazy">
                <div class="card-visual-overlay-dark"></div>
            </div>
            <div class="card-visual-content">
                <div class="card-visual-counter">01</div>
                <h3 class="card-visual-title">ADN new-yorkais</h3>
                <p class="card-visual-description">Néons, briques, bois brut : l'ambiance du diner américain transplantée au cœur de Mon Grand Plaisir</p>
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
                <h3 class="card-visual-title">Saveurs authentiques</h3>
                <p class="card-visual-description">Des recettes ramenées du New Jersey par Jonathan, préparées avec des ingrédients rigoureusement sélectionnés</p>
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
                <h3 class="card-visual-title">Portions XXL</h3>
                <p class="card-visual-description">Smash burgers doubles, bagels copieux, cheesecakes entiers : ici, on ne fait pas les choses à moitié</p>
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
                <h3 class="card-visual-title">Confort total</h3>
                <p class="card-visual-description">Terrasse en plein air, Wi-Fi haut débit, parking gratuit et options halal : tout pour passer un bon moment</p>
                <div class="card-visual-accent"></div>
            </div>
        </div>

        {{-- Conclusion Impactante --}}
        <div class="why-choose-conclusion-visual">
            <blockquote class="conclusion-quote">
                <span class="quote-mark">"</span>
                <p>Ici, chaque bouchée raconte un voyage.</p>
                <p class="conclusion-highlight">Du New Jersey jusqu'à Plaisir.</p>
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
                Un décor <span class="ambiance-highlight">qui vous embarque</span>
            </h2>
            <p class="ambiance-subtitle-redesigned">Poussez la porte, changez de continent</p>
        </div>

        {{-- Intro Quote --}}
        <blockquote class="ambiance-intro-quote">
            À Plaisir, on a reproduit l'énergie brute des diners de la côte Est : les matériaux, les couleurs, la lumière. Même la terrasse a ce petit côté sidewalk café.
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
                    <h3 class="ambiance-card-title">Esthétique industrielle</h3>
                    <p class="ambiance-card-description">Briques apparentes, acier brossé et enseignes lumineuses : un décor fidèle aux warehouses de Brooklyn</p>
                    <div class="ambiance-card-accent"></div>
                </div>
            </div>

            {{-- Card 2: Ambiance Conviviale --}}
            <div class="ambiance-card-premium">
                <div class="ambiance-card-image">
                    <img src="{{ asset('restaurant/plaisir/whatsapp-image-2021-12-07-at-21-45-21-5-.jpg') }}" alt="Ambiance conviviale Factory & Co Plaisir" loading="lazy">
                    <div class="ambiance-card-overlay"></div>
                </div>
                <div class="ambiance-card-content">
                    <h3 class="ambiance-card-title">Terrasse & convivialité</h3>
                    <p class="ambiance-card-description">En salle ou en extérieur, les tables sont grandes, l'accueil est franc, et les familles se sentent chez elles</p>
                    <div class="ambiance-card-accent"></div>
                </div>
            </div>

            {{-- Card 3: Espace Détente --}}
            <div class="ambiance-card-premium">
                <div class="ambiance-card-image">
                    <img src="{{ asset('restaurant/plaisir/img_0246-2.jpg') }}" alt="Espace détente Factory & Co Plaisir" loading="lazy">
                    <div class="ambiance-card-overlay"></div>
                </div>
                <div class="ambiance-card-content">
                    <h3 class="ambiance-card-title">Votre bulle de décompression</h3>
                    <p class="ambiance-card-description">Wi-Fi gratuit, prises accessibles, musique calibrée : le spot idéal pour souffler après le shopping</p>
                    <div class="ambiance-card-accent"></div>
                </div>
            </div>
        </div>

        {{-- Ambiance Message --}}
        <div class="ambiance-message">
            <blockquote class="ambiance-tagline">
                On ne décore pas un restaurant.<br>
                <span class="ambiance-tagline-emphasis">On construit une atmosphère.</span>
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
                Du matin au soir, <span class="moments-highlight">on assure</span>
            </h2>
            <p class="moments-subtitle-redesigned">Breakfast, lunch, goûter, dinner : quatre ambiances, une seule adresse à Mon Grand Plaisir</p>
        </div>

        {{-- Intro Quote --}}
        <blockquote class="moments-intro-quote">
            Ouvert 7j/7 dès 8h, Factory & Co Plaisir accompagne toutes vos journées. Avant le bureau, pendant le shopping ou après le ciné : on est toujours prêts.
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
                    <p class="moments-card-description">Ouvrez grand les yeux dès 8h : pancakes moelleux, bagels garnis, œufs brouillés onctueux et café corsé pour attaquer la journée avec énergie</p>
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
                    <p class="moments-card-description">Smash burger double, frites croustillantes, bagel loaded : rechargez les batteries entre deux boutiques de Mon Grand Plaisir</p>
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
                    <p class="moments-card-description">Cheesecake new-yorkais crémeux, cookies XXL, milkshakes épais : la récompense sucrée que toute la famille attend</p>
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
                    <p class="moments-card-description">Le vendredi et samedi jusqu'à 23h : posez-vous en terrasse ou en salle pour une soirée burger décontractée, loin du stress de la semaine</p>
                    <div class="moments-card-accent"></div>
                </div>
            </div>
        </div>

        {{-- Closing Message --}}
        <div class="moments-closing-message">
            <p class="moments-closing-text">
                8h, 12h, 16h ou 21h : à chaque heure, une spécialité vous attend.<br>
                <span class="moments-closing-emphasis">Factory & Co Plaisir, ouvert quand vous en avez envie.</span>
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
                N12, Transilien, parking : <span class="location-highlight">on est là</span>
            </h2>
            <p class="location-subtitle">1170 Av. de Saint-Germain, 78370 Plaisir — au cœur de Mon Grand Plaisir</p>
        </div>

        {{-- Intro Text --}}
        <p class="location-intro">
            À deux minutes de la N12 et à quelques pas du Transilien Plaisir-Grignon, Factory & Co vous accueille dans le centre commercial Mon Grand Plaisir avec parking gratuit.
        </p>

        {{-- 3 Premium Location Benefit Cards --}}
        <div class="location-benefits-grid">
            {{-- Card 1: Localisation --}}
            <div class="location-benefit-card">
                <h3 class="location-benefit-title">Accès direct depuis la N12</h3>
                <p class="location-benefit-text">Sortie Plaisir, direction Mon Grand Plaisir : en 2 minutes vous êtes attablé</p>
            </div>

            {{-- Card 2: Accessibilité --}}
            <div class="location-benefit-card">
                <h3 class="location-benefit-title">Parking gratuit</h3>
                <p class="location-benefit-text">Des milliers de places disponibles au centre commercial, sans stress ni frais supplémentaires</p>
            </div>

            {{-- Card 3: Flexibilité --}}
            <div class="location-benefit-card">
                <h3 class="location-benefit-title">Transilien Plaisir-Grignon</h3>
                <p class="location-benefit-text">Accessible en transport en commun, à proximité de la gare, pour ceux qui préfèrent le train</p>
            </div>
        </div>

        {{-- Closing Message --}}
        <div class="location-closing">
            <p class="location-closing-text">
                Voiture, train ou à pied : Factory & Co Plaisir est facile d'accès, ouvert 7j/7, avec terrasse.
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
            <span class="cta-badge">Votre table vous attend</span>

            {{-- Titre principal ── --}}
            <h2 class="cta-title">
                Envie de goûter<br>
                <span class="cta-highlight">au vrai New York ?</span>
            </h2>

            {{-- Description ── --}}
            <p class="cta-description">
                Smash burgers, bagels, cheesecakes et options halal vous attendent<br>
                en terrasse ou en salle, au centre commercial Mon Grand Plaisir.
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
                <span class="cta-tagline-small">Le goût de New York, à deux pas de chez vous.</span>
            </p>
        </div>
    </div>
</section>

@endsection
