import { createApp } from 'vue'
import FaqAccordion from './components/FaqAccordion.vue'

// Mount FAQ Accordion component if element exists
const faqContainer = document.getElementById('faq-accordion-app')
if (faqContainer) {
  const encodedFaqs = faqContainer.dataset.faqs
  const faqs = encodedFaqs ? JSON.parse(atob(encodedFaqs)) : []

  createApp({
    components: { FaqAccordion },
    template: '<FaqAccordion :faqs="faqs" />',
    data() {
      return { faqs }
    }
  }).mount(faqContainer)
}
