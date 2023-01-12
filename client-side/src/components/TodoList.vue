<script>
import axios from 'axios';

export default{
    data(){
        return{

            apiUrl: 'http://localhost/php-todo-list-json/server-side/api.php',
            todoList: [],
            newTask: ''
        }
    },
    methods: {
        getTodoList(){
            
            axios.get(this.apiUrl).then(res => {
                const data = res.data;

                this.todoList = data;
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

    <form>
        <input type="text" name="newTask" v-model="newTask">
        <input type="submit" value="ADD TASK">
    </form>
</template>

<style scoped>
</style>

