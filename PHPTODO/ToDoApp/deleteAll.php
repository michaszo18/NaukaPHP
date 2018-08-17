<?php 
include_once 'inc/dbc.inc.php';
//Wyczyszczenie listy zadań

    $conn = new DBConn;
    
    $deleteAll = $conn->connect()->query('DELETE FROM tasks');
    
    if($deleteAll===false) {
        echo "błąd usunięcia wszytkiego";
    } else {
    header('Location: index.php');
    }
    $conn = null;
    

