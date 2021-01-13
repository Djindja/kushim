require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import { store } from './store/store'

Vue.use(VueRouter)

import taskList from './views/index.vue'
import createTask from './views/create.vue'
import editTask from './views/edit.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/tasks/list',
            name: 'list',
            component: taskList
        },
        {
            path: '/tasks/create',
            name: 'createTask',
            component: createTask
        },
        {
            path: '/edit/:taskId',
            name: 'edit',
            component: editTask
        },
    ],

})

const app = new Vue({
    el: '#app',
    store,
    router
});
