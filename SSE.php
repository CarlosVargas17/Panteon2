<?php
    require_once "Conector.php";
    try{
        $ele=$_REQUEST['ele'];
        $ubicacion=$_REQUEST['ubicacion'];


        

        $stmt = $mysqli->query("SELECT * FROM objetos WHERE id = '$ele' and ubicacion = '$ubicacion' ");
        $res = (mysqli_fetch_row($stmt));

        
        if ($res[0]) {
            $query= "DELETE FROM objetos WHERE id = '$ele' and ubicacion = '$ubicacion' ";
            $result = $mysqli->query($query);
        
        }
        

    }
    catch(Exception $e){

        echo ("Error");
    }
?>