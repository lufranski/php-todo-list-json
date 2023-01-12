<script>
import axios from 'axios';

export default{
    data(){
        return{

            apiUrl: 'http://localhost/php-todo-list-json/server-side/api.php',
            todoList: []
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
</template>

<style scoped>
</style>

