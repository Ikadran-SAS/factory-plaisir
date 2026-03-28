@extends('layouts.app')
@section('title', $seo['title'])
@section('description', $seo['description'])
@section('keywords', $seo['keywords'])
@section('canonical', $seo['canonical'])
@section('content')
<nav class="breadcrumb"><div class="breadcrumb-inner"><a href="{{ route('home') }}">Accueil</a><span class="bc-sep">›</span><span>Click &amp; collect</span></div></nav>
<div class="page-hero">
    <div class="page-hero-inner">
        <span class="section-tag">Service · Zéro attente</span>
        <h1>Click &amp; collect –<br><em>Commandez avant d'arriver</em></h1>
        <p>Commandez en ligne, récupérez votre repas directement au comptoir Hall C sans attendre. Idéal pour les voyageurs pressés.</p>
    </div>
</div>
<section class="section section-light">
    <div class="container">
        <div class="steps-grid">
            <div class="step-card">
                <span class="step-num">1</span>
                <h3>Choisissez</h3>
                <p>Parcourez notre carte en ligne et sélectionnez vos plats préférés.</p>
            </div>
            <div class="step-card">
                <span class="step-num">2</span>
                <h3>Payez</h3>
                <p>Réglez en ligne en toute sécurité. Toutes les cartes acceptées.</p>
            </div>
            <div class="step-card">
                <span class="step-num">3</span>
                <h3>Récupérez</h3>
                <p>Passez la sécurité et récupérez votre commande au comptoir Hall C.</p>
            </div>
        </div>
        <div style="text-align:center;margin-top:3rem">
            <a href="{{ route('menu.index') }}" class="btn btn-pink" style="font-size:1.1rem;padding:1rem 2.5rem">
                Voir la carte et commander
            </a>
        </div>
    </div>
</section>
@endsection
