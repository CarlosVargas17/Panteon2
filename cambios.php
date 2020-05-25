
<?php
require_once "Conector.php";



if(isset($_POST['tumbas'])){
    $sec = $_POST['sec'];
    $subsec = $_POST['subsec'];
    

    /* Cambiando el like verificar si vale 'return-return-%' solo seria agreagasr esto el de solicitud parece ser mas igual*/

    $consu="SELECT * FROM fosas where ubicacion like '$sec-$subsec-%'";

    $cc = $mysqli->query($consu);
    $resultados= array();
    while ($fila =mysqli_fetch_assoc($cc)){

        $resultados=array_merge($resultados,[$fila['ubicacion'] => $fila['estado']]);

    }
    echo json_encode(['datos' => $resultados]);
}



elseif(isset($_POST['id'])){
    

    /* Cambiando el like verificar si vale 'return-return-%' solo seria agreagasr esto el de solicitud parece ser mas igual*/

    $consu="SELECT id, nombre, ape_pa, ape_ma, fecha_nac, fecha_def, estado FROM fosas, difuntos where fosas.ubicacion = '".$_POST['id']."' and fosas.ubicacion = difuntos.ubicacion";

    $cc = $mysqli->query($consu);
    $fila =mysqli_fetch_assoc($cc);
    echo json_encode(['datos' => $fila]);
}



elseif(isset($_POST['idventa'])){
    

    /* Cambiando el like verificar si vale 'return-return-%' solo seria agreagasr esto el de solicitud parece ser mas igual*/

    //$consu="SELECT nombre, ape_pa, ape_ma, fecha_nac, fecha_def, estado FROM fosas, difuntos where fosas.ubicacion = '".$_POST['idventa']."' and fosas.ubicacion = difuntos.ubicacion";
    $consu = "SELECT id, nombre, ape_pa, ape_ma, fecha_nac, fecha_def, estado FROM fosas, difuntos where fosas.ubicacion = '".$_POST['idventa']."' and fosas.ubicacion = difuntos.ubicacion";
    $cc = $mysqli->query($consu);
    $fila =mysqli_fetch_assoc($cc);

    $datosventa = null;
    if(isset($fila['id'])){
        $consu = "SELECT * from ventas where ubicacion = '".$_POST['idventa']."'";
        $cc = $mysqli->query($consu);
        $datosventa = mysqli_fetch_assoc($cc);
    }
    
    //printf("Errormessage: %s\n", $mysqli->error);
    echo json_encode(['datos' => $fila, 'datosventa' => $datosventa]);
}
else{
    $st = ["estado" => "error"];
    echo json_encode($st);
}

?>