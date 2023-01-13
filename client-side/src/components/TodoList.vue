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

            //pachetto dati da inviare al backend (testo)
            const data = {
                'newTaskText': this.newTask
            }
           
            //fare chiamata post alla nostra api inserendo dati
            axios.post(`${this.apiUrl}api-new-task.php`, data, {
                headers: {'Content-Type':  'multipart/form-data'}
            })
                .then(res => {
                    this.todoList = res.data;
                })
            
        },
        taskDone(index){

            const data = {
                'index' : index
            }

            axios.post(this.apiUrl + 'api-task-status.php' , data, {
                headers: {'Content-Type':  'multipart/form-data'}
            })
            .then(res => {
                    
                this.todoList = res.data;
            });
        }
    },
    mounted() {
        this.getTodoList();
    }
}
</script>

<template>

    <div>
        <h1>TODOLIST</h1>
    </div>

    <ul>
        <li 
        v-for="(task, index) in this.todoList" :key=index :class="task.completed ? 'done' : ''" @click="taskDone(index)">
        
            {{task.name}}
    
        </li>
    </ul>

    <form @submit="addTask">
        <input type="text" name="newTask" v-model="newTask" id="new-task">
        <input type="submit" value="ADD TASK" id="button">
    </form>
</template>

<style scoped>
div {
    width: 40%;
    margin: 50px auto;
    text-align: center;
    color: #FB2576;
}

ul {
    width: 30%;
    height: 400px;
    overflow-y: auto;
    margin: 0 auto;
    padding: 0 1.5rem;
}

li {
    background-color: #FB2576;
    margin-bottom: 1rem;
    padding: 5px;
    border-radius: 16px 0 16px 0;
    color: black;
    font-weight: 900;
    cursor: pointer;
}

.done {
    text-decoration: line-through;
}

form {
    width: 35%;
    margin: 0 auto;
}

#new-task {
    width: 80%;
    margin-right: 20px;
    padding: .5rem;
    border-radius: 0 16px 0 16px;
    background-color: black;
    color: #FB2576;
    border: 1px solid #FB2576;
    transition: .4s;
}

#new-task:focus{
    border-radius: 16px 0 16px 0;
}

#button {
    padding: .5rem;
    border-radius: 0 16px 0 16px;
    background-color: black;
    color: #FB2576;
    border: 1px solid #FB2576;
    cursor: pointer;
    transition: .4s;
}

#button:focus {
    border-radius: 16px 0 16px 0;
}



</style>

