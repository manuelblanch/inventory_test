
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('task', require('./components/Task.vue'));

const app = new Vue({
    el: '#app'
});

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import TestIndex from './manteniments/test/TestIndex.vue';
import TestCreate from './manteniments/test/TestCreate.vue';
import TestEdit from './manteniments/test/TestEdit.vue';

const routes = [
    {
        path: '/',
        manteniments: {
            TestIndex: MantenimentsIndex
        }
    },
    {path: '/manteniments/create', component: TestCreate, name: 'createTest'},
    {path: '/manteniments/edit/:id', component: TestEdit, name: 'editTest'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
