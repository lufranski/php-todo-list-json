<script>
import axios from 'axios';

export default{
    data(){
        return{

            apiUrl: 'http://localhost/php-todo-list-json/server-side/api.php'
        }
    },
    methods: {
        getTodoList(){
            
            axios.get(this.apiUrl).then(res => {
                const data = res.data;
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
</template>

<style scoped>
</style>

