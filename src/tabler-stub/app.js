import Vue from 'vue';
import VueRouter from 'vue-router';

import Routes from './routes';

require('./bootstrap');

Vue.use(VueRouter);

const router = new VueRouter({
    routes: Routes,
    mode: 'history',
});

const app = new Vue({
    el: '#app',
    router
});
