require('./bootstrap');

import router from './routes';
import Index from './Index';
import VueRouter from 'vue-router';

window.Vue = require('vue').default;

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router,
    components: {
        index: Index // OR Index. Not need key. 
    }
});