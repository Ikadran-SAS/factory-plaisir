<template>
  <div class="product-grid-wrapper">
    <div v-if="!products || products.length === 0" class="empty-state">
      <p>Aucun produit disponible</p>
    </div>
    <div v-else class="products-container">
      <div v-for="(productList, category) in groupedProducts" :key="category" class="category-section">
        <h3 class="category-title">{{ categoryLabel(category) }}</h3>
        <div class="grid">
          <div v-for="product in productList" :key="product.id" class="product-card">
            <div class="product-image">
              <img v-if="product.image" :src="product.image" :alt="product.name" loading="lazy">
            </div>
            <div class="product-info">
              <h4>{{ product.name }}</h4>
              <p v-if="product.description" class="description">{{ product.description }}</p>
              <div v-if="product.price" class="price">{{ product.price }}€</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  products: {
    type: [Array, Object],
    default: () => ([])
  },
  routes: {
    type: Object,
    default: () => ({})
  }
})

const groupedProducts = computed(() => {
  if (Array.isArray(props.products)) {
    return { default: props.products }
  }
  return props.products
})

const categoryLabel = (category) => {
  const labels = {
    burgers: 'Smash Burgers',
    bagels: 'Bagels New-Yorkais',
    cheesecake: 'Cheesecake Factory',
    bowls: 'Healthy Bowls'
  }
  return labels[category] || category
}
</script>

<style scoped>
.product-grid-wrapper {
  width: 100%;
}

.products-container {
  display: flex;
  flex-direction: column;
  gap: 3rem;
}

.category-section {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.category-title {
  font-family: 'Lexend', sans-serif;
  font-size: 1.5rem;
  font-weight: 700;
  color: #F5C3DB;
  margin: 0;
}

.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 2rem;
}

.product-card {
  background: rgba(255, 255, 255, 0.05);
  border-radius: 1rem;
  overflow: hidden;
  border: 1px solid rgba(245, 195, 219, 0.15);
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
}

.product-card:hover {
  border-color: #F5C3DB;
  transform: translateY(-4px);
  background: rgba(255, 255, 255, 0.08);
}

.product-image {
  width: 100%;
  aspect-ratio: 1;
  overflow: hidden;
  background: rgba(0, 0, 0, 0.3);
}

.product-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.product-info {
  padding: 1.5rem;
  flex: 1;
  display: flex;
  flex-direction: column;
}

.product-info h4 {
  font-family: 'Lexend', sans-serif;
  font-size: 1.1rem;
  font-weight: 700;
  color: #fff;
  margin: 0 0 0.5rem;
}

.description {
  font-size: 0.9rem;
  color: #ccc;
  margin: 0 0 1rem;
  flex: 1;
}

.price {
  font-family: 'Lexend', sans-serif;
  font-size: 1.3rem;
  font-weight: 700;
  color: #F5C3DB;
}

.empty-state {
  text-align: center;
  padding: 3rem;
  color: #999;
}

@media (max-width: 768px) {
  .grid {
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 1.5rem;
  }
}
</style>
