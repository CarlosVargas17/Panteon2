<?php
require_once "Conector.php";

//SELECT * FROM `tabla` WHERE nombre='jaime' LIMIT 2,1 

if (isset($_POST['ubicacion'])){
    $ubi = $_POST['ubicacion'];
    $query = "SELECT COUNT(*) FROM difuntos as total WHERE ubicacion='$ubi'";
    $result = $mysqli->query($query);
    $data=mysqli_fetch_assoc($result);
    echo json_encode(['datos_d' => $data]);
    
}else if(isset($_POST['num'])){
    $num = $_POST['num']-1;
    $fosa = $_POST['fosa'];
    $query = "SELECT * FROM difuntos WHERE ubicacion = '$fosa' LIMIT $num,1";
    $result = $mysqli->query($query);
    $data=mysqli_fetch_assoc($result);
    echo json_encode(['datos_d' => $data]);
}else{
    $st = ["estado" => "error"];
    echo json_encode($st);
}

?>