<?php
require_once "Conector.php";
    $User=$_POST['User'];
    $Nombre=$_POST['Nombre'];
    $Rol=$_POST['Rol'];
    $Estado=$_POST['Estado'];
    $query= "UPDATE usuarios SET User='$User', Usuario='$Nombre',Rol='$Rol',Estado='$Estado' where User='$User' ";
    $result = $mysqli->query($query);
    echo $result;
?>
