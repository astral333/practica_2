<script>
export default {
    name: 'CreateLesson',
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import LessonForm from '@/Components/Lessons/Form.vue';
import { useForm } from '@inertiajs/vue3';
// Recibir los niveles como prop desde el controlador
const props = defineProps({
    levels: {
        type: Array,
        required: true
    },
    categories: {
        type: Array,
        required: true
    }
});
const form = useForm({
    name: '',
    description: '',
    image_uri: '',
    content_uri: '',
    pdf_uri: '',
    level_id: '',
    is_free: '',
});


const submit = () => {
    form.post(route('lessons.store'), {
        onSuccess: () => {
            form.reset();
        },
        onError: (errors) => {
            form.errors = errors;
        }
    });
};
</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Lesson
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <LessonForm
                        :form="form"
                        :levels="levels"
                        :categories="categories"
                        @submit="submit"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

