/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Producto', require('./components/Producto.vue').default);
Vue.component('Entrada', require('./components/Entrada.vue').default);
Vue.component('Salida', require('./components/Salida.vue').default);
Vue.component('User', require('./components/User.vue').default);

const app = new Vue({
    el: '#app',
    data :{
        menu:0,
        ruta: 'http://localhost/sistema_contable_login/public',
       }
});