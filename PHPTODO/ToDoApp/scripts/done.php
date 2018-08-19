<?php
include_once 'dbc.inc.php';
session_start();

function done() {
    $con = new DBConn;
    $con->connect();
    $id = $_SESSION['taskID'];
    $done = $con->connect()->query("UPDATE tasks SET status= 1 WHERE id = $id");
    $done->execute();
    if($done===false) {
        echo "błąd ukończenia zadania";
    } else {
        header('Location: ../index.php');
    }
    $con = null;
}


done();
