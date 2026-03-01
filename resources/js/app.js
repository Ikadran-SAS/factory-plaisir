import { createApp } from 'vue'

// ── Composants Vue.js ──
import ProductGrid      from './components/ProductGrid.vue'
import MenuProductGrid  from './components/MenuProductGrid.vue'
import ReviewsCarousel  from './components/ReviewsCarousel.vue'
import FaqAccordion     from './components/FaqAccordion.vue'

// ── Initialisation de l'application Vue ──
// Montage sur l'élément #app défini dans le layout Blade
const app = createApp({})

// Enregistrement global des composants
app.component('product-grid',       ProductGrid)
app.component('menu-product-grid',  MenuProductGrid)
app.component('reviews-carousel',   ReviewsCarousel)
app.component('faq-accordion',      FaqAccordion)

// Montage
app.mount('#app')
