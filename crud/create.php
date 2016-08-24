<?php
require_once('database.php');

function create($db){
    $name = htmlspecialchars(trim(ucwords($_POST['name'])), ENT_QUOTES);
    try{
        $results = $db->prepare("INSERT INTO todos (name) VALUES ('$name')");
        $results->execute();
        echo 'Todo "' . $name . '" added successfully';
    }catch(Exception $e){
        echo $e->getMessage();
        exit;
    }
}

if(isset($_POST['name'])){
    create($db);
}
