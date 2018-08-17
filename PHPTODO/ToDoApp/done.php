<?php
    include_once 'inc/dbc.inc.php';

    //Sprawdzenie która z akcji została wybrana
    if(isset($_POST['done'])) {
        $done = $_POST['done'];
    }
    if(isset($_POST['delete'])) {
        $delete = $_POST['delete'];
    }
    //Pobranie id 
    //Koniecznie TODO
    $id = $_POST['id'];

    //Połączenie z bazą
    $con = new DBConn;
    $con->connect();  
    
    
    //Zakreślenie wykonanego zadania
    if(isset($done)) {
        $set = $con->connect()->query("UPDATE tasks SET status= 1 WHERE id = $id");
        $set->execute();

        if($set===false) {
            echo "błąd ukończenia zadania";
        } else {
        header('Location: index.php');
        }
        $pdo = null;
    }  
    
    //Usunięcie zadania z listy
        if(isset($delete)) {
        $delete = $con->connect()->query("DELETE FROM tasks WHERE id = $id");
        $delete->execute(); 
        if($delete===false) {
            echo "błąd usuwania zadania";
        } else {
            header('Location: index.php');
        }
        $pdo = null;
    }  
        
