<?php
    include_once 'inc/dbc.inc.php';

    //Pobranie id 
    //Koniecznie TODO
    $id = $_POST['id'];

    //Połączenie z bazą
    $con = new DBConn;
    $con->connect();  

    //Zakreślenie wykonanego zadania
    if(isset($_POST['done'])) {
        $done = $con->connect()->query("UPDATE tasks SET status= 1 WHERE id = $id");
        $done->execute();
        if($done===false) {
            echo "błąd ukończenia zadania";
        } else {
        header('Location: index.php');
        }
        $pdo = null;
    }

    //Usunięcie zadania z listy
    else if(isset($_POST['delete'])) {
        $delete = $con->connect()->query("DELETE FROM tasks WHERE id = $id");
        $delete->execute(); 
        if($delete===false) {
            echo "błąd usuwania zadania";
        } else {
            header('Location: index.php');
        }
        $pdo = null;
    }

        
