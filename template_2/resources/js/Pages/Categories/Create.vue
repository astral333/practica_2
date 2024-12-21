<script>
export default {
    name: 'CreateCategory',
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import CategoryForm from '@/Components/Categories/Form.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    errors: {},
});

const submit = () => {
    form.post(route('categories.store'), {
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
                Create Category
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <CategoryForm
                        :form="form"
                        @submit="submit"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

