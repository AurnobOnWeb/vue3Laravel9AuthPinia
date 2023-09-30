<template>
   <div class="h-full w-full flex justify-center items-center">
    <div class="bg-white w-full md:w-[60%] lg:w-[40%] xl:w-[30%] h-auto md:my-20 md:h-auto shadow-md rounded-lg flex flex-col items-center">
        <img src="../Image/logo.svg" alt="" class="h-[70px] md:h-[50px] mt-5">
        <div class="flex flex-col w-full">
          <slot></slot>
        </div>
    </div>
</div>

</template>

<script setup>

</script>
