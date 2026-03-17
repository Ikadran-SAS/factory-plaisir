@extends('layouts.app')

@section('title', 'Avis Clients | Factory & Co – Nos Clients Témoignent')
@section('description', 'Découvrez les avis vérifiés de nos clients satisfaits. 4.8★ - Plus de 500 avis positifs. Factory & Co Val d\'Europe.')
@section('keywords', 'avis clients factory co, témoignages factory co, avis burgers serris, reviews factory and co')

@section('content')

{{-- BREADCRUMB --}}
<nav class="breadcrumb">
    <div class="breadcrumb-inner">
        <a href="{{ route('home') }}">Accueil</a>
        <span class="bc-sep">›</span>
        <span>Avis Clients</span>
    </div>
</nav>

{{-- HERO SECTION --}}
<section class="avis-hero">
    <div class="avis-hero-overlay"></div>
    <div class="avis-hero-content">
        <span class="section-tag">⭐ CE QUE NOS CLIENTS DISENT</span>
        <h1>La Satisfaction de Nos Clients<br>Est Notre Meilleure Publicité</h1>
        <p>Découvrez pourquoi les clients de Factory & Co nous font confiance</p>

        <div class="avis-trust-metrics">
            <div class="metric">
                <span class="metric-value">4.8</span>
                <span class="metric-label">Étoiles moyennes</span>
                <div class="metric-stars">★★★★★</div>
            </div>
            <div class="metric">
                <span class="metric-value">500+</span>
                <span class="metric-label">Avis vérifiés</span>
            </div>
            <div class="metric">
                <span class="metric-value">97%</span>
                <span class="metric-label">Clients satisfaits</span>
            </div>
            <div class="metric">
                <span class="metric-value">2024</span>
                <span class="metric-label">Année de confiance</span>
            </div>
        </div>
    </div>
</section>

{{-- FILTER BAR --}}
<div class="avis-filter-bar sticky">
    <div class="container">
        <div class="filter-controls">
            <div class="filter-group">
                <label for="sort">Trier par:</label>
                <select id="sort" class="filter-select">
                    <option value="recent">Les plus récents</option>
                    <option value="rating-high">Note: Élevée à basse</option>
                </select>
            </div>

            <div class="filter-group">
                <label for="rating">Note:</label>
                <select id="rating" class="filter-select">
                    <option value="">Tous les avis</option>
                    <option value="5">⭐⭐⭐⭐⭐ (5 étoiles)</option>
                    <option value="4">⭐⭐⭐⭐ (4+ étoiles)</option>
                </select>
            </div>

            <button class="btn btn-reset-filters">Réinitialiser</button>
        </div>
    </div>
</div>

