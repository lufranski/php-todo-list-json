<script>
import axios from 'axios';

export default{
    data(){
        return{

            apiUrl: 'http://localhost/php-todo-list-json/server-side/',
            todoList: [],
            newTask: ''
        }
    },
    methods: {
        getTodoList(){
            
            axios.get(this.apiUrl + 'api.php').then(res => {
                const data = res.data;

                this.todoList = data;
            });
        },
        addTask(e){
            e.preventDefault();

            const par = {params: {
                
                'newTask' : this.newTask
            }};

            axios.get(this.apiUrl + 'api-new-task.php', par).then(() => {
                this.getTodoList();
            });
        }
    },
    mounted() {
        this.getTodoList();
    }
}
</script>

<template>

    <!-- TEST -->
    <h1>TODOLIST</h1>

    <ul>
        <li v-for="task in this.todoList">{{task.name}}</li>
    </ul>

    <form @submit="addTask">
        <input type="text" name="newTask" v-model="newTask">
        <input type="submit" value="ADD TASK">
    </form>
</template>

<style scoped>
</style>

