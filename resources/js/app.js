
require('./bootstrap');

window.Vue = require('vue');

Vue.component('chat-app', require('./components/ChatApp.vue').default);
Vue.component('renter-crud', require('./components/ChatApp.vue').default);
Vue.component('landlord-crud', require('./components/ChatApp.vue').default);
Vue.component('create-post', require('./components/CreatePost.vue').default);



const app = new Vue({
    el: '#app'
});
