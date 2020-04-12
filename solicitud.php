
<?php

if(isset($_POST['id'])){
    $id=($_POST['id']);
    $mysqli = new mysqli('localhost', 'root', '', 'ultratumba');
    $mysqli->set_charset("utf8");
    $consu="SELECT * FROM difuntos where ubicacion='".$id."' LIMIT 0,1";
    $res = $mysqli->query($consu);
    $f=mysqli_fetch_assoc($res);
    echo json_encode($f);
}
else{
    $st = ["estado" => "error"];
    echo json_encode($st);
}
?>