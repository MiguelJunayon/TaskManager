<template>
    <div class="min-h-screen bg-gray-100 text-white dark:bg-gray-800 dark:text-gray-200 flex justify-center items-center relative">
      <img
        id="background"
        class="absolute top-0 left-0 w-full h-full bg-cover bg-center z-0"
        src="https://i.pinimg.com/originals/0c/b4/a4/0cb4a41f382ab33acbf0dce0f28c024e.gif"
        style="filter: brightness(60%);"
        alt="Background"
      />
      <div class="z-10 relative flex flex-col items-center">
        <header class="px-8 py-6 w-full flex justify-center items-center flex-col">
          <div class="text-center mb-4">
            <h1 class="text-3xl font-bold text-pink-600">Welcome!</h1>
            <p class="text-sm text-white-600">Please log in or create an account.</p>
          </div>
          <nav v-if="canLogin || canRegister" class="space-x-4">
            <Link v-if="canLogin" :href="route('login')" class="btn btn-gray">Log in</Link>
            <Link v-if="canRegister" :href="route('register')" class="btn btn-gray">Register</Link>
          </nav>
        </header>
  
        <main class="px-8 py-12 text-center">
          <p class="text-lg">You're about to enter a world of wonders!</p>
        </main>
      </div>
    </div>
  </template>
  
  <script setup>
  import { Head, Link } from '@inertiajs/vue3';
  
  defineProps({
      canLogin: Boolean,
      canRegister: Boolean,
      laravelVersion: {
          type: String,
          required: true,
      },
      phpVersion: {
          type: String,
          required: true,
      },
  });
  
  function handleImageError() {
      const screenshotContainer = document.getElementById('screenshot-container');
      const docsCard = document.getElementById('docs-card');
      const docsCardContent = document.getElementById('docs-card-content');
      const background = document.getElementById('background');
  
      if (screenshotContainer) screenshotContainer.classList.add('!hidden');
      if (docsCard) docsCard.classList.add('!row-span-1');
      if (docsCardContent) docsCardContent.classList.add('!flex-row');
      if (background) background.classList.add('!hidden');
  }
  </script>
  
  <style scoped>
  /* Add your scoped styles here */
  </style>
  