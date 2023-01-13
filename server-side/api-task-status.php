<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");
    
    header('Content-Type: application/json');

    $newTask = $_GET['newTask'];
    $completed = $_GET['completed'];

    $jsonTodoList = file_get_contents("todo.json", true);
    $todoList = json_decode($jsonTodoList);

    $todoList[] = [
        'name' => $newTask,
        'completed' => $completed
    ];

    $jsonTodoList = json_encode($todoList);
    file_put_contents('todo.json' , $jsonTodoList);