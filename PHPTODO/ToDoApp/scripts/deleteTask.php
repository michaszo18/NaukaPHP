<?php
include_once 'dbc.inc.php';
session_start();

function deleteTask()
{
    $con = new DBConn;
    $id = $_SESSION['taskID'];
    $delete = $con->connect()->query("DELETE FROM tasks WHERE id = $id");
    $delete->execute(); 
    if($delete===false) {
        echo "błąd usuwania zadania";
    } else {
        header('Location: ../index.php');
    }
    $con = null;
}   
  
deleteTask();     
