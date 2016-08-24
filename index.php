<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos App</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

    <!-- Message from script -->
    <p class="message"></p>

    <!-- Create todo form -->
    <div class="create-form">
        <form class="ajax" action="crud/create.php" method="post">
            <input id="todoName" class="my-textfield" type="text" name="name" value="" placeholder="Create a new Todo...">
            <input id="create" class="my-btn" type="submit" name="submit" value="Create">
        </form>
    </div>

    <!-- The list of todos -->
    <div class="todos">
        <h1>Todos:</h1>
        <ul id="todoList">
            <?php
                include('crud/read.php');
            ?>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="main.js"></script>
</body>
</html>
