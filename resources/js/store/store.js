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
        store (context) {
            axios.get(`http://kushim.test/get`)
            .then(response => {
                context.commit('store', response.data)
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    },
    mutations: {
        store (state, data) {
          state.tasks = data
        }
    },
})
