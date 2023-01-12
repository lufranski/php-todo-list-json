<?php
    header("Access-Control-Allow-Origin: http://localhost:80");
    header("Access-Control-Allow-Headers: X-Requested-With");
    
    header('Content-Type: application/json');
    
    $jsonTodoList = file_get_contents("todo.json", true);
    echo $jsonTodoList;