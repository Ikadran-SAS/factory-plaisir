@extends('layouts.app')
@section('title', $seo['title'])
@section('description', $seo['description'])
@section('keywords', $seo['keywords'])
@section('canonical', $seo['canonical'])
@section('content')
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>Offre Traiteur</span></div></nav>
<div class="page-hero">
    <div class="page-hero-inner">
        <span class="section-tag">B2B · Entreprises du bassin toulousain</span>
        <h1>Traiteur Business Blagnac –<br><em>Plateaux Repas &amp; Buffets d'Entreprise</em></h1>
        <p>Factory &amp; Co propose une offre traiteur sur-mesure pour les entreprises du bassin toulousain : Airbus, ATR, Thalès, Safran et les PME de la zone aéroportuaire.</p>
    </div>
</div>
<section class="section section-light">
    <div class="container">
        <div class="traiteur-grid">
            <div class="traiteur-card">
                <span class="traiteur-icon">🥪</span>
                <h3>Plateaux Repas</h3>
                <p>Plateaux individuels ou collectifs pour vos réunions, formations et séminaires. Livrés ou à récupérer.</p>
                <p class="traiteur-price">À partir de 12€ / personne</p>
            </div>
            <div class="traiteur-card">
                <span class="traiteur-icon">🥂</span>
                <h3>Cocktails Dinatoires</h3>
                <p>Buffets finger food pour vos événements d'entreprise. Mini-burgers, bagels, cheesecakes en portions.</p>
                <p class="traiteur-price">À partir de 18€ / personne</p>
            </div>
            <div class="traiteur-card">
                <span class="traiteur-icon">🍰</span>
                <h3>Coffrets Cheesecake</h3>
                <p>Coffrets assortis pour vos équipes. Livraison possible dans la zone aéroportuaire de Blagnac.</p>
                <p class="traiteur-price">À partir de 24€ / coffret 4 parts</p>
            </div>
        </div>
        <div style="text-align:center;margin-top:3rem">
            <a href="{{ route('contact') }}?sujet=traiteur" class="btn btn-navy" style="font-size:1.1rem;padding:1rem 2.5rem">
                Demander un devis gratuit
            </a>
        </div>
    </div>
</section>
@endsection
