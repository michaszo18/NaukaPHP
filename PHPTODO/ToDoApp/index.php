<?php 
    include_once 'inc/dbc.inc.php';
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
            $con = new DBConn; 
            $stmt = $con->connect()->query("SELECT * FROM tasks");
            $stmt->execute();
            $tasks = $stmt->fetchAll();
            echo '<ul>';
            foreach ($tasks as $task) {
                    //Słaby sposób na przesyłanie id zadania
                    //Jak inaczej przesyłać numer zadania do funkcji
                    $idNum = $task['id'];
                    if($task['status'] == 1) {
                        echo "<li><s>";
                            echo "<form action='done.php' method='POST'>";
                            echo "<span name='task".$task['id']."'>".$task['id'].'. '.$task['task']."</span>";
                            echo "<button name = 'done' class ='done'>Oznacz jako ukończone</button>";
                            echo "<button name = 'delete' class = 'delete'>Usuń zadanie</button>";
                            echo "<input type='text' name='id' value=".$task['id'].">";
                            echo "</form>";
                        echo "</s></li>";
                    } else {
                         echo "<li>";
                            echo "<form action='done.php' method='POST'>";
                            echo "<span name='task".$task['id']."'>".$task['id'].'. '.$task['task']."</span>";                           
                            echo "<button name ='done' class ='done'>Oznacz jako ukończone</button>";
                            echo "<button name = 'delete' class = 'delete'>Usuń zadanie</button>";
                            echo "<input type='text' name='id' value=".$task['id'].">";
                            echo "</form>";
                        echo "</li>";
                }
            }
            $stmt->closeCursor();
            echo '</ul>';
        
       
        ?>
        
     
    </div>
    <form action="deleteAll.php" method="get">
        <button type="submit">Usuń wszystko</button>
       
    </form>


</body>
</html>

<a href="done.php&id=<?php echo $row['id']?>"></a>

<!-- TODO: <br>
done. <s> Dodać zmianę statusu zadania na done. STATUS = 1; </s> <br>
done. <s> Dodać usuwanie zadań. </s> <br>
3. Zmienić system uzupłniania ID. <br>
done. Wrzucić PDO do osobnej klasy. <br>
5. Uporządkować kod <br>
6. Dodać bootstrapa <br>
7. Dodać info, o tym że nie ma zadań <br>
8. Lepszy sposób na wysyłanie ID <br>
9. Zmienić nazwę done.php <br>
10. Uporać się z charset -->