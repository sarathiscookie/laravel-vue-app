require('./bootstrap');

import router from './routes';
import Index from './Index';
import VueRouter from 'vue-router';
import StarRating from './shared/components/StarRating';
import Vue from 'vue';

window.Vue = require('vue').default;

Vue.use(VueRouter);

Vue.component("star-rating", StarRating);

const app = new Vue({
    el: '#app',
    router,
    components: {
        index: Index // OR Index. Not need key. 
    }
});