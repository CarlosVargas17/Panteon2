<?php
    
    try{
        $ele=$_REQUEST['ele'];
        $x=$_REQUEST['x3']; 
        $y=$_REQUEST['y3'];
        $ubicacion=$_REQUEST['ubicacion'];

        $mysqli = new mysqli('localhost', 'root', '', 'ultratumba');
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->query("SELECT * FROM objetos WHERE id = '$ele' and ubicacion = '$ubicacion' ");
        $res = (mysqli_fetch_row($stmt));

        
        if ($res[0]) {
            $query= "UPDATE objetos set s_top='$y', s_left='$x' WHERE id = '$ele' and ubicacion = '$ubicacion' ";
            $result = $mysqli->query($query);
            
        
        }
        else {
        $estado='Libre';
        $query = "INSERT INTO objetos(id,ubicacion,s_top,s_left) VALUES ('$ele','$ubicacion','$y','$x')";
        $result = $mysqli->query($query);

        }


    }
    catch(Exception $e){

        echo ("Error");
    }
?>