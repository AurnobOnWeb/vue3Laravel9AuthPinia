import './bootstrap';


import { createApp } from 'vue';
import { createPinia } from 'pinia'
import  App  from './layouts/App.vue';
import router from './router';
const pinia = createPinia()
const app = createApp(App)

app.use(router)
app.use(pinia)
app.mount('#app')