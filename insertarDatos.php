<?php
require "Conector.php";
    $User=$_POST['User'];
    $Nombre=$_POST['Nombre'];
    $Password=$_POST['Password'];
    $Rol=$_POST['Rol'];
    $Estado=$_POST['Estado'];
    if ($User=='' or $Nombre==''){
        echo 0;
    }
    else{
    $pass1=password_hash($Password,PASSWORD_DEFAULT);
    $query3= "INSERT INTO usuarios (User,password,Usuario,Rol,Estado)
                                    values('$User','$pass1','$Nombre','$Rol','$Estado')";
    $result3 = $mysqli->query($query3);
    echo $result3;
    }
?>
