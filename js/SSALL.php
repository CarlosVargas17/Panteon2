<?php
require_once "../Conector.php";
    
    try{
        $ubicacion=$_REQUEST['ubicacion'];


        
        
        $stmt = $mysqli->query("SELECT * FROM objetos WHERE ubicacion = '$ubicacion' ");
        $res = (mysqli_fetch_row($stmt));

        
        if ($res[0]) {
            $query= "DELETE FROM objetos WHERE ubicacion = '$ubicacion' ";
            $result = $mysqli->query($query);

        
        }
        for ($i=500; $i>=1; $i--){

        $ubica=$ubicacion.'-'.$i;

        $stmt2 = $mysqli->query("SELECT * FROM fosas WHERE estado='Libre' and ubicacion ='$ubica' ");
        $res2 = (mysqli_fetch_row($stmt2));
        if ($res2[0]) {
            $query2= "DELETE FROM fosas WHERE estado='Libre' and ubicacion ='$ubica'  ";
            $result2 = $mysqli->query($query2);

        
        }
    }
        

    }
    catch(Exception $e){

        echo ("Error");
    }


?>