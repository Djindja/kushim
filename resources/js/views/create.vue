<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <br>
        <div class="form-group">
            <label for="name">Task Title</label>
            <input type="text" class="form-control" v-model="title" required />
        </div>

        <div class="form-group">
            <label for="message">Task Description</label>
            <textarea class="form-control" v-model="description" rows="5" required></textarea>
        </div>

        <button v-on:click="saveTask" type="submit" class="btn btn-primary">Save</button>
    </div>
</template>

<script>
import axios from "axios"
import 'bootstrap/dist/css/bootstrap.css'

export default {
    name: 'createTask',
    data() {
        return {
            title: '',
            description: ''
        }
    },
    methods: {
        saveTask() {
            axios.post(`http://kushim.test/create`, { title: this.title, description: this.description })
            .then(response => {
                this.$router.push('/dashboard');
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
}
</script>