<?php 
require_once "Conector.php";

    $id = $_GET['id'];
    echo $id;
    $query = "SELECT * FROM subsecciones WHERE seccion = '$id'";
    $result = $mysqli->query($query);

    $val = $result->num_rows + 1;
    $num = strval($val);
    $nom = "Subsección ".$num;
    echo $nom;
    
    $query = "INSERT INTO subsecciones(id,nombre,seccion) VALUES ('$num','$nom','$id')";
    $res = $mysqli->query($query);
    if (!$res){
        echo "Error";
        die();
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);



?>

