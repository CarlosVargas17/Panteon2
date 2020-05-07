<?php
    require_once "Conector.php";
    try{
        
        $ubicacion=$_REQUEST['ubicacion'];


        $stmt = $mysqli->query("SELECT * FROM fosas WHERE ubicacion = '$ubicacion' and estado='Libre' ");
        $res = (mysqli_fetch_row($stmt));

        
        if ($res[0]) {
            $query= "DELETE FROM fosas WHERE ubicacion = '$ubicacion' and estado='Libre' ";
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

        ?>
            <script>
            alertify.error('HA OCURRIDO UN ERROR INESPERADO');
            setTimeout(recarga,1000);
            </script>
            <?php
    }
?>