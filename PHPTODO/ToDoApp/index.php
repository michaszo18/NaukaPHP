<?php 
    include_once 'scripts/showActivities.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoApp</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <h1>ToDoApp</h1>
        <form action="scripts/addTask.php" method="POST">
            <input type="text" name="newTask">
            <button type="submit">Add task to List</button>
        </form>
        <?php 
          $show = new ShowActivities();          
        ?>  
    <button><a href="scripts/deleteAll.php">Usuń wszystkie zadania</a></button> 
    </div>
    
</body>
</html>




