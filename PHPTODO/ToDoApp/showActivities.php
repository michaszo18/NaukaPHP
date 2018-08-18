<?php 
include_once 'inc/dbc.inc.php';

class ShowActivities {

    public function showActivities() {
        $con = new DBConn; 
        $stmt = $con->connect()->prepare("SELECT * FROM tasks");
        $stmt->execute();
        $tasks = $stmt->fetchAll();
        echo '<ul>';
        foreach ($tasks as $task) {
                //Słaby sposób na przesyłanie id zadania
                //Jak inaczej przesyłać numer zadania do funkcji
                
                $_SESSION['taskID'] = $task['id'];
                if($task['status'] == 1) {
                    echo "<li><s>";
                        echo "<form action='taskActivity.php' method='POST'>";
                        echo "<span name='task".$task['id']."'>".$task['id'].'. '.$task['task']."</span>";
                        echo "<button name = 'done' class ='done'>Oznacz jako ukończone</button>";
                        echo "<button name = 'delete' class = 'delete'>Usuń zadanie</button>";          
                        echo "</form>";
                    echo "</s></li>";
                } else {
                    echo "<li>";
                        echo "<form action='taskActivity.php' method='POST'>";
                        echo "<span name='task".$task['id']."'>".$task['id'].'. '.$task['task']."</span>";                           
                        echo "<button name ='done' class ='done'>Oznacz jako ukończone</button>";
                        echo "<button name = 'delete' class = 'delete'>Usuń zadanie</button>";
                        echo "</form>";
                    echo "</li>";
            }
        }
        $stmt->closeCursor();
        echo '</ul>';
    }
}