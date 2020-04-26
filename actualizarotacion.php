<?php




try{
    $ide=$_REQUEST['ide'];
    $sec=$_REQUEST['sec']; 
    $subsec=$_REQUEST['subsec'];
    $ubicacion=$_REQUEST['ubicacion'];
    $rot=$_REQUEST['rot'];
    $width=$_REQUEST['tama'];
    $height=$_REQUEST['tama2'];

    $mysqli = new mysqli('localhost', 'root', '', 'ultratumba');
    $mysqli->set_charset("utf8");

    $stmt = $mysqli->query("SELECT * FROM objetos WHERE id = '$ide' and ubicacion = '$ubicacion' ");
    $res = (mysqli_fetch_row($stmt));

    
    if ($res[0]) {
        //aqui lo que hago es rotar la imagen y ademas cambio el width por el height y al reves para girar dimensiones
        $query= "UPDATE objetos set rotacion='$rot',width='$height',height='$width' WHERE id = '$ide' and ubicacion = '$ubicacion' ";
        $result = $mysqli->query($query);
    
        
        
    
    }
}
catch(Exception $e){

    echo ("Error");
}



?>
