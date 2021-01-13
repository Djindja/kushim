<template>
    <div>
        <div class="form-group">
            <label for="name">Task Title</label>
            <input type="text" class="form-control" v-model="title" />
        </div>

        <div class="form-group">
            <label for="message">Task Description</label>
            <textarea class="form-control" v-model="description" rows="5"></textarea>
        </div>

        <button v-on:click="saveTask" type="submit" class="btn btn-primary">Edit Task</button>
    </div>
</template>

<script>
export default {
    name: 'editTask',
    data() {
        return {
            title: '',
            description: ''
        }
    },
    methods: {
        saveTask() {
            axios.post(`http://kushim.test/edit/` + this.$route.params.taskId, { title: this.title, description: this.description })
            .then(response => {
                alert('Sucessfully updated!')
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
}
</script>