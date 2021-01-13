<template>
    <div>
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
            <td style="text-align: left; width: 20%;"><a href="http://kushim.test/delete/">Delete Task</a></td>
            </tr>
            </tbody>
        </table>
        <br/>
    </div>
</template>

<script>
import axios from "axios"

export default {
    name: 'list',
    data() {
        return {
            tasks: [],
        }
    },
    created() {
    axios.get(`http://kushim.test/get`)
    .then(response => {
        this.tasks = response.data
    })
    .catch(e => {
        this.errors.push(e)
    })
  },
}
</script>