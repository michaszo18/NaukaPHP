<?php 
include_once 'dbc.inc.php';

function deleteAllTasks()
{
    $conn = new DBConn;
    $deleteAll = $conn->connect()->query('DELETE FROM tasks');
    if($deleteAll===false) {
        echo "błąd usunięcia wszytkiego";
    } else {
    header('Location: ../index.php');
    }
    $conn = null;
}
deleteAllTasks();


