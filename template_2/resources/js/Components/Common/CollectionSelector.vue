<script setup>
import { ref } from "vue";

defineProps({
    //tenemos la coleccion uqe vamos  a recepcionar
    collection: {
        type: Array,
        required: true,
    },
});
const currentSelection = ref([]);
const selection = ref([]);
const emit = defineEmits(['on-categories']);

const handleAddSelection = (item) => {
    let alreadyExists = false;
    selection.value.forEach((item) => {
        if (!currentSelection.value || item.id === currentSelection.value.id) {
            alreadyExists = true;
            return;
        }
    });
    if (!alreadyExists) {
        selection.value.push(currentSelection.value);
        emit('on-categories', selection.value);
    }
};
const handleRemoveSelection = (index) => {
    selection.value = selection.value.filter((item) => item.id !== index);
    emit('of-categories', index);
};
</script>
<template>
    <div class="w-full">
        <div class="flex">
            <select
                @change="handleAddSelection"
                v-model="currentSelection"
                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            >
                <option value="" selected>Seleccione una opcion</option>
                <option
                    v-for="(item, index) in collection"
                    :value="item"
                    :key="index"
                >
                    {{ item?.name }}
                </option>
            </select>
            <button
                @click="handleAddSelection"
                class="bg-indigo-500 hover:bg-indigo-600 text-white rounded-md px-4 py-2 ml-2"
            >
                Add
            </button>
        </div>
        <div>
            <ul>
                <li
                    v-for="(item, index) in selection"
                    :key="index"
                    class="cursor-pointer bg-indigo-500 hover:bg-indigo-600 text-white rounded-md px-4 py-2 ml-1 mt-1 md-1"
                    @click="handleRemoveSelection(item.id)"
                >
                    {{ item?.name }}
                    <span
                        class="cursor-pointer float-right px-4 bg-red-500 hover:bg-red-600 text-white rounded-md"
                        >X</span
                    >
                </li>
            </ul>
        </div>
    </div>
</template>
