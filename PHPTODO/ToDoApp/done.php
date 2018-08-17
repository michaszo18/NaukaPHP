<?php
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
try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=todoapp', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Zakreślenie wykonanego zadania
        if(isset($done)) {
            $set = $pdo -> query("UPDATE tasks SET status= 1 WHERE id = $id");
            
            if($set===false) {
                echo "dupa i chuj";
            } else {
            header('Location: index.php');
            }
            $pdo = null;
        }  
        
        //Usunięcie zadania z listy
         if(isset($delete)) {
            $delete = $pdo -> query("DELETE FROM tasks WHERE id = $id");
            
            if($delete===false) {
                echo "dupa i chuj";
            } else {
                header('Location: index.php');
            }
            $pdo = null;
        }  
            
    }
    catch(PDOException $e)
    {
        echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
    }