<?php 
    require_once "Conector.php";
    if($_REQUEST['ele']){
        $ele=$_REQUEST['ele'];
        $ubicacion=$_REQUEST['ubicacion'];
        $res = $mysqli->query("SELECT * FROM secciones");
        $res2 = $mysqli->query("SELECT * FROM subsecciones WHERE seccion='$ubicacion'");
        if ($ubicacion<$res->num_rows or $res2->num_rows>0){
            ?>
            <script>
            alertify.warning('Esta sección no puede ser eliminada');
                setTimeout(recarga,1000);
            </script>
            <?php
        }else{
            $res = $mysqli->query("SELECT * FROM secciones WHERE id='$ubicacion'");
            $row = (mysqli_fetch_row($res));
        
            if ($row[0]) {
                $query= "DELETE FROM secciones WHERE id = '$ubicacion'";
                $result = $mysqli->query($query);
                ?>
                <script>
                alertify.success('Se ha eliminado la sección');
                setTimeout(recarga,1500);
                </script>
                <?php

            }
            else{
                ?>
                <script>
                alertify.warning('Solo puedes eliminar la ultima sección o aquella sin subsecciónes.');
                setTimeout(recarga,1000);
                </script>
                <?php
            }
        
        }
    }else{

        $query = "SELECT * FROM secciones";
        $result = $mysqli->query($query);
    
        $val = $result->num_rows + 1;
        $num = strval($val);
        $nom = "Sección ".$num;
        echo $nom;
        $query = "INSERT INTO secciones(id,nombre) VALUES ('$num','$nom')";
        $res = $mysqli->query($query);
        if (!$res){
            echo "Error";
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    
    }

?>