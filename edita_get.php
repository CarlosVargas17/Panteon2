<?php

if(isset($_POST["id"])){
    $mysqli = new mysqli('localhost', 'root', '', 'ultratumba');
    $mysqli->set_charset("utf8");

    $id = $_POST["id"];
    $t = $_POST["tabla"];
    if ($t=="difuntos"){
        $ubi = $_POST['ubi'];
        $query="SELECT * FROM ventas WHERE id_difunto=$id";
        $query2="SELECT estado FROM fosas WHERE ubicacion='$ubi'";
    }else{
        $query="SELECT * FROM difuntos WHERE ubicacion='$id'";
        $query2="SELECT estado FROM fosas WHERE ubicacion='$id'";
    }

    $cc = $mysqli->query($query);
    $cc2 = $mysqli->query($query2);
    
    $fila =mysqli_fetch_assoc($cc);
    $fila2 = mysqli_fetch_assoc($cc2);
    echo json_encode(['datos' => $fila, 'estado' => $fila2]);
}else{
    $st = ["estado" => "error"];
    echo json_encode($st);
}

?>