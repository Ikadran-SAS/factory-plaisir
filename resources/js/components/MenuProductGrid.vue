<template>
  <div class="menu-product-grid-vue">
    <!-- Filtres -->
    <div class="menu-filters" v-if="filters.length > 1">
      <button
        v-for="filter in filters"
        :key="filter.key"
        class="filter-btn"
        :class="{ 'filter-btn--active': activeFilter === filter.key }"
        @click="activeFilter = filter.key"
      >
        {{ filter.label }}
      </button>
    </div>

    <!-- Grille produits -->
    <div class="products-grid">
      <transition-group name="product-fade" tag="div" class="products-grid-inner">
        <div
          v-for="product in filteredProducts"
          :key="product.id"
          class="product-card"
        >
          <div class="product-image-wrap">
            <img
              v-if="product.image_url"
              :src="product.image_url"
              :alt="product.name"
              loading="lazy"
            />
            <div class="product-image-placeholder" v-else>
              <span>{{ categoryEmoji }}</span>
            </div>
            <span v-if="product.badge" :class="badgeClass(product)">
              {{ product.badge }}
            </span>
            <div class="product-overlay">
              <div class="product-overlay-content">
                <h4>{{ product.name }}</h4>
                <p>{{ product.ingredients }}</p>
                <div class="product-tags">
                  <span v-if="product.is_halal" class="tag-halal">✅ Halal</span>
                  <span v-if="product.is_vegetarian" class="tag-veggie">🌿 Végétarien</span>
                  <span v-if="product.is_vegan" class="tag-vegan">🌱 Vegan</span>
                </div>
              </div>
            </div>
          </div>
          <div class="product-body">
            <h3 class="product-name">{{ product.name }}</h3>
            <p class="product-desc">{{ product.description }}</p>
            <div class="product-footer">
              <span class="product-price">{{ formatPrice(product.price) }}</span>
              <div class="product-icons">
                <span v-if="product.is_halal" title="Halal certifié">✅</span>
                <span v-if="product.is_vegetarian" title="Végétarien">🌿</span>
                <span v-if="product.is_vegan" title="Vegan">🌱</span>
              </div>
            </div>
            <!-- Allergènes -->
            <div class="product-allergens" v-if="product.allergens && product.allergens.length">
              <span class="allergens-label">Allergènes :</span>
              <span v-for="(a, i) in product.allergens" :key="i" class="allergen-tag">{{ a }}</span>
            </div>
          </div>
        </div>
      </transition-group>
    </div>

    <!-- Message si aucun résultat -->
    <div class="no-results" v-if="filteredProducts.length === 0">
      <p>Aucun produit disponible pour ce filtre.</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'MenuProductGrid',
  props: {
    products: {
      type: Object,
      default: () => ({})
    },
    category: {
      type: String,
      default: 'burgers'
    }
  },
  data() {
    return {
      activeFilter: 'all'
    }
  },
  computed: {
    allProducts() {
      return Object.values(this.products).flat()
    },
    filters() {
      const subcategories = [...new Set(this.allProducts.map(p => p.subcategory).filter(Boolean))]
      return [
        { key: 'all', label: 'Tous' },
        ...subcategories.map(s => ({ key: s, label: this.subcategoryLabel(s) }))
      ]
    },
    filteredProducts() {
      if (this.activeFilter === 'all') return this.allProducts
      return this.allProducts.filter(p => p.subcategory === this.activeFilter)
    },
    categoryEmoji() {
      const emojis = { burgers: '🍔', bagels: '🥯', cheesecake: '🍰', bowls: '🥗' }
      return emojis[this.category] || '🍽️'
    }
  },
  methods: {
    formatPrice(price) {
      return parseFloat(price).toFixed(2).replace('.', ',') + ' €'
    },
    badgeClass(product) {
      const classes = { pink: 'product-badge', green: 'product-badge product-badge--halal', dark: 'product-badge product-badge--dark' }
      return classes[product.badge_color] || 'product-badge'
    },
    subcategoryLabel(key) {
      const labels = {
        smash: 'Smash Burgers', halal: 'Halal', veggie: 'Végétarien', kids: 'Enfants',
        chaud: 'Chauds', froid: 'Froids', compose: 'À composer',
        classique: 'Classiques', fruité: 'Fruités', gourmand: 'Gourmands', emporter: 'À emporter',
        vegan: 'Vegan', proteine: 'Protéiné', salade: 'Salades', breakfast: 'Breakfast'
      }
      return labels[key] || key
    }
  }
}
</script>
