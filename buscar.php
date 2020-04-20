<?php
    $mysqli = new mysqli("localhost","root","","ultratumba");

    $salida="";
    $o = $mysqli->real_escape_string($_POST['orden']);
    $t = $mysqli->real_escape_string($_POST['tabla']);
    $query="SELECT * FROM $t ORDER BY $o";

    if(isset($_POST['consulta']) and $_POST['consulta']!=''){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $f = $mysqli->real_escape_string($_POST['filtro']);
        $query = "SELECT * FROM $t WHERE $f LIKE '%".$q."%' ORDER BY $o+0";
    }

    $resultado = $mysqli->query($query);

    if($resultado->num_rows > 0){
        if ($t=='difuntos'){
            $salida.="<table class='table table-striped table-bordered table-hover'>
            <thead class='thead-dark'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ape. Pa.</th>
                    <th>Ape. Ma.</th>
                    <th>Fecha N</th>
                    <th>Fecha D</th>
                    <th>Ubicación</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbbody>";
            while($fila = $resultado->fetch_assoc()){
                if($fila['nombre']!=""){
                    $salida.="<tr>
                    <td>".$fila['id']."</td>
                    <td>".$fila['nombre']."</td>
                    <td>".$fila['ape_pa']."</td>
                    <td>".$fila['ape_ma']."</td>
                    <td>".$fila['fecha_nac']."</td>
                    <td>".$fila['fecha_def']."</td>
                    <td>".$fila['ubicacion']."</td>
                    <td>
                    <a class='btn btn-primary' data-toggle='modal' data-target='#modal1'>
                        <i class='fas fa-marker'></i>
                    </a>
                    <a href='elimina_dif.php?id=".$fila['id']."' class='btn btn-danger'>
                        <i class='fas fa-trash-alt'></i>
                    </a>
                    </td>
                    </tr>";
                }
            
            }
            $salida.="</tbody></table>";
        }else{
            $salida.="<table class='table table-striped table-bordered table-hover'>
            <thead class='thead-dark'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ape. Pa.</th>
                    <th>Ape. Ma.</th>
                    <th>Calle</th>
                    <th>Número</th>
                    <th>Colonia</th>
                    <th>Fecha</th>
                    <th>Núm. Recibo</th>
                    <th>Usuario</th>
                    <th>Presidente</th>
                    <th>Ubicación</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbbody>";
            while($fila = $resultado->fetch_assoc()){
                $con="SELECT * FROM difuntos WHERE id=".$fila['id_difunto'];
                $res=$mysqli->query($con);
                $fila2=$res->fetch_assoc();
                $salida.="<tr>
                            <td>".$fila['id']."</td>
                            <td>".$fila['nombre_c']."</td>
                            <td>".$fila['ape_pa']."</td>
                            <td>".$fila['ape_ma']."</td>
                            <td>".$fila['calle']."</td>
                            <td>".$fila['numero']."</td>
                            <td>".$fila['colonia']."</td>
                            <td>".$fila['fecha']."</td>
                            <td>".$fila['num_recibo']."</td>
                            <td>".$fila['usuario']."</td>
                            <td>".$fila['presidente']."</td>
                            <td>".$fila2['ubicacion']."</td>
                            <td>
                            <a class='btn btn-primary' data-toggle='modal' data-target='#modal1'>
                                <i class='fas fa-marker'></i>
                            </a>
                            <a href='elimina_dif.php?id=".$fila2['id']."' class='btn btn-danger'>
                                <i class='fas fa-trash-alt'></i>
                            </a>
                            </td>
                        </tr>";
            
            }
            $salida.="</tbody></table>";
        }
    }else{
        $salida.="No hay datos";
    }

    echo $salida;
    $mysqli->close();

?>