<template>
  <div class="product-grid-vue">
    <!-- Grille des 4 silos catégories -->
    <div class="silos-grid">
      <a
        v-for="silo in silos"
        :key="silo.key"
        :href="routes[silo.key]"
        class="silo-card"
        :class="{ 'silo-card--featured': silo.featured }"
      >
        <div class="silo-image-wrap">
          <img
            v-if="silo.product && silo.product.image_url"
            :src="silo.product.image_url"
            :alt="silo.label"
            loading="lazy"
          />
          <div class="silo-overlay">
            <span class="silo-cta">Voir la carte →</span>
          </div>
        </div>
        <div class="silo-body">
          <span class="silo-badge">{{ silo.badge }}</span>
          <h3 class="silo-title">{{ silo.emoji }} {{ silo.label }}</h3>
          <p class="silo-desc">{{ silo.description }}</p>
          <span class="silo-link">{{ silo.cta }}</span>
        </div>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ProductGrid',
  props: {
    products: {
      type: Object,
      default: () => ({})
    },
    routes: {
      type: Object,
      default: () => ({})
    }
  },
  computed: {
    silos() {
      return [
        {
          key: 'burgers',
          emoji: '🍔',
          badge: 'BEST-SELLER',
          label: "L'ATELIER BURGER",
          description: 'Smash Burgers, options Halal, menus enfants. Le meilleur burger de Blagnac.',
          cta: 'VOIR LES BURGERS',
          featured: true,
          product: this.getFeaturedProduct('burgers')
        },
        {
          key: 'bagels',
          emoji: '🥯',
          badge: 'BREAKFAST',
          label: 'BAGELS AUTHENTIQUES',
          description: 'Chauds, froids, à composer. Petit-déjeuner américain dès 07h00.',
          cta: 'VOIR LES BAGELS',
          featured: false,
          product: this.getFeaturedProduct('bagels')
        },
        {
          key: 'cheesecake',
          emoji: '🍰',
          badge: 'SIGNATURE',
          label: 'CHEESECAKE FACTORY',
          description: 'Recettes du chef Jonathan Jablonski. Le meilleur cheesecake de Toulouse.',
          cta: 'VOIR LES DESSERTS',
          featured: false,
          product: this.getFeaturedProduct('cheesecake')
        },
        {
          key: 'bowls',
          emoji: '🥗',
          badge: 'HEALTHY',
          label: 'HEALTHY & BOWLS',
          description: 'Super Bowls, salades sur mesure, options Veggie & sans gluten.',
          cta: 'VOIR LES BOWLS',
          featured: false,
          product: this.getFeaturedProduct('bowls')
        }
      ]
    }
  },
  methods: {
    getFeaturedProduct(category) {
      const items = this.products[category]
      if (!items || items.length === 0) return null
      return items[0]
    }
  }
}
</script>
