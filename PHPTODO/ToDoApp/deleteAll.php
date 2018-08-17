<?php 
//Wyczyszczenie listy zadań
try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=todoapp', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $deleteAll = $pdo -> query('DELETE FROM tasks');
        
        if($deleteAll===false) {
            echo "dupa i chuj";
        } else {
        header('Location: index.php');
        }
        $pdo = null;
            
    }
    catch(PDOException $e)
    {
        echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
    }
 

