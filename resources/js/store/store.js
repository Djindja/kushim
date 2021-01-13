import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        tasks: []
    },
    getters: {
        tasks: state => state.tasks,
    },
    actions: {
        increment (context) {
          context.commit('increment')
        }
    },
    mutations: {
        increment (state) {
          state.count++
        }
    },
})
