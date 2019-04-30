
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy';
// import 'buefy/dist/buefy.css'
Vue.use(Buefy);


import bulmaCalendar from 'bulma-calendar/dist/js/bulma-calendar.min.js';
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

var app = new Vue({
    el: '#app',
    data: {}
});


// const app = new Vue({
//     el: '#app'
// });
