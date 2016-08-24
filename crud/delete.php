<?php
    require_once('database.php');

    $id = intval($_GET["id"]);

    // Get corresponding todo
    try{
        $result = $db->prepare("SELECT * FROM todos WHERE id = '$id'");
        $result->execute();
    }catch(Exception $e){
        echo "Data could not be retrieved from the database.";
        exit;
    }
    $todo = $result->fetch(PDO::FETCH_ASSOC);

    // Delete todo function
    function delete($db){
        // Grab outside variables for use
        global $id, $todo;

        try {
            $results = $db->prepare("DELETE FROM todos where id = $id");
            $results->execute();
            echo 'Todo "' . $todo['name'] . '" deleted successfully';
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

    }

    if (!empty($todo)) {
        delete($db);
    } else {
        header("Location: ./");
    }

?>