{{-- TESTIMONIALS GRID --}}
<section class="avis-section">
    <div class="container">
        <div class="avis-grid">
            <div class="avis-card">
                <div class="avis-header">
                    <div class="avis-author">
                        <div class="author-avatar" style="background: linear-gradient(135deg, #F5C3DB 0%, #E8A0C0 100%)">JM</div>
                        <div class="author-info">
                            <h3>Jean-Marc D.</h3>
                            <p>Clients réguliers depuis 2022</p>
                        </div>
                    </div>
                    <div class="avis-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-value">5/5</span>
                    </div>
                </div>
                <div class="avis-title">Les meilleurs burgers de Val d'Europe!</div>
                <p class="avis-text">J'ai essayé les burgers de Factory & Co et c'est tout simplement délicieux. La viande est de qualité, les garnitures fraîches, et l'équipe toujours souriante. Je reviens au moins une fois par semaine!</p>
                <div class="avis-meta">
                    <span class="avis-category">🍔 Burgers</span>
                    <span class="avis-date">Il y a 2 semaines</span>
                </div>
                <div class="avis-badges">
                    <span class="badge badge-verified">✓ Achat vérifiés</span>
                </div>
            </div>

            <div class="avis-card">
                <div class="avis-header">
                    <div class="avis-author">
                        <div class="author-avatar" style="background: linear-gradient(135deg, #90EE90 0%, #7CFC00 100%)">SL</div>
                        <div class="author-info">
                            <h3>Sandrine L.</h3>
                            <p>Mère de 2 enfants</p>
                        </div>
                    </div>
                    <div class="avis-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-value">5/5</span>
                    </div>
                </div>
                <div class="avis-title">Parfait pour les enfants ET les adultes</div>
                <p class="avis-text">Les bagels de Factory & Co sont parfaits pour un petit-déj en famille. Les enfants adorent, c'est sain, et c'est frais! En plus, l'accueil est charmant.</p>
                <div class="avis-meta">
                    <span class="avis-category">🥯 Bagels</span>
                    <span class="avis-date">Il y a 3 semaines</span>
                </div>
                <div class="avis-badges">
                    <span class="badge badge-verified">✓ Achat vérifiés</span>
                </div>
            </div>

            <div class="avis-card">
                <div class="avis-header">
                    <div class="avis-author">
                        <div class="author-avatar" style="background: linear-gradient(135deg, #FFA500 0%, #FF6347 100%)">MV</div>
                        <div class="author-info">
                            <h3>Marie V.</h3>
                            <p>Fan de cheesecake notoire</p>
                        </div>
                    </div>
                    <div class="avis-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-value">5/5</span>
                    </div>
                </div>
                <div class="avis-title">Le meilleur cheesecake de ma vie!</div>
                <p class="avis-text">J'ai goûté du cheesecake un peu partout, et celui de Factory & Co est vraiment exceptionnel. Texture crémeuse, recette authentique.</p>
                <div class="avis-meta">
                    <span class="avis-category">🍰 Cheesecake</span>
                    <span class="avis-date">Il y a 1 mois</span>
                </div>
                <div class="avis-badges">
                    <span class="badge badge-verified">✓ Achat vérifiés</span>
                </div>
            </div>

            <div class="avis-card">
                <div class="avis-header">
                    <div class="avis-author">
                        <div class="author-avatar" style="background: linear-gradient(135deg, #87CEEB 0%, #4169E1 100%)">TP</div>
                        <div class="author-info">
                            <h3>Thierry P.</h3>
                            <p>Vegan, proche du centre commercial</p>
                        </div>
                    </div>
                    <div class="avis-rating">
                        <span class="stars">★★★★☆</span>
                        <span class="rating-value">4.5/5</span>
                    </div>
                </div>
                <div class="avis-title">Excellente option vegan!</div>
                <p class="avis-text">En tant que vegan, je suis ravi d'avoir un endroit où je peux manger de bons burgers et bowls sans compromis. Le personnel est attentif.</p>
                <div class="avis-meta">
                    <span class="avis-category">🥗 Bowls</span>
                    <span class="avis-date">Il y a 1 mois</span>
                </div>
                <div class="avis-badges">
                    <span class="badge badge-verified">✓ Achat vérifiés</span>
                </div>
            </div>

            <div class="avis-card">
                <div class="avis-header">
                    <div class="avis-author">
                        <div class="author-avatar" style="background: linear-gradient(135deg, #DDA0DD 0%, #DA70D6 100%)">CJ</div>
                        <div class="author-info">
                            <h3>Céline J.</h3>
                            <p>Bureau aux alentours</p>
                        </div>
                    </div>
                    <div class="avis-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-value">5/5</span>
                    </div>
                </div>
                <div class="avis-title">Mon pause-déj préférée</div>
                <p class="avis-text">Factory & Co est devenu mon incontournable pour la pause déjeuner. Service rapide, food de qualité, lieu agréable. Les prix sont justes.</p>
                <div class="avis-meta">
                    <span class="avis-category">🍔 Burgers</span>
                    <span class="avis-date">Il y a 2 semaines</span>
                </div>
                <div class="avis-badges">
                    <span class="badge badge-verified">✓ Achat vérifiés</span>
                </div>
            </div>

            <div class="avis-card">
                <div class="avis-header">
                    <div class="avis-author">
                        <div class="author-avatar" style="background: linear-gradient(135deg, #98FB98 0%, #50C878 100%)">AM</div>
                        <div class="author-info">
                            <h3>Antoine M.</h3>
                            <p>Foodie, street food premium</p>
                        </div>
                    </div>
                    <div class="avis-rating">
                        <span class="stars">★★★★★</span>
                        <span class="rating-value">5/5</span>
                    </div>
                </div>
                <div class="avis-title">De la vraie qualité street food</div>
                <p class="avis-text">Factory & Co apporte une vraie dimension "street food premium" à Val d'Europe. Ingrédients frais, préparation soignée, saveurs authentiques.</p>
                <div class="avis-meta">
                    <span class="avis-category">🍔 Service</span>
                    <span class="avis-date">Il y a 3 semaines</span>
                </div>
                <div class="avis-badges">
                    <span class="badge badge-verified">✓ Achat vérifiés</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section class="avis-cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Vous avez testé Factory & Co?</h2>
            <p>Partagez votre expérience avec notre communauté</p>
            <button class="btn btn-pink btn-lg">Écrire un avis</button>
        </div>
    </div>
</section>

{{-- FAQ SECTION --}}
<section class="avis-faq-section">
    <div class="container">
        <h2>Questions Fréquentes</h2>
        <div class="faq-list">
            <div class="faq-item">
                <button class="faq-toggle">Comment vérifiez-vous les avis?</button>
                <div class="faq-answer">
                    <p>Nous vérifions que les avis proviennent de clients qui ont réellement effectué un achat chez Factory & Co. Cela garantit l'authenticité et la fiabilité de tous les avis.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-toggle">Combien de temps faut-il pour qu'un avis soit publié?</button>
                <div class="faq-answer">
                    <p>Les avis sont généralement publiés dans les 24 à 48 heures après soumission.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-toggle">Puis-je modifier mon avis après l'avoir posté?</button>
                <div class="faq-answer">
                    <p>Oui, vous pouvez modifier votre avis dans les 30 jours suivant sa publication.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-toggle">Acceptez-vous les avis négatifs?</button>
                <div class="faq-answer">
                    <p>Absolument! Les avis constructifs nous aident à améliorer notre service. Nous prenons tous les commentaires au sérieux.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqToggles = document.querySelectorAll('.faq-toggle');
    faqToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const item = this.parentElement;
            item.classList.toggle('active');
        });
    });
});
</script>

@endsection
