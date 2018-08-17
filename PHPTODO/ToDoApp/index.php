<?php 
    include_once 'showActivities.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoApp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>ToDoApp</h1>
        <form action="addTask.php" method="POST">
            <input type="text" name="newTask">
            <button type="submit">Add task to List</button>
        </form>
        
        <?php 
          $show = new ShowActivities();
        ?>
        
     
    </div>
    <form action="deleteAll.php" method="get">
        <button type="submit">Usuń wszystko</button>
    </form>


</body>
</html>

<!-- <a href="done.php&id=<?php echo $row['id']?>"></a> -->

<!-- TODO: <br>
done. <s> Dodać zmianę statusu zadania na done. STATUS = 1; </s> <br>
done. <s> Dodać usuwanie zadań. </s> <br>
3. Zmienić system uzupłniania ID. <br>
done. Wrzucić PDO do osobnej klasy. <br>
5. Uporządkować kod <br>
6. Dodać bootstrapa <br>
7. Dodać info, o tym że nie ma zadań <br>
8. Lepszy sposób na wysyłanie ID <br>

