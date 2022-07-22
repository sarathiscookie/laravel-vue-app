import VueRouter from 'vue-router';
import HomeComponent from './components/HomeComponent';
import ContactComponent from './components/ContactComponent';
import Bookables from './bookables/Bookables';

const routes = [
    { path: '/', component: Bookables, name: 'home' },
    { path: '/contact', component: ContactComponent, name: 'contact' },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
