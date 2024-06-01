<template>
    <GuestLayout>
      <Head title="Register" />
  
      <div class="conr">
        <img
          class="fixed inset-0 w-full h-full object-cover filter brightness-60 z-0"
          src="https://i.pinimg.com/originals/0c/b4/a4/0cb4a41f382ab33acbf0dce0f28c024e.gif"
          alt="Background"
        />
      </div>
  
      <form @submit.prevent="submit" class="form-container">
        <div>
          <InputLabel for="name" value="Name" />
  
          <TextInput
            id="name"
            type="text"
            class="mt-1 block w-full"
            v-model="form.name"
            required
            autofocus
            autocomplete="name"
          />
  
          <InputError class="mt-2" :message="form.errors.name" />
        </div>
  
        <div class="mt-4">
          <InputLabel for="email" value="Email" />
  
          <TextInput
            id="email"
            type="email"
            class="mt-1 block w-full"
            v-model="form.email"
            required
            autocomplete="username"
          />
  
          <InputError class="mt-2" :message="form.errors.email" />
        </div>
  
        <div class="mt-4">
          <InputLabel for="password" value="Password" />
  
          <TextInput
            id="password"
            type="password"
            class="mt-1 block w-full"
            v-model="form.password"
            required
            autocomplete="new-password"
          />
  
          <InputError class="mt-2" :message="form.errors.password" />
        </div>
  
        <div class="mt-4">
          <InputLabel for="password_confirmation" value="Confirm Password" />
  
          <TextInput
            id="password_confirmation"
            type="password"
            class="mt-1 block w-full"
            v-model="form.password_confirmation"
            required
            autocomplete="new-password"
          />
  
          <InputError class="mt-2" :message="form.errors.password_confirmation" />
        </div>
  
        <div class="flex items-center justify-end mt-4">
          <Link
            :href="route('login')"
            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            Already registered?
          </Link>
  
          <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Register
          </PrimaryButton>
        </div>
      </form>
    </GuestLayout>
  </template>
  
  <script setup>
  import GuestLayout from '@/Layouts/GuestLayout.vue';
  import InputError from '@/Components/InputError.vue';
  import InputLabel from '@/Components/InputLabel.vue';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  import TextInput from '@/Components/TextInput.vue';
  import { Head, Link, useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  });
  
  const submit = () => {
    form.post(route('register'), {
      onFinish: () => form.reset('password', 'password_confirmation'),
    });
  };
  </script>
  
  <style scoped>
  .conr {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; /* Set the z-index to -1 to place it behind other elements */
  }
  
  .form-container {
    position: relative; /* Ensure the form stays on top of the background */
    z-index: 1; /* Set a higher z-index to ensure it's above the background */
  }
  </style>