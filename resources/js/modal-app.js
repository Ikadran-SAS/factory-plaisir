import { createApp, ref } from 'vue'
import NavigationModal from './components/NavigationModal.vue'

// Create a separate app for the navigation modal
const app = createApp({
  setup() {
    const isNavigationModalOpen = ref(false)
    
    const openNavigationModal = () => {
      isNavigationModalOpen.value = true
    }
    
    const closeNavigationModal = () => {
      isNavigationModalOpen.value = false
    }
    
    // Expose to window for Blade templates
    window.factoryCoNav = {
      openNavigationModal,
      closeNavigationModal,
    }
    
    return {
      isNavigationModalOpen,
      closeNavigationModal,
    }
  },
  components: {
    NavigationModal,
  },
  template: '<navigation-modal :is-open="isNavigationModalOpen" @close="closeNavigationModal" />',
})

app.mount('#modal-app')
