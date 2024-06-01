<template>
    <GuestLayout>
      <Head title="Log in" />
  
      <img
        class="fixed inset-0 w-full h-full object-cover filter brightness-60 z-0"
        src="https://i.pinimg.com/originals/0c/b4/a4/0cb4a41f382ab33acbf0dce0f28c024e.gif"
        alt="Background"
      />
        <div class="cons">
      <div class="relative z-10 flex flex-col items-center justify-center min-h-screen">
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
          {{ status }}
        </div>
  
        <form @submit.prevent="submit" class="w-full max-w-md p-6 bg-white shadow-md rounded-md z-10 mt-24">
          <!-- Added mt-24 for top margin -->
          <div>
            <InputLabel for="email" value="Email" />
  
            <TextInput
              id="email"
              type="email"
              class="mt-1 block w-full"
              v-model="form.email"
              required
              autofocus
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
              autocomplete="current-password"
            />
  
            <InputError class="mt-2" :message="form.errors.password" />
          </div>
  
          <div class="block mt-4">
            <label class="flex items-center">
              <Checkbox name="remember" v-model:checked="form.remember" />
              <span class="ms-2 text-sm text-gray-600">Remember me</span>
            </label>
          </div>
  
          <div class="flex items-center justify-between mt-4">
            <Link
              v-if="canResetPassword"
              :href="route('password.request')"
              class="underline text-sm text-gray-600 hover:text-gray-900"
            >
              Forgot your password?
            </Link>
  
            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Log in
            </PrimaryButton>
          </div>
        </form>
      </div>
    </div>
    </GuestLayout>
  </template>
  
  <script setup>
  import Checkbox from '@/Components/Checkbox.vue';
  import GuestLayout from '@/Layouts/GuestLayout.vue';
  import InputError from '@/Components/InputError.vue';
  import InputLabel from '@/Components/InputLabel.vue';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  import TextInput from '@/Components/TextInput.vue';
  import { Head, Link, useForm } from '@inertiajs/vue3';
  
  defineProps({
    canResetPassword: Boolean,
    status: String,
  });
  
  const form = useForm({
    email: '',
    password: '',
    remember: false,
  });
  
  const submit = () => {
    form.post(route('login'), {
      onFinish: () => form.reset('password'),
    });
  };
  </script>
  
  <style scoped>
  .cons{
    margin-top: -140px;
  }
  </style>
  