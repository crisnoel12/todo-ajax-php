<?php
require_once('database.php');

function getAll($db){
    try{
        $results = $db->prepare("SELECT * FROM todos");
        $results->execute();
    }catch(Exception $e){
        echo "Data could not be retrieved from the database.";
        exit;
    }
    return $results->fetchAll(PDO::FETCH_ASSOC);
}

$todos = getAll($db);

function showTodos(){
    global $todos;
    if(!empty($todos)){
        foreach ($todos as $todo) {
            echo
                '<li>
                    <a href='."edit.php?id=". $todo['id'] .' class='. "edit-btn" .'>' . $todo['name'] . '</a>' .
                    ' <a href='."crud/delete.php?id=". $todo['id'] .' class='. "delete-btn" .'>X</a>' .
                '</li>';
        }
    } else {
        echo 'No todos in database';
    }
}

return showTodos();
