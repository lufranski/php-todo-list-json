<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: X-Requested-With");
    
    header('Content-Type: application/json');

    // $newTask = $_GET['newTask'];
    // $completed = $_GET['completed'];
    $index = $_POST['index'];

    $jsonTodoList = file_get_contents("todo.json", true);
    $todoList = json_decode($jsonTodoList, true);

    $todoList[$index]['completed'] = !$todoList[$index]['completed'];

    $jsonTodoList = json_encode($todoList);
    file_put_contents('todo.json' , $jsonTodoList);

    echo $jsonTodoList;
?>