

<?php


$ubicacion=$_POST['ubicacion'];
echo $ubicacion;

//Se inicia la sesión
session_start();
require_once "Conector.php";

$nombre = $_POST['nombre'];
$ape_pa = $_POST['ape_pa'];
$ape_ma = $_POST['ape_ma'];
$fecha_nac = $_POST['fecha_nac'];
$fecha_def = $_POST['fecha_def'];

$query = "INSERT INTO difuntos(nombre,ape_pa,ape_ma,fecha_nac,fecha_def,ubicacion) VALUES ('$nombre','$ape_pa','$ape_ma','$fecha_nac','$fecha_def','$ubicacion')";
$res=$mysqli->query($query);
//Esto es para que redirija a la pagina anterior
if (isset($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    echo "NO";
}
?>
