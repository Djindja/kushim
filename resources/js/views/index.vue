<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <br>
        <h3>
            List of tasks
        </h3>
        <table class="table">
            <thead>
            <tr>
                <th style="text-align: left; width: 5%;">#</th>
                <th style="text-align: left; width: 20%;">Task Title</th>
                <th style="text-align: left; width: 20%;">Task Description</th>
                <th style="text-align: left; width: 20%;">Edit Task</th>
                <th style="text-align: left; width: 20%;">Delete Task</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(task, index) in tasks" :key="task.id">
                <td style="text-align: left; width: 5%;">{{ index + 1 }}</td>
                <td style="text-align: left; width: 20%;">{{ task.title }}</td>
                <td style="text-align: left; width: 20%;">{{ task.description }}</td>
                <td style="text-align: left; width: 20%;"><router-link :to="{ name: 'edit', params: { taskId: task.id }}">Edit Single Task</router-link></td>
                <td style="text-align: left; width: 20%;"><button @click="destroy(task.id)">Delete Task</button></td>
            </tr>
            </tbody>
        </table>
        <br/>
        <router-link to="/dashboard/create">Create New Task</router-link>
    </div>
</template>

<script>
import axios from "axios"
import 'bootstrap/dist/css/bootstrap.css'

export default {
    name: 'list',
    data() {
        return {

        }
    },
    computed: {
        tasks() {
            return this.$store.getters.tasks
        }
    },
    methods: {
        destroy(id) {
        this.$store.dispatch('destroy', id)
        }
    },
    created() {
        this.$store.dispatch('store')
    },
}
</script>