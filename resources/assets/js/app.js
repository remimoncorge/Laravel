/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueRouter from 'vue-router'

require('./bootstrap');

window.Vue = require('vue');
window.Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
const menu = Vue.component('menu-list', require('./components/menu.vue').default);
const home = Vue.component('home', require('./components/home').default);
const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    routes: [
        { path: '/', name: 'home', component: home },
    ]
})
new Vue({
    router,
    el: '#menu-list'
});
new Vue({
    router,
    el: '#content'
});
