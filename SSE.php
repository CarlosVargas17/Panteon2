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
            ?>
            <script>
            alertify.success('Se ha eliminado el elemento');
            setTimeout(recarga,1500);
            </script>
            <?php
        
        }
        else{
            ?>
            <script>
            alertify.warning('Este elemento no puede ser eliminado');
            setTimeout(recarga,1000);
            </script>
            <?php
        }
        

    }
    catch(Exception $e){

        echo ("Error");
    }
?>