<script setup>
import { ref } from 'vue';
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

defineOptions({
  layout: MyLayout
});

const { props } = usePage();
const userName = ref(props.userName || 'Anonymous User');
</script>

<template>
  <div class="background-container">
    <div class="welcome-message">
        <br><br><br><br><br><br><br>
        <h1>Welcome{{ userName ? ', ' + userName : '' }}!</h1>
        <p>This is your homepage. Enjoy your stay!</p>
    </div>
  </div>
</template>

<style scoped>
.background-container {
  position: absolute;
  top: -120px;
  left: 0;
  width: 100%;
  height: 100vh; /* Use viewport height to cover the entire viewport */
  background-image: url('https://blog-assets.freshworks.com/freshsales-crm/wp-content/uploads/2020/06/12212656/time-management-banner.gif');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
.welcome-message {
  position: relative; /* Ensure the content stays on top of the background */
  text-align: center;
  margin-top: 50px;
  font-family: 'Roboto', sans-serif;
  color: rgb(14, 14, 14); /* Adjust text color for visibility */
}

.welcome-message h1 {
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 20px;
}

.welcome-message p {
  font-size: 1.2rem;
  color: #666;
}

.fadeIn {
  animation: fadeIn 2s;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
</style>
