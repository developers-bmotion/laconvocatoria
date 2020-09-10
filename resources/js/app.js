
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { Plugin } from 'vue-fragment'
Vue.use(Plugin);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import swal from 'sweetalert2';
window.swal = swal;
const toast = swal.mixin({
    toast:true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    customClass: {
    title: 'title-class',
    container: 'my-swal'
    }
});
window.toast = toast;
Vue.component('reset-password-component', require('./components/ForgotPassword.vue'));
Vue.component('notification-component', require('./components/NotificationComponent.vue'));
Vue.component('messages-projects-artists', require('./components/message/MessagesProjectsArtistsComponent.vue'));

//Vue.component('add-project', require('./components/AddProject.vue'));

const app = new Vue({
    el: '#app'
});
