<template>
  <div class="reviews-carousel-wrapper">
    <div v-if="!reviews || reviews.length === 0" class="empty-state">
      <p>Aucun avis disponible</p>
    </div>
    <div v-else class="carousel-container">
      <div class="reviews-grid">
        <div v-for="review in reviews" :key="review.id" class="review-card">
          <div class="review-rating">
            <span class="stars">{{ renderStars(review.rating) }}</span>
            <span class="rating-value">{{ review.rating }}/5</span>
          </div>
          <p class="review-text">{{ review.text }}</p>
          <div class="review-author">
            <img v-if="review.avatar" :src="review.avatar" :alt="review.author" class="avatar">
            <div class="author-info">
              <h4>{{ review.author }}</h4>
              <p class="source">{{ review.source || 'Google' }}</p>
            </div>
          </div>
        </div>
      </div>
      <div v-if="aggregateRating" class="reviews-summary">
        <div class="summary-stat">
          <span class="summary-rating">{{ aggregateRating }}</span>
          <span class="summary-stars">★★★★★</span>
        </div>
        <p class="summary-count">{{ reviewCount }} avis clients</p>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  reviews: {
    type: Array,
    default: () => ([])
  },
  aggregateRating: {
    type: [String, Number],
    default: null
  },
  reviewCount: {
    type: [String, Number],
    default: 0
  }
})

const renderStars = (rating) => {
  const fullStars = Math.floor(rating)
  const hasHalf = rating % 1 !== 0
  let stars = '★'.repeat(fullStars)
  if (hasHalf) stars += '½'
  return stars
}
</script>

<style scoped>
.reviews-carousel-wrapper {
  width: 100%;
}

.carousel-container {
  display: flex;
  gap: 3rem;
  align-items: flex-start;
}

.reviews-grid {
  flex: 1;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
}

.review-card {
  background: rgba(255, 255, 255, 0.05);
  border-radius: 1rem;
  padding: 2rem;
  border: 1px solid rgba(245, 195, 219, 0.15);
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.review-card:hover {
  border-color: #F5C3DB;
  background: rgba(255, 255, 255, 0.08);
}

.review-rating {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.stars {
  color: #F5C3DB;
  font-size: 1.1rem;
}

.rating-value {
  color: #999;
  font-size: 0.9rem;
}

.review-text {
  color: #ddd;
  font-size: 1rem;
  line-height: 1.6;
  margin: 0;
  flex: 1;
}

.review-author {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-top: 0.5rem;
}

.avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
}

.author-info {
  display: flex;
  flex-direction: column;
}

.author-info h4 {
  font-family: 'Lexend', sans-serif;
  font-size: 0.95rem;
  font-weight: 600;
  color: #fff;
  margin: 0;
}

.source {
  font-size: 0.8rem;
  color: #999;
  margin: 0;
}

.reviews-summary {
  flex-shrink: 0;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 1rem;
  padding: 2rem;
  border: 1px solid rgba(245, 195, 219, 0.15);
  text-align: center;
  min-width: 200px;
}

.summary-stat {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.5rem;
  margin-bottom: 1rem;
}

.summary-rating {
  font-family: 'Lexend', sans-serif;
  font-size: 2.5rem;
  font-weight: 700;
  color: #fff;
}

.summary-stars {
  color: #F5C3DB;
  font-size: 1.2rem;
}

.summary-count {
  font-size: 0.95rem;
  color: #ccc;
  margin: 0;
}

.empty-state {
  text-align: center;
  padding: 3rem;
  color: #999;
}

@media (max-width: 1024px) {
  .carousel-container {
    flex-direction: column;
  }
  
  .reviews-summary {
    min-width: 100%;
  }
}
</style>
