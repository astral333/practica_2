<script>
export default {
    name: "CategoriesIndex",
};
</script>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
defineProps({
    categories: {
        type: Object,
        required: true,
    },
});
const form = useForm({});
const deleteCategory = (id) => {
    console.log(id);
    if (confirm("Are you sure you want to delete this category?")) {
        form.delete(route("categories.destroy", id), {
            onSuccess: () => {
                form.reset();
            },
            onError: (errors) => {
                form.errors = errors;
            },
        });
    }
};
</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800">
                Categories
            </h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <Link
                            :href="route('categories.create')"
                            class="text-white bg-indigo-500 hover:bg-indigo-600 font-bold py-2 px-4 rounded-md"
                            v-if="
                                $page.props.user.permissions.some(
                                    (permission) =>
                                        permission.name === 'create categories'
                                )
                            "
                        >
                            Create Category
                        </Link>
                    </div>
                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-gray-100">
                            <li
                                class="flex justify-between gap-x-6 py-5"
                                v-for="category in categories.data"
                                :key="category.id"
                            >
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p
                                            class="text-md/6 font-semibold text-gray-900"
                                        >
                                            {{ category.name }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="hidden shrink-0 sm:flex sm:flex-col sm:items-end"
                                >
                                    <div class="flex space-x-2">
                                        <Link
                                            :href="
                                                route(
                                                    'categories.edit',
                                                    category.id
                                                )
                                            "
                                            class="px-4 bg-indigo-500 hover:bg-indigo-600 text-white rounded-md"
                                            v-if="
                                                $page.props.user.permissions.some(
                                                    (permission) =>
                                                        permission.name ===
                                                        'edit categories'
                                                )
                                            "
                                            >Edit</Link
                                        >
                                        <Link
                                            @click="deleteCategory(category.id)"
                                            class="px-4 bg-red-500 hover:bg-red-600 text-white rounded-md"
                                            v-if="
                                                $page.props.user.permissions.some(
                                                    (permission) =>
                                                        permission.name ===
                                                        'delete categories'
                                                )
                                            "
                                            >Delete</Link
                                        >
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="flex justify-between mt-4">
                        <Link
                            v-if="categories.prev_page_url"
                            :href="categories.prev_page_url"
                            class="py-2 px-4 rounded-md"
                        >
                            PREV
                        </Link>
                        <Link
                            v-if="categories.next_page_url"
                            :href="categories.next_page_url"
                            class="py-2 px-4 rounded-md"
                        >
                            NEXT
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
