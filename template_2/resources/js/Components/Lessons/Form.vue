<script>
export default {
    name: "LessonForm",
};
</script>
<script setup>
import { ref } from "vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import CollectionSelector from "@/Components/Common/CollectionSelector.vue";
const form = useForm({
    name: "",
    description: "",
    image_uri: "",
    content_uri: "",
    pdf_uri: "",
    level_id: "",
    is_free: "",
});
defineProps({
    form: {
        type: Object,
        required: true,
    },
    updating: {
        type: Boolean,
        required: false,
        default: false,
    },
    levels: {
        type: Array,
        required: true,
        default: () => [],
    },
    categories: {
        type: Array,
        required: true,
        default: () => [],
    },
});
const categoriesSelected = ref([]);
const onCategories = (categories) => {
    categoriesSelected.value = categories;
};
const ofCategories = (categories) => {
    // console.log("ofCategories", categories);
    categoriesSelected.value = categoriesSelected.value.filter(category => category.id !== categories);
};
defineEmits(["submit"]);
</script>
<template>
    <FormSection @submit="$emit('submit')">
        <template #title>
            {{ updating ? "Update" : "Create" }}
        </template>
        <template #description>
            {{
                updating
                    ? "Edit the lesson details below."
                    : "Add a new lesson to the system."
            }}
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                />
                <InputError :message="$page.props.errors.name" class="mt-2" />
                <br />
                <InputLabel for="description" value="Description" />
                <TextInput
                    id="description"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.description"
                />
                <InputError
                    :message="$page.props.errors.description"
                    class="mt-2"
                />
                <br />
                <InputLabel for="image_uri" value="Image" />
                <TextInput
                    id="image_uri"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.image_uri"
                />
                <InputError
                    :message="$page.props.errors.image_uri"
                    class="mt-2"
                />
                <br />
                <InputLabel for="content_uri" value="Content" />
                <TextInput
                    id="content_uri"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.content_uri"
                />
                <InputError
                    :message="$page.props.errors.content_uri"
                    class="mt-2"
                />
                <br />
                <SecondaryButton
                    class="mt-2"
                    mr-2
                    type="button"
                    @click="addContent"
                    >Add Pdf</SecondaryButton
                >
                <br />
                <InputLabel for="pdf_uri" value="Pdf" />
                <TextInput
                    id="pdf_uri"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.pdf_uri"
                />
                <InputError
                    :message="$page.props.errors.pdf_uri"
                    class="mt-2"
                />
                <br />
                <div class="w-full mt-6">
                    <div class="flex">
                        <div class="w-1/2 mr-1">
                            <InputLabel for="level_id" value="Level" />
                            <select
                                name="level_id"
                                v-model="form.level_id"
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            >
                                <option value="" selected>
                                    Seleccione un nivel
                                </option>
                                <option
                                    v-for="level in levels"
                                    :value="level.id"
                                    :key="level.id"
                                >
                                    {{ level.name }}
                                </option>
                            </select>
                            <InputError
                                :message="$page.props.errors.level_id"
                                class="mt-2"
                            />
                        </div>
                        <div class="w-1/2 ml-1">
                            <InputLabel for="categories" value="Category" />
                            <CollectionSelector
                                name="categories"
                                id="categories"
                                :collection="categories"
                                @on-categories="onCategories"
                                @of-categories="ofCategories"
                            />
                            <!-- https://youtu.be/eE8iBHQlexU?t=2925 -->
                            <InputError
                                :message="$page.props.errors.category_id"
                                class="mt-2"
                            />
                        </div>
                    </div>
                </div>
                <br />
                <InputLabel for="is_free" value="Is Free" />
                <TextInput
                    id="is_free"
                    type="checkbox"
                    class="mt-1 block w-full"
                    v-model="form.is_free"
                />
                <InputError
                    :message="$page.props.errors.is_free"
                    class="mt-2"
                />
            </div>
        </template>
        <template #actions>
            <PrimaryButton :disabled="form.processing">
                {{ updating ? "Update" : "Create" }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
