/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
// import VueRouter from 'vue-router'
// Vue.use(VueRouter)
// import NewBlogComponent from './components/NewBlogComponent'

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('newblog', require('./components/NewBlogComponent.vue').default);                                                                                                                                                                                                                                                                 
Vue.component('blog', require('./components/BlogShow.vue').default);
Vue.component('home', require('./components/BlogMain.vue').default);
Vue.component('admin', require('./components/AdminViewComponent.vue').default);



// const router = new VueRouter({
//     mode: 'history',
//     routes: [    
//         {
//             path: '/newBlog',
//             name: 'edit',
//             component :NewBlogComponent,
//         },
//     ],
// });

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    // router,
});
