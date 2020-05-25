<?php
require_once "Conector.php";

if (isset($_POST['id'])){
    $id=(int)$_POST['id'];
    $tabla=$_POST['tabla'];
    $ubicacion=$_POST['ubicacion'];
    if ($tabla=='difuntos'){
        $mysqli->begin_transaction();
        $q="SELECT * FROM difuntos WHERE ubicacion='$ubicacion'";
        $r=$mysqli->query($q);
        $num=mysqli_num_rows($r);
        if ($num==1){
            $query = "UPDATE difuntos 
            SET nombre='', ape_pa='', ape_ma='', fecha_nac='', fecha_def='' WHERE id=$id";
            $q2="UPDATE fosas SET estado='apartada' WHERE ubicacion='$ubicacion'";
            $r2=$mysqli->query($q2);
            if(!$r2){
                $mysqli->rollback();
                $st = ["estado" => "error_dif",
                        "id"=>$result1];
                echo json_encode(['datos'=>$st]);
                die();
            }
        }else{
            $query = "DELETE FROM difuntos WHERE id=$id";
        }
        $result1=$mysqli->query($query);
        if(!$result1){
            $mysqli->rollback();
            $st = ["estado" => "error_dif",
                    "id"=>$result1];
            echo json_encode(['datos'=>$st]);
            die();
        }
        $mysqli->commit();
        $st = ["estado" => "exito"];
        echo json_encode(['datos'=>$st]);
        die();
    }else{
        $query2="DELETE FROM difuntos WHERE ubicacion='$ubicacion'";
        $query="DELETE FROM ventas WHERE id=$id";

        $mysqli->begin_transaction();
        $result1=$mysqli->query($query);
        if(!$result1){
            $mysqli->rollback();
            $st = ["estado" => "error1"];
            echo json_encode(['datos'=>$st]);
            die();
        }
        $result2=$mysqli->query($query2);
        if(!$result2){
            $mysqli->rollback();
            $st = ["estado" => "error2"];
            echo json_encode(['datos'=>$st]);
            die();
        }
        $q2="UPDATE fosas SET estado='Libre' WHERE ubicacion='$ubicacion'";
        $r2=$mysqli->query($q2);
        if(!$r2){
            $mysqli->rollback();
            $st = ["estado" => "error3",
                    "id"=>$r2];
            echo json_encode(['datos'=>$st]);
            die();
        }
        $mysqli->commit();

        $st = ["estado" => "exito"];
        echo json_encode(['datos'=>$st]);
        die();
    }

}

?>