<?php 
include_once 'dbc.inc.php';

class ShowActivities {

    public function __construct() {
        $con = new DBConn; 
        $stmt = $con->connect()->prepare("SELECT * FROM tasks");
        $stmt->execute();
        $tasks = $stmt->fetchAll();
        echo '<ul>';
        foreach ($tasks as $task) {
                $_SESSION['taskID'] = $task['id'];
                if($task['status'] == 1) {
                    echo "<li><s>";
                        echo "<span name='task".$task['id']."'>".$task['id'].'. '.$task['task']."</span>";
                        echo '<button><a href="scripts/done.php">Oznacz jako ukończone</a></button>';
                        echo '<button><a href="scripts/deleteTask.php">Usuń zadanie</a></button>';     
                        echo  $_SESSION['taskID'];
                    echo "</s></li>";
                } else {
                    echo "<li>";          
                        echo "<span name='task".$task['id']."'>".$task['id'].'. '.$task['task']."</span>";                           
                        echo '<button><a href="scripts/done.php">Oznacz jako ukończone</a></button>';
                        echo '<button><a href="scripts/deleteTask.php">Usuń zadanie</a></button>';  
                        echo  $_SESSION['taskID'];                     
                    echo "</li>";
            }
        }
        $stmt->closeCursor();
        echo '</ul>';
    }
}