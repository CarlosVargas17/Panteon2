<?php
require_once "Conector.php";
    $pagina=$_POST['pagina'];
    $permisos=$_POST['permisos'];
    $query= "UPDATE ventanas SET acceso='$permisos' where ventana='$pagina' ";
    $result = $mysqli->query($query);
    echo $result;
?>
