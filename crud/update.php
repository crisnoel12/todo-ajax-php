<?php
    require_once('database.php');

    function update($db){
        $id = intval($_GET["id"]);
        $name = $_POST["name"];

        try {
            $results = $db->prepare("UPDATE todos SET name = '$name' WHERE id = $id");
            $results->execute();
            echo 'Todo updated to "' . $name . '"';
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

    }

    if(isset($_POST['name'])){
        update($db);
    }

?>
