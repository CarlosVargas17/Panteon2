<?php
    require_once "Conector.php";

    $salida="";
    $o = $mysqli->real_escape_string($_POST['orden']);
    $t = $mysqli->real_escape_string($_POST['tabla']);
    $num_pp = $mysqli->real_escape_string($_POST['num_pp']);
    $start = $mysqli->real_escape_string($_POST['start']);
    if ($o=="id"){
        $query="SELECT * FROM $t where ape_pa <> '' order by $o+0 limit $start,$num_pp";
    }else{
        $query="SELECT * FROM $t where ape_pa <> '' order by $o limit $start,$num_pp";
    }
    $q2 = "SELECT * FROM $t where ape_pa <> ''";

    $r2 = $mysqli->query($q2);
    $total = mysqli_num_rows($r2);
    $tot_pages = ceil($total/$num_pp);

    if(isset($_POST['consulta']) and $_POST['consulta']!=''){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $f = $mysqli->real_escape_string($_POST['filtro']);
        if($o=="id"){
            $query = "SELECT * FROM $t WHERE $f LIKE '%".$q."%' and ape_pa <> '' ORDER BY $o+0 limit $start,$num_pp";
        }else{
            $query = "SELECT * FROM $t WHERE $f LIKE '%".$q."%' and ape_pa <> '' ORDER BY $o limit $start,$num_pp";
        }
    }

    $resultado = $mysqli->query($query);
    $c=0;
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
                    $nombre=strval($fila['nombre']);
                    $salida.="<tr>
                    <td>".$fila['id']."</td>
                    <td>".$fila['nombre']."</td>
                    <td>".$fila['ape_pa']."</td>
                    <td>".$fila['ape_ma']."</td>
                    <td>".$fila['fecha_nac']."</td>
                    <td>".$fila['fecha_def']."</td>
                    <td>".$fila['ubicacion']."</td>
                    <td>
                    <a class='btn btn-primary' id='boton' onclick='abre(this)'>
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
                            <a class='btn btn-primary' id='boton' onclick='abre2(this)'>
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
    for($i=1;$i<=$tot_pages;$i++){
        echo "<a href='busqueda.php?page=".$i."&table=".$t."' class='btn btn-success'>$i</>";
    }
    $mysqli->close();

?>