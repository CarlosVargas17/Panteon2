<?php

session_start();
require_once "Conector.php";


$mysqli->begin_transaction();

$id = $_POST['id']; 
$id_c=$_POST['id_c'];
$nombre = $_POST['nombre'];
$ape_pa = $_POST['ape_pa'];
$ape_ma = $_POST['ape_ma'];
$fecha_nac = $_POST['fecha_nac'];
$fecha_def = $_POST['fecha_def'];
$ubicacion = $_POST['ubicacion'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$colonia = $_POST['colonia'];
$referencia = $_POST['referencia'];
$estado = $_POST['estado'];


if($id!="nuevo"){
    $query = "UPDATE difuntos 
        SET nombre='$nombre', ape_pa='$ape_pa', ape_ma='$ape_ma', fecha_nac='$fecha_nac', fecha_def='$fecha_def',
        ubicacion='$ubicacion' WHERE id=$id";
}else{
    $query = "INSERT INTO difuntos(nombre,ape_pa,ape_ma,fecha_nac,fecha_def,ubicacion) 
    VALUES ('$nombre','$ape_pa','$ape_ma','$fecha_nac','$fecha_def','$ubicacion')";
}
echo $query;
if($nombre!="" and $ape_pa!="" and $ape_ma!="" and $fecha_nac!="" and $fecha_def!=""){
    $res=$mysqli->query($query);
    if (!$res){
        $mysqli->rollback();
        $_SESSION['message']='error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}


$query = "UPDATE ventas
SET calle='$calle',numero=$numero,colonia='$colonia',referencia='$referencia'
WHERE id=$id_c";

$res=$mysqli->query($query);

if (!$res){
    $mysqli->rollback();
    $_SESSION['message']='error';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if(isset($_POST['estado']) and $_POST['estado']!=""){
    $query="UPDATE fosas SET estado='$estado' WHERE ubicacion='$ubicacion'";
    $res=$mysqli->query($query);
    if (!$res){
        $mysqli->rollback();
        $_SESSION['message']='error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

$mysqli->commit();

$_SESSION['message']='success';
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>