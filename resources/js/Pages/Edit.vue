<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineOptions({
    layout: MyLayout,
});

const props = defineProps({
    tasks: Object
});

const form = useForm({
    title: props.tasks.title,
    description: props.tasks.description,
    category: props.tasks.category,
    priority: props.tasks.priority,
    deadline: props.tasks.deadline,
});

const submit = () => {
    form.put(`/task/${props.tasks.id}`);
};
</script>

<template>
    <Head>
        <title>Edit Task</title>
    </Head>

    <div class="flex justify-center p-8 overflow-hidden">
        <div class="w-full max-w-md">
            <h1 class="text-4xl my-10 text-center">Edit Task</h1>

            <div class="border p-10 rounded item flex flex-col items-center slideBottomToTop">
                <form @submit.prevent="submit" class="w-full">
                    <div class="mb-4 w-full flex flex-col items-center">
                        <label class="mb-2">Title:</label>
                        <input class="w-3/4 rounded-md py-2 px-3" v-model="form.title" type="text">
                    </div>
                    <div class="mb-4 w-full flex flex-col items-center">
                        <label class="mb-2">Description:</label>
                        <textarea class="w-3/4 rounded-md py-2 px-3" v-model="form.description" rows="4"></textarea>
                    </div>
                    <div class="mb-4 w-full flex flex-col items-center">
                        <label class="mb-2">Category:</label>
                        <input class="w-3/4 rounded-md py-2 px-3" v-model="form.category" type="text">
                    </div>
                    <div class="mb-4 w-full flex flex-col items-center">
                        <label class="mb-2">Priority:</label>
                        <select class="w-3/4 rounded-md py-2 px-3" v-model="form.priority">
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
                        <Link :href="`/task/${props.tasks.id}`" class="btn m-2 px-3 py-2 rounded text-white bold bg-gray-400">Back</Link>
                        <button type="submit" class="btn m-2 px-3 py-2 rounded text-white bg-green-700">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
