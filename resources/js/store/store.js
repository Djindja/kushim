import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios"

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        tasks: []
    },
    getters: {
        tasks: state => state.tasks,
    },
    actions: {
        store (context) {
            axios.get(`/get`)
                .then(response => {
                    context.commit('store', response.data)
                })
        },
        destroy(context, id) {
            axios.delete(`/delete/` + id)
                .then(response => {
                    context.commit('delete', id)
                })
        }
    },
    mutations: {
        store (state, data) {
            state.tasks = data
        },
        delete (state, id) {
            state.tasks = state.tasks.filter(t => {
                return t.id != id
            })
        }
    },
})
