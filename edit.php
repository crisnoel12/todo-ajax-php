<?php
    require_once('crud/database.php');

    // Get corresponding todo
    function get($db){
        $id = intval($_GET['id']);
        try{
			$results = $db->prepare("SELECT * FROM todos WHERE id = '$id'");
			$results->execute();
		}catch(Exception $e){
			echo "Data could not be retrieved from the database.";
			exit;
		}
        return $results->fetch(PDO::FETCH_ASSOC);
    }
    $todo = get($db);

    // If no todo redirect home
    if (!$todo) {
        header("Location: ./");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos App</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <div class="todos">
        <h1>Edit Todo: <?php echo $todo['name']; ?></h1>

        <!-- Ajax Message -->
        <p class="message"></p>

        <!-- Update Form -->
        <form class="ajax" action="crud/update.php?id=<?php echo $todo['id'];?>" method="post">
            <label for="name">Name:</label>
            <input id="todoName" class="my-textfield" type="text" name="name" value="<?php echo $todo['name']; ?>">
            <input class="my-btn" type="submit" name="submit" value="Update">
        </form>
        <a href="./">&leftarrow; Go Back</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="main.js"></script>

</body>
</html>
