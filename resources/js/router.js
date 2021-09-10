import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import SingleRestaurant from './pages/SingleRestaurant';
import NotFound from './pages/NotFound';
import Payment from './pages/Payment';



const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/restaurant/:slug',
            name: 'single-restaurant',
            component: SingleRestaurant
        },
        {
            path: '/restaurant/:slug/payment',
            name: 'payment',
            component: Payment
        },
        {
            path: '*',
            name: 'not-found',
            component: NotFound
        }
    ]
});

export default router;