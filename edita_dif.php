<?php
require_once "Conector.php";


session_start();


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


$query = "UPDATE difuntos 
SET nombre='$nombre', ape_pa='$ape_pa', ape_ma='$ape_ma', fecha_nac='$fecha_nac', fecha_def='$fecha_def',
ubicacion='$ubicacion' WHERE id=$id";
echo $query;
$res=mysqli_query($mysqli, $query);

if (!$res){
    $mysqli->rollback();
    $_SESSION['message']='error';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
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

$query="UPDATE fosas SET estado='$estado' WHERE ubicacion='$ubicacion'";
$res=$mysqli->query($query);
if (!$res){
    $mysqli->rollback();
    $_SESSION['message']='error';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

$mysqli->commit();

$_SESSION['message']='success';
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>