<?php
require_once "Conector.php";

if (isset($_GET['id'])){
    $id=$_GET['id'];
    $query = "DELETE FROM ventas WHERE id_difunto=$id";
    $query2 = "DELETE FROM difuntos WHERE id=$id";
    $mysqli->begin_transaction();
    $result1=$mysqli->query($query);
    if(!$result1){
        $mysqli->rollback();
        die("Error 1");
    }
    $result2=$mysqli->query($query2);
    if(!$result2){
        $mysqli->rollback();
        die("Error 2");
    }

    $mysqli->commit();
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
}

?>