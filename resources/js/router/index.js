import {createRouter ,createWebHistory} from 'vue-router'
import Home from '../pages/Home.vue'
import Login from '../pages/Login.vue'
import Register from '../pages/Register.vue'
import Dashboard from '../pages/Dashboard.vue'

import {userStore} from '../store/userStore'


const routes =[
    {
        path: '/',
        name : 'Home',
        component:Home
    },
    {
        path: '/login',
        name : 'Login',
        component:Login,
        meta:{
            requiresAuth:false
        }
    },
    {
        path: '/register',
        name : 'Register',
        component:Register,
        meta:{
            requiresAuth:false
        }
    },
    {
        path: '/dashboard',
        name : 'Dashboard',
        component:Dashboard,
        meta:{
            requiresAuth:true
        }
    }

];

const router = createRouter({
    history:createWebHistory(),
    routes
});
router.beforeEach((to,from) => {
    const store =userStore();
    if(to.meta.requiresAuth && store.token == 0){
        return {name :'Login'}
    }
    if(to.meta.requiresAuth==false && store.token !=0){
        return {name :'Dashboard'}
    }
})
export default router;

