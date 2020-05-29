import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

Vue.use(VueRouter);

new Vue({
    el: '#app',

    router: new VueRouter(routes)
});
