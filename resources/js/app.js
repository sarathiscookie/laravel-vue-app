require('./bootstrap');

import router from './routes';
import VueRouter from 'vue-router';

window.Vue = require('vue').default;

Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('contact-component', require('./components/ContactComponent.vue'));

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router
});