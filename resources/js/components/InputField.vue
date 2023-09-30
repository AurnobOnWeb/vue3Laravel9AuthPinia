<template>
<form @submit.prevent="login">
    <div class="mx-[5%] md:mx-[10%] mt-4">
        <label :for="id" class="block mb-2 text-sm font-medium">{{
            label
        }}</label>
        <input
            :id="id"
            :type="type"
            class="bg-green-50 border  border-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:border-green-500"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :placeholder="ph"
            required
        />
        <p class="hidden mt-2 text-sm text-green-600 dark:text-green-500">
            <span class="font-medium">Well done!</span> Some success message.
        </p>
    </div>
</form>
</template>

<script setup>
const props = defineProps({
    label: String,
    type: String,
    ph: String,
    id:String,
    modelValue:String
});

defineEmits(['update:modelValue'])
</script>
