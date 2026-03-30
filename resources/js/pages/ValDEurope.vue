<template>
  <div>
    <!-- Navigation Modal -->
    <navigation-modal
      :is-open="isNavigationModalOpen"
      @close="closeNavigationModal"
      @navigate="onNavigate"
    />

    <!-- Hero Section -->
    <section class="hero" style="background-image: url('/images/factory-val.webp')">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <p class="hero-location">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          CC Mon Grand Plaisir · 1170 Av. de Saint-Germain · Plaisir
        </p>
        <h1 class="hero-title">
          Factory &amp; Co<br>
          Plaisir :<br>
          L'<em>Authentique Diner</em> Américain
        </h1>
        <p class="hero-sub">Smash Burgers · Bagels New-Yorkais · Cheesecake Factory · Healthy Bowls</p>
        <p class="hero-hours">Ouvert 7j/7 · 08:00 – 23:00 · Delicious since 2008</p>
        <div class="hero-ctas">
          <button @click="openNavigationModal" class="btn btn-pink">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            Venir chez nous
          </button>
          <a href="/carte/burgers" class="btn btn-outline-white">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            Découvrir la Carte
          </a>
        </div>
      </div>
    </section>

    <!-- Product Gallery Section -->
    <section class="section section-dark">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Galerie</span>
          <h2 class="section-title">Le Meilleur de Factory &amp; Co Plaisir</h2>
        </div>
        
        <product-grid
          :products="featuredProducts"
          :routes="routes"
        />
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import NavigationModal from '@/components/NavigationModal.vue'
import ProductGrid from '@/components/ProductGrid.vue'

const props = defineProps({
  featuredProducts: Object,
  featuredReviews: Array,
  openingHours: Array,
  faqs: Object,
})

const isNavigationModalOpen = ref(false)

const routes = computed(() => ({
  burgers: '/carte/burgers',
  bagels: '/carte/bagels',
  cheesecake: '/carte/cheesecake',
  bowls: '/carte/bowls',
}))

const openNavigationModal = () => {
  isNavigationModalOpen.value = true
}

const closeNavigationModal = () => {
  isNavigationModalOpen.value = false
}

const onNavigate = (app) => {
  console.log('Navigation app selected:', app)
  closeNavigationModal()
}
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.hero {
  position: relative;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  background-size: cover;
  background-position: center;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.4);
  z-index: 1;
}

.hero-content {
  position: relative;
  text-align: center;
  color: white;
  max-width: 600px;
  padding: 2rem;
  z-index: 2;
}

.hero-location {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  font-size: 0.875rem;
  margin-bottom: 1rem;
  opacity: 0.9;
}

.hero-title {
  font-size: 3rem;
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 1rem;
}

.hero-title em {
  font-style: italic;
  color: #F5C3DB;
}

.hero-sub {
  font-size: 1.125rem;
  margin-bottom: 0.5rem;
  opacity: 0.95;
}

.hero-hours {
  font-size: 0.875rem;
  margin-bottom: 2rem;
  opacity: 0.85;
}

.hero-ctas {
  display: flex;
  gap: 1rem;
  justify-content: center;
  flex-wrap: wrap;
}

.btn {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.875rem 1.5rem;
  border: none;
  border-radius: 0.375rem;
  font-weight: 600;
  cursor: pointer;
  text-decoration: none;
  transition: all 0.2s ease;
}

.btn-pink {
  background: #F5C3DB;
  color: #1B263A;
}

.btn-pink:hover {
  background: #CC3366;
  color: white;
}

.btn-outline-white {
  border: 2px solid white;
  background: transparent;
  color: white;
}

.btn-outline-white:hover {
  background: white;
  color: #1B263A;
}

.section {
  padding: 5rem 2rem;
}

.section-dark {
  background: #1B263A;
  color: white;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

.section-header {
  margin-bottom: 3rem;
  text-align: center;
}

.section-tag {
  display: inline-block;
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: #F5C3DB;
  margin-bottom: 1rem;
}

.section-title {
  font-size: 2.5rem;
  font-weight: 700;
  margin: 0;
  color: white;
}

@media (max-width: 768px) {
  .hero-title {
    font-size: 2rem;
  }

  .hero-sub {
    font-size: 1rem;
  }

  .section-title {
    font-size: 1.75rem;
  }
}
</style>
