<?php
require_once "Conector.php";
    $User=$_POST['User'];
    $query2= "DELETE FROM usuarios where User='$User'";
    $result2 = $mysqli->query($query2);
    echo $result2;

?>