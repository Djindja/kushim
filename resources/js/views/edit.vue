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
    created() {
        let taskId = this.$route.params.taskId;
        console.log(this.$store.getters.tasks);
        let storedTask = this.$store.getters.tasks.find(t => {
            return t.id == taskId;
        })
        this.title = storedTask.title;
        this.description = storedTask.description;
    },
    methods: {
        saveTask() {
            axios.post(`http://kushim.test/edit/` + this.$route.params.taskId, { title: this.title, description: this.description })
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