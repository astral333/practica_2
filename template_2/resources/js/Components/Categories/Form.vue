<script>
export default {
    name: 'CategoryForm',
}
</script>
<script setup>
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    form:{
        type: Object,
        required: true,
    },
    updating: {
        type: Boolean,
        required: false,
        default: false,
    },
});
defineEmits(['submit']);
</script>
<template>
    <FormSection @submit="$emit('submit')">
        <template #title>
           {{updating ? 'Update Category' : 'Create Category'}}
        </template>
        <template #description>
            {{updating ? 'Edit the category details below.' : 'Add a new category to the system.'}}
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Name" />
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>
        </template>
        <template #actions>
            <PrimaryButton :disabled="form.processing">
                {{updating ? 'Update' : 'Create'}}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
