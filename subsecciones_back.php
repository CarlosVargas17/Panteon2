<?php 
require_once "Conector.php";
    if ($_REQUEST['ele']){
        $sec = $_REQUEST['sec'];
        $sub = $_REQUEST['sub'];
        $ubi = $sec.'-'.$sub;
        $result = $mysqli->query("SELECT * FROM subsecciones WHERE seccion = '$sec'");
        $num=$result->num_rows;
        $result2=$mysqli->query("SELECT * FROM `fosas` WHERE ubicacion LIKE '$ubi%' and estado <> 'Libre' ");
        $num2=$result2->num_rows;
        if($sub<$num or $num2>0){
            ?>
            <script>
            alertify.warning('Esta sección no puede ser eliminada');
                setTimeout(recarga,1000);
            </script>
            <?php
        }else{
            $res = $mysqli->query("SELECT * FROM subsecciones WHERE id='$sub' AND seccion='$sec'");
            $row = (mysqli_fetch_row($res));
        
            if ($row[0]) {
                $query= "DELETE FROM subsecciones WHERE id='$sub' AND seccion='$sec'";
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
                alertify.warning('Solo puedes eliminar la ultima subsección o aquella sin tumbas.');
                setTimeout(recarga,1000);
                </script>
                <?php
            }
        }

    }else{
        $id = $_GET['id'];
        echo $id;
        $query = "SELECT * FROM subsecciones WHERE seccion = '$id'";
        $result = $mysqli->query($query);
    
        $val = $result->num_rows + 1;
        $num = strval($val);
        $nom = "Subsección ".$num;
        echo $nom;
        
        $query = "INSERT INTO subsecciones(id,nombre,seccion) VALUES ('$num','$nom','$id')";
        $res = $mysqli->query($query);
        if (!$res){
            echo "Error";
            die();
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    
    }

?>

