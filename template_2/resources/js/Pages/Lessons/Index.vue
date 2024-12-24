<script>
export default {
    name: 'LessonsIndex',
}
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
defineProps({
    lessons: {
        type: Object,
        required: true,
    },
})
const form = useForm({});
const deleteLesson = (id) => {
    if (confirm('Are you sure you want to delete this lessons?')) {
        form.delete(route('lessons.destroy', id), {
            onSuccess: () => {
                form.reset();
            },
            onError: (errors) => {
                form.errors = errors;
            }
        });
    }
}
</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800">Lessons</h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between">
                            <Link :href="route('lessons.create')" class="text-white bg-indigo-500 hover:bg-indigo-600 font-bold py-2 px-4 rounded-md" v-if="$page.props.user.permissions.some(permission => permission.name === 'create lessons')">
                                Create Lesson
                            </Link>
                        </div>
                        <div class="mt-4">
                            <ul role="list" class="divide-y divide-gray-100">
                                <li class="flex justify-between gap-x-6 py-5" v-for="lesson in lessons.data" :key="lesson.id">
                                    <div class="flex min-w-0 gap-x-4">
                                        <div class="min-w-0 flex-auto">
                                            <p class="text-md/6 font-semibold text-gray-900">{{ lesson.name }}</p>
                                        </div>
                                    </div>
                                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                        <div class="flex space-x-2">
                                            <Link :href="route('lessons.edit', lesson.id)" class="px-4 bg-indigo-500 hover:bg-indigo-600 text-white rounded-md"  v-if="$page.props.user.permissions.some(permission => permission.name === 'edit lessons')">Edit</Link>
                                            <Link @click="deleteLesson(lesson.id)" class="px-4 bg-red-500 hover:bg-red-600 text-white rounded-md" v-if="$page.props.user.permissions.some(permission => permission.name === 'delete lessons')">Delete</Link>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="flex justify-between mt-4">
                            <Link v-if="lessons.prev_page_url" :href="lessons.prev_page_url" class="py-2 px-4 rounded-md">
                                PREV
                            </Link>
                            <Link v-if="lessons.next_page_url" :href="lessons.next_page_url" class="py-2 px-4 rounded-md">
                                NEXT
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
    </AppLayout>
</template>
