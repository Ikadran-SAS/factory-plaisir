<template>
  <div class="faq-vue">
    <!-- Barre de recherche -->
    <div class="faq-search">
      <input
        v-model="searchQuery"
        type="search"
        placeholder="Rechercher une question…"
        class="faq-search-input"
        aria-label="Rechercher dans la FAQ"
      />
    </div>

    <!-- Catégories -->
    <div v-if="!searchQuery">
      <div
        v-for="(items, category) in faqs"
        :key="category"
        class="faq-category"
      >
        <h2 class="faq-category-title">
          {{ items[0].category_icon }} {{ items[0].category_label }}
        </h2>
        <div class="faq-items">
          <div
            v-for="item in items"
            :key="item.id"
            class="faq-item"
            :class="{ 'faq-item--open': openItem === item.id }"
          >
            <button
              class="faq-question"
              @click="toggle(item.id)"
              :aria-expanded="openItem === item.id"
            >
              <span>{{ item.question }}</span>
              <svg class="faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
            <transition name="faq-expand">
              <div
                v-show="openItem === item.id"
                class="faq-answer"
                v-html="item.answer"
              ></div>
            </transition>
          </div>
        </div>
      </div>
    </div>

    <!-- Résultats de recherche -->
    <div v-else>
      <div v-if="searchResults.length" class="faq-items">
        <div
          v-for="item in searchResults"
          :key="item.id"
          class="faq-item"
          :class="{ 'faq-item--open': openItem === item.id }"
        >
          <button class="faq-question" @click="toggle(item.id)" :aria-expanded="openItem === item.id">
            <span>{{ item.question }}</span>
            <svg class="faq-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <transition name="faq-expand">
            <div v-show="openItem === item.id" class="faq-answer" v-html="item.answer"></div>
          </transition>
        </div>
      </div>
      <div v-else class="faq-no-results">
        <p>Aucune question ne correspond à votre recherche. <a href="/contact">Contactez-nous directement</a>.</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FaqAccordion',
  props: {
    faqs: {
      type: Object,
      default: () => ({})
    }
  },
  data() {
    return {
      openItem: null,
      searchQuery: ''
    }
  },
  computed: {
    allItems() {
      return Object.values(this.faqs).flat()
    },
    searchResults() {
      const q = this.searchQuery.toLowerCase()
      return this.allItems.filter(item =>
        item.question.toLowerCase().includes(q) ||
        item.answer.toLowerCase().includes(q)
      )
    }
  },
  methods: {
    toggle(id) {
      this.openItem = this.openItem === id ? null : id
    }
  }
}
</script>
