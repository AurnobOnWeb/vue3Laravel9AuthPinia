<template>
  <div class="flex justify-between items-center header h-20 w-full bg-white shadow-lg rounded-br-2xl rounded-bl-2xl">

    <!-- Logo/Home Link -->
    <div class="m-4 md:m-10 font-semibold text-2xl hover:text-green-400 transition-colors duration-200">
      <router-link :to="{ name: 'Home' }">Home</router-link>
    </div>

    <!-- Navigation Links -->
    <div class="hidden md:flex space-x-4 m-4 md:m-10 font-semibold text-2xl">
      <template v-if="token === 0">
        <router-link :to="{ name: 'Login' }" class="hover:text-green-400 transition-colors duration-200">Login</router-link>
        <router-link :to="{ name: 'Register' }" class="hover:text-green-400 transition-colors duration-200">Register</router-link>
      </template>
      <template v-else>
        <router-link :to="{ name: 'Dashboard' }" class="hover:text-green-400 transition-colors duration-200">Dashboard</router-link>
        <button @click="logout" class="hover:text-green-400 transition-colors duration-200" type="button">Logout</button>
      </template>
    </div>

    <!-- Mobile Navigation (Hamburger Menu) -->
    <div class="md:hidden flex items-center">
      <button @click="toggleMobileMenu" class="p-2 text-gray-600 hover:text-green-400 transition-colors duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>

    <!-- Mobile Navigation Menu (Hidden by default) -->
    <div v-if="mobileMenuOpen" class="md:hidden absolute top-20 left-0 w-full bg-white shadow-lg">
      <div class="flex flex-col items-center space-y-4 p-4">
        <router-link v-if="token === 0" :to="{ name: 'Login' }" class="hover:text-green-400 transition-colors duration-200">Login</router-link>
        <router-link v-if="token === 0" :to="{ name: 'Register' }" class="hover:text-green-400 transition-colors duration-200">Register</router-link>
        <router-link v-else :to="{ name: 'Dashboard' }" class="hover:text-green-400 transition-colors duration-200">Dashboard</router-link>
        <button v-else @click="logout" class="hover:text-green-400 transition-colors duration-200" type="button">Logout</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      mobileMenuOpen: false,
    };
  },
  methods: {
    toggleMobileMenu() {
      this.mobileMenuOpen = !this.mobileMenuOpen;
    },
    logout() {
      // Implement your logout logic here
    },
  },
};
</script>
<script setup>
import { useRouter } from 'vue-router'
import { userStore } from '../store/userStore'
import { mapState } from 'pinia'
import { ref, computed } from 'vue'

const store = userStore()
const router = useRouter()
const token = computed(() => store.token)

function logout() {
  store.removeToken()
  router.push({ name: 'Home' })
}
</script>
