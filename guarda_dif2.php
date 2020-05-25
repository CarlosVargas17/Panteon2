

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
$id=$_POST['id'];
$mysqli->begin_transaction();
if ($id=="nuevo"){
    $query = "INSERT INTO difuntos(nombre,ape_pa,ape_ma,fecha_nac,fecha_def,ubicacion) 
    VALUES ('$nombre','$ape_pa','$ape_ma','$fecha_nac','$fecha_def','$ubicacion')";
}else{
    $query = "UPDATE difuntos 
    SET nombre='$nombre', ape_pa='$ape_pa', ape_ma='$ape_ma', fecha_nac='$fecha_nac', fecha_def='$fecha_def' 
    WHERE id=$id";
    $q2="SELECT * FROM fosas WHERE ubicacion='$ubicacion'";
    $r2=$mysqli->query($q2);
    $f=mysqli_fetch_assoc($r2);
    if ($f['estado']=='apartada'){
        $q3="UPDATE fosas SET estado='ocupada' WHERE ubicacion='$ubicacion'";
    }else if($f['estado']=='pagos_lib'){
        $q3="UPDATE fosas SET estado='pagos_oc' WHERE ubicacion='$ubicacion'";
    }
    $r3=$mysqli->query($q3);
    if(!$r3){
        $mysqli->rollback();
        $_SESSION['message2']="error";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
$res=$mysqli->query($query);
if(!$res){
    $mysqli->rollback();
    $_SESSION['message2']="error";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
$mysqli->commit();
$_SESSION['message2']="success";
//Esto es para que redirija a la pagina anterior
if (isset($_SERVER['HTTP_REFERER'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    echo "NO";
}
?>
