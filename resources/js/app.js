/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


const { default: Axios } = require('axios');




//Vue router
// import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);


//first pages routes
const Home = Vue.component('Home', require('./pages/Home.vue').default);
const Blog = Vue.component('Blog', require('./pages/Blog.vue').default);
const Contacts = Vue.component('Contacts', require('./pages/Contacts.vue').default);
const About = Vue.component('About', require('./pages/About.vue').default);
const PostPage = Vue.component('Post', require('./pages/Post.vue').default);

//defining routes

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/contacts',
        name: 'contacts',
        component: Contacts,
    },
    {
        path: '/about',
        name: 'about',
        component: About,
    },
    {
        path: '/blog',
        name: 'blog',
        component: Blog
    },
    {
        path: '/post/:slug',
        name: 'post',
        component: PostPage
    },

]


//create a router instance
const router = new VueRouter({
    mode: 'history',  // <- this is just to remove the # from the url
    routes
})



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('App', require('./App.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
})

//  const app = new Vue({
//     el: '#app',
//     data: {
//         posts: null
//     },
//     mounted() {
//         Axios.get('/api/posts').then(resp => {
//             console.log(resp);
//             this.posts = resp.data.data;
//         }).catch(e => {
//             console.error('Sorry! ' + e);
//         })
//     }
// });
