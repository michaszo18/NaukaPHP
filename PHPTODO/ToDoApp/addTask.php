<?php 
$zadanie = $_POST['newTask'];
 try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=todoapp', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Zapytanie SQL pobierające max wartość ID
        $query = 'SELECT MAX(id) FROM tasks';
        $result = $pdo->query($query);
        if(!$result) {
            echo "błąd pobierania danych";
        }
        foreach ($result as $row) {
            $id = $row[0];
        }
        $id++;

        $query2 = 'INSERT INTO `tasks`(`id`, `task`, `status`) VALUES (\''.$id.'\',\''.$zadanie.'\',0)';
        $result = $pdo->query($query2);
			
        if($query2===false) {
            echo "błąd dodania zadania";
        } else {
        header('Location: index.php');
        }
        $pdo = null;
    }
    catch(PDOException $e)
    {
        echo 'Dane nie mogły zostać zapisane: ' . $e->getMessage();
    }