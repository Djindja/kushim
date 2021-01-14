<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p v-if="error">
            <b>Please correct the following error(s):</b>
            <ul>
                <li v-if="error && error.title && error.title[0]">{{ error.title[0] }}</li>
                <li v-if="error && error.description && error.description[0]">{{ error.description[0] }}</li>
            </ul>
        </p>
        <h3>
            Edit a task
        </h3>
        <div class="form-group">
            <label for="name">Task Title</label>
            <input type="text" class="form-control" v-model="title" />
        </div>

        <div class="form-group">
            <label for="message">Task Description</label>
            <textarea class="form-control" v-model="description" rows="5"></textarea>
        </div>

        <button v-on:click="saveTask" type="submit" class="btn btn-primary">Save</button>
        <router-link to="/dashboard" class="btn btn-secondary">Back</router-link>
    </div>
</template>

<script>
import axios from "axios"
import 'bootstrap/dist/css/bootstrap.css'

export default {
    name: 'editTask',
    data() {
        return {
            error: '',
            title: '',
            description: ''
        }
    },
    created() {
        let taskId = this.$route.params.taskId;

        let storedTask = this.$store.getters.tasks.find(t => {
            return t.id == taskId;
        })
        this.title = storedTask.title;
        this.description = storedTask.description;
    },
    methods: {
        saveTask() {
            axios.post(`/edit/` + this.$route.params.taskId, { title: this.title, description: this.description })
            .then(response => {
                this.$router.push('/dashboard');
            })
            .catch(e => {
                const error = JSON.parse(e.response.data.error)
                this.error = error
            })
        }
    }
}
</script>