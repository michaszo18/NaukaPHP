<?php 
include_once 'inc/dbc.inc.php';

function addTask()
{
    $zadanie = $_POST['newTask'];
    $conn = new DBConn;
    //Zapytanie SQL pobierające max wartość ID
    $result = $conn->connect()->query('SELECT MAX(id) FROM tasks');
    if(!$result) {
        echo "błąd pobierania danych";
    }
    foreach ($result as $row) {
        $id = $row[0];
    }
    $id++;

    $result = $conn->connect()->query('INSERT INTO `tasks`(`id`, `task`, `status`) VALUES (\''.$id.'\',\''.$zadanie.'\',0)');
    if($query2===false) {
        echo "błąd dodania zadania";
    } else {
        header('Location: index.php');
    }
    $pdo = null;
}
   
addTask();