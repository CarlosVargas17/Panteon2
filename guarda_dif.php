<?php
require_once "Conector.php";


//Se inicia la sesión
session_start();

$id_s = $_GET['id_s'];
$id_ss = $_GET['id_ss'];


if (isset($_POST['guarda_dif'])){
    //Agregue esta parte para la transaccion
    $mysqli->begin_transaction();


    $nombre = $_POST['nombre'];
    $ape_pa = $_POST['ape_pa'];
    $ape_ma = $_POST['ape_ma'];
    $fecha_nac = $_POST['fecha_nac'];
    $fecha_def = $_POST['fecha_def'];
    $ubicacion = $_POST['ubicacion'];
    
    $query = "INSERT INTO difuntos(nombre,ape_pa,ape_ma,fecha_nac,fecha_def,ubicacion) VALUES ('$nombre','$ape_pa','$ape_ma','$fecha_nac','$fecha_def','$ubicacion')";
    $res=$mysqli->query($query);

    //Cambie este if
    if (!$res){
        $mysqli->rollback();
        $_SESSION['message']='error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    echo ($res);

    $nombre_c = $_POST['nombre_c'];
    $ape_pa_c = $_POST['ape_pa_c'];
    $ape_ma_c = $_POST['ape_ma_c'];
    $referencia = $_POST['referencia'];
    $calle = $_POST['calle'];
    $colonia = $_POST['colonia'];
    $numero = $_POST['numero'];
    $num_recibo = $_POST['num_recibo'];

   

    $query3 = "SELECT * FROM gobierno";
    $result3 = mysqli_query($mysqli, $query3);
    $row2 = mysqli_fetch_array($result3);

    $presidente = $row2['presidente'];
    
    $usuario = $_SESSION["User"];

    $consulta = "INSERT INTO ventas(nombre_c,ape_pa,ape_ma,fecha,referencia,ubicacion,usuario,presidente, calle, numero, colonia, num_recibo) VALUES ('$nombre_c','$ape_pa_c','$ape_ma_c',CURDATE(),'$referencia','$ubicacion','$usuario','$presidente','$calle','$numero','$colonia','$num_recibo')";
    $res2=mysqli_query($mysqli, $consulta);

    //Cambie este if
    if (!$res2){
        $mysqli->rollback();
        $_SESSION['message']='error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    echo $res2;

    $estado = $_POST['estado'];
    $con = "UPDATE fosas SET estado='$estado' WHERE ubicacion='$ubicacion'";
    $res3=mysqli_query($mysqli, $con);

    //Cambie este if
    if (!$res3){
        $mysqli->rollback();
        $_SESSION['message']='error';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    //Agregue esta 3 lineas
    $_SESSION['message']='success';
    $_SESSION['message_type'] = 'success';
    $mysqli->commit();

    //Esto es para que redirija a la pagina anterior
    if (isset($_SERVER['HTTP_REFERER'])){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        echo "NO";
    }
    
   
    
}

?>