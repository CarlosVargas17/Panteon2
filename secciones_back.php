<?php 
require_once "Conector.php";

    $query = "SELECT * FROM secciones";
    $result = $mysqli->query($query);

    $val = $result->num_rows + 1;
    $num = strval($val);
    $nom = "Sección ".$num;
    echo $nom;
    $query = "INSERT INTO secciones(id,nombre) VALUES ('$num','$nom')";
    $res = $mysqli->query($query);
    if (!$res){
        echo "Error";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);



?>