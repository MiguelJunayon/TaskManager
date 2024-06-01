<template>
  <div>
    <Head>
      <title>Create Task</title>
    </Head>
    <div class="cont">
    <div class="flex justify-center p-8 overflow-hidden">
      <div class="w-full max-w-md form-container"> <!-- Custom class applied -->
        <h1 class="text-4xl my-10 text-center">Create New Task</h1>

        <div class="border p-10 rounded item flex flex-col items-center slideBottomToTop">
          <form @submit.prevent="submit" class="w-full">
            <div class="mb-4 w-full flex flex-col items-center">
              <label class="mb-2">Title:</label>
              <input class="w-3/4 rounded-md py-2 px-3" v-model="form.title" type="text">
            </div>
            <div class="mb-4 w-full flex flex-col items-center">
              <label class="mb-2">Description:</label>
              <textarea class="w-3/4 rounded-md py-2 px-3" v-model="form.description"></textarea>
            </div>
            <div class="mb-4 w-full flex flex-col items-center">
              <label class="mb-2">Category:</label>
              <textarea class="w-3/4 rounded-md py-2 px-3" v-model="form.category"></textarea>
            </div>
            <div class="mb-4 w-full flex flex-col items-center">
              <label class="mb-2">Priority:</label>
              <select class="w-3/4 rounded-md py-2 px-3" v-model="form.priority">
                <option disabled value="">Select a priority</option>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
              </select>
            </div>
            <div class="mb-4 w-full flex flex-col items-center">
              <label class="mb-2">Deadline:</label>
              <input class="w-3/4 rounded-md py-2 px-3" v-model="form.deadline" type="date">
            </div>

            <div class="w-full flex justify-center">
              <Link href="/task" class="btn m-2 px-3 py-2 rounded text-white bold bg-gray-400">Back</Link>
              <button type="submit" class="btn m-2 px-3 py-2 rounded text-white bg-green-700">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3';

defineOptions({
    layout: MyLayout
});

const form = useForm({
  title: '',
  description: '',
  category: '',
  priority: '',
  deadline: ''
});

const submit = () => {
  form.post('/task/create');
};
</script>

<style scoped>
/* Custom margin-top for the form container */
.cont {
  margin-top:-160px; /* Adjust this value as needed */
}
</style>

