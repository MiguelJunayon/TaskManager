<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link, useForm } from "@inertiajs/vue3";

defineOptions({
    layout: MyLayout,
});

const props = defineProps({
    tasks: Array,
});

const form = useForm({
    title: props.tasks.title,
    description: props.tasks.description,
    priority: props.tasks.priority,
    deadline: props.tasks.deadline
});

const deleteTask = (task) => {
    const del = confirm("Are you sure you want to delete?");
    if (del) {
        form.delete(`/task/${task.id}`, {
            preserveScroll: true
        }).then(() => {
            // Handle success or other actions after deletion
        });
    }
};

const getPriorityClass = (priority) => {
    switch (priority.toLowerCase()) {
        case 'low':
            return 'text-green-500';
        case 'medium':
            return 'text-yellow-500';
        case 'high':
            return 'text-red-500';
        default:
            return '';
    }
};
</script>

<template>
  <br>
  <Head>
    <title>My Tasks</title>
  </Head>

  <div class="fadeIn mx-[5rem] my-[2rem] relative">
    <div class="fixed top-[4rem] left-[4rem] right-[4rem] z-50 flex items-center bg-white p-5 justify-between shadow">
      <p class="text-2xl font-bold mx-2 text-gray-800">Tasks</p>
<br><br><br><br><br><br><br><br><br><br>
      <Link href='/task/create' class="bg-blue-500 text-white rounded font-bold p-2 hover:bg-blue-600">
        Add Tasks
      </Link>
    </div>
  </div>

  <div class="mt-[9rem] bg-gray-100 p-6 rounded-lg shadow-lg">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
      <div
        v-for="(task, index) in tasks"
        :key="task.id"
        class="border p-4 bg-white rounded shadow cardSlide transition-all hover:shadow-lg hover:scale-105"
        :class="{ 'slide-in-right': index === tasks.length - 1 }"
        :style="`animation-delay: ${index * 0.1}s;`"
      >
        <p class="text-lg font-semibold text-gray-800">Title: {{ task.title }}</p>
        <p :class="`text-md ${getPriorityClass(task.priority)}`"><b>Priority:</b> {{ task.priority }}</p>
        <p class="text-md text-gray-600">Description: {{ task.description }}</p>
        <p class="text-md text-gray-600">Category: {{ task.category }}</p>
        <p class="text-md text-gray-600">Deadline: {{ task.deadline }}</p>
        <div class="flex items-center justify-between">
          <button @click="deleteTask(task)" class="bg-red-400 hover:bg-red-500 text-white rounded py-2 px-3 mr-2 text-center">
            Delete
          </button>
          <Link :href="`/task/${task.id}/edit`" class="bg-green-400 hover:bg-green-500 text-white rounded py-2.5 px-3 text-center">
            Edit
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.bg-blue-500 {
  background-color: #42a5f5; /* Primary blue color */
}
.bg-blue-600 {
  background-color: #1e88e5; /* Darker blue for hover */
}
.text-gray-800 {
  color: #2d3748; /* Dark gray for main text */
}
.text-gray-600 {
  color: #718096; /* Medium gray for secondary text */
}
.bg-gray-100 {
  background-color: #f7fafc; /* Light gray background for main content */
}
.shadow {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Light shadow for elements */
}
.slide-in-right {
  animation: slide-in-right 0.5s ease-out;
}
@keyframes slide-in-right {
  0% {
    opacity: 0;
    transform: translateX(-100%);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}
.hover\:shadow-lg:hover {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.hover\:scale-105:hover {
  transform: scale(1.05);
}
</style>
