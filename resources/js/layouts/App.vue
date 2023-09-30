<template>
    <div class="flex flex-col h-screen justify-between">
        <Header></Header>


       <RouterView  v-slot="{Component}">
        <Transition name="slide-fade" mode="out-in">
            <component :is="Component"></component>
        </Transition>
       </RouterView>


       <Footer></Footer>
    </div>
</template>

<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";

</script>
<style >
slide-up-enter-active,
.slide-fade-enter-active,
.slide-fade-leave-active {
  transition: 400ms ease all;
}


.slide-fade-enter-from,
.slide-fade-leave-to {
  opacity: 0;
  transform: translateY(60px);
}
</style>