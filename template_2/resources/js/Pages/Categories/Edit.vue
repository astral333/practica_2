<script>
export default {
    name: 'CategoryEdit',
}
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CategoryForm from '@/Components/Categories/Form.vue';
import { useForm } from '@inertiajs/vue3';
const props = defineProps({
    category: Object,
    required: true,
});
const form = useForm({
    name: props.category.name,
    errors: {},
});

const submit = () => {
    form.put(route('categories.update', props.category.id), {
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
    <AppLayout title="Edit Category">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Category
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <CategoryForm :updating="true" :form="form" @submit="submit" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
