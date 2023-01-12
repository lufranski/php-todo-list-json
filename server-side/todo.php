<?php

    $toDoList = [
        [
            'name' => 'HTML',
            'completed' => true
        ],
        [
            'name' => 'CSS',
            'completed' => true
        ],
        [
            'name' => 'Responsive Design',
            'completed' => true
        ],
        [
            'name' => 'Javascript',
            'completed' => true
        ],
        [
            'name' => 'PHP',
            'completed' => false
        ],
        [
            'name' => 'Laravel',
            'completed' => false
        ],
    ];

    $jsonToDoList = json_encode($toDoList);
    $res = file_put_contents('todo.json' , $jsonToDoList);

    //ADDING NEW TASK
    $jsonToDoList = file_get_contents('todo.json' , true);
    $toDoList = json_decode($jsonToDoList);

    $toDoList[] = [
        'name' => 'New Task',
        'completed' => false
    ];

    $jsonToDoList = json_encode($toDoList);
    $res = file_put_contents('todo.json' , $jsonToDoList); 

    var_dump($toDoList);