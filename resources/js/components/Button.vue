<template>
     <div class="mx-[10%] mt-4 mb-10 md:mb-10">
                <button type="submit" class="group relative h-12 w-full md:w-[48%] overflow-hidden rounded-lg bg-white text-lg shadow">
                    <div class="absolute inset-0 w-3 bg-green-400 transition-all duration-550 ease-out group-hover:w-full"></div>
                    <span class="relative text-black group-hover:text-white font-semibold"><slot></slot></span>
                </button>
        </div>
</template>

<script setup>

</script>
