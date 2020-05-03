<?php
session_start();

$mysqli = new mysqli ('localhost','root','','ultratumba');
$mysqli->set_charset("utf8");
global $Desde0;
global $Hasta0;


?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reportes</title>
	<link rel="stylesheet" href="style/index_style.css">
    <link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="md/bootstrap.min.css">
	<script type="text/javascript" src="jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Catamaran&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="style/index_style.css">
</head>

<body>

<header>
	
		<div class="contenedor" id="uno">
            <a href="bienvenida.php">
			<img class="icon" src="pictures/icon1.png">
			<p class="texto" href="bienvenida.php">Inicio</p>
            
            </a>

		</div>

		<div class="contenedor" id="dos">
		<a href="secciones.php" class="texto"><img class="icon" 
			src="pictures/Mapa.png" > <p class="texto"  href="Secciones.php" >Mapa</p> </a>
		</div>

		<div class="contenedor" id="tres">
		<a href="busqueda.php" class="texto"><img class="icon" 
			src="pictures/Tumba.png" > <p class="texto"  href="busqueda.php" >Busquedas</p> </a>
		</div>

		<div class="contenedor" id="cuatro2">
			<a href="REPORTE.php" class="texto"><img class="icon" 
			src="pictures/Libreta.png" > <p class="texto"  href="REPORTE.php" >Reportes</p> </a>
		</div>

        <div class="contenedor" id="cinco">
			<a href="Ajustes_bi.php" class="texto"><img class="icon" 
			src="pictures/settings.png" > <p class="texto"  href="Ajustes_bi.php" >Ajustes</p> </a>
		</div>

		<div class="contenedor" id="seis" >
			<a href="cierrasesion.php" class="texto"><img class="icon" 
			src="pictures/exit2.png" > <p class="texto"  href="cierrasesion.php" >Cerrar</p> </a>
		</div>
		
</header>


<div class="centrado" style="text-align: center;margin-top:10px;font-size:1px"><p>Reportes de ventas</p></div>
<div class="container" style="margin-top:140px" >

                    <div class="col-sm-12">
						<div id="datatable_length">
						  <form method="GET">
							<!-- RANGO DE FECHAS A BUSCAR Y EXPORTAR -->
							<label style="font-weight: normal; font-family: Arial;position: absolute;left: 15px;">Desde: <input class="form-control" type="date" id="bd-desde" name="Desde" max="<?php $hoy=date("Y-m-d"); $hoy2=strtotime($hoy."- 0 days"); echo date("Y-m-d",$hoy2);?>" name="Hasta" onchange="fecha_n()"></label>
							<label style="font-weight: normal;font-family: Arial;position: absolute;left: 190px;">Hasta: <input class="form-control" type="date" id="bd-hasta" max="<?php $hoy=date("Y-m-d"); $hoy2=strtotime($hoy."- 0 days"); echo date("Y-m-d",$hoy2);?>" name="Hasta" onchange="fecha_d()"/></label>
							<input name="buscar" id="rango_fecha" class="btn btn-sm btn-primary" type="submit" value='Buscar' style="position:absolute;left:360px;top:70px;font-family: Arial;">
							<!-- BOTON PARA EXPORTAR EL RANGO DE FECHAS -->
							<input name='report' type="submit" value="Exportar PDF" class=" btn btn-sm btn-danger" style="position: absolute;top: 70px;left:425px;font-family: Arial;">
                            <input name='todo' type="submit" value="Mostrar todo" class=" btn btn-sm btn-success" style="position: absolute;top: 70px;left:530px;font-family: Arial;">
                         </form>
						</div>
					</div>
		

			<table class="table table-striped table-fixed" style="top: 260px;position: absolute;left: 83px;">
					<thead class="thead-light">
					   <tr width="680px">
						   <th scope="col" width="50px" style="font-family: Arial;" >N°</th>
						   <th scope="col" width="238px" style="font-family: Arial;">Comprador</th>
						   <th scope="col" width="130px" style="font-family: Arial;">Fecha</th>
						   <th scope="col" width="180px" style="font-family: Arial;">Número de recibo</th>
						   <th scope="col" width="150px"  style="font-family: Arial;">Id de difunto</th>
						   <th scope="col"  width="170px" style="font-family: Arial;">Ubicación</th>
						   <th scope="col"  width="164px" style="font-family: Arial;">Usuario</th>
				    	</tr>
                    </thead>
                    <tbody style="background: white;">

                      <?php
                      $opcion=2;
                      if (isset($_GET['buscar'])){
                           $Desde0=$_GET['Desde'];
                           $Hasta0=$_GET['Hasta'];
                           $_SESSION['Desde']=$Desde0;
                           $_SESSION['Hasta']=$Hasta0;
                           if (empty($Desde0) and empty($Hasta0)){
                                 DATOS("","");    
                              }
                            
                           elseif (isset($Desde0) and isset($Hasta0)){
                                  $Desde0=$_GET['Desde'];
                                  $Hasta0=$_GET['Hasta'];  
                                  //------------------VERIFICAR SI HAY RANGO-------------------------
                                  $NFind="SELECT DISTINCT v.id,v.nombre_c,v.ape_pa,v.ape_ma,v.fecha, v.num_recibo,
                                          v.id_difunto,d.ubicacion,v.usuario FROM ventas v, difuntos d 
                                          WHERE v.id_difunto = d.id AND v.fecha BETWEEN '$Desde0' AND '$Hasta0'";
                                  $Fech_Find=$mysqli -> query($NFind);
                                  $Find=mysqli_fetch_array($Fech_Find);
                                  //------------------------------------------------------------------
                                  if(empty($Find)){
                                      DATOS("","");
                                      }
                                  else{
                                      DATOS($Desde0,$Hasta0);
                                      }
                            }
                           
                      }
                      elseif(isset($_GET['report'])){
                          $Desde0= $_SESSION['Desde'];
                          $Hasta0= $_SESSION['Hasta'];
                          header("location:PDFG.php?Desde0=$Desde0&Hasta0=$Hasta0");
                      }
                      elseif(isset($_GET['todo'])){
                          $result1="SELECT Min(fecha) FROM ventas";
                          $old_fech=$mysqli -> query($result1);
                          $old=mysqli_fetch_array($old_fech);
                          $Desde01=$old[0];
      
                          $result2="SELECT Max(fecha) FROM ventas";
                          $rec_fech=$mysqli->query($result2);
                          $rec=mysqli_fetch_array($rec_fech);
                          $Hasta01=$rec[0];
                          $_SESSION['Desde']=$Desde01;
                          $_SESSION['Hasta']=$Hasta01;
                          DATOS($Desde01,$Hasta01);  
                      }
                      
                     
                      
//-------------      -----FUNCION ENCARGADA DE CONSULTAR Y RECIBIR PARAMETROS-------------------
                      function DATOS($Desde0,$Hasta0){
                          if($Desde0!="" and $Hasta0!=""){
                            $mysqli = new mysqli ('localhost','root','','ultratumba');
                            $mysqli->set_charset("utf8");
                            $fecha_c="SELECT DISTINCT v.id,v.nombre_c,v.ape_pa,v.ape_ma,v.fecha, v.num_recibo,
                            v.id_difunto,d.ubicacion,v.usuario FROM ventas v, difuntos d 
                            WHERE v.id_difunto = d.id AND v.fecha BETWEEN '$Desde0' AND '$Hasta0' ORDER BY v.fecha";
                            $res_fech=$mysqli -> query($fecha_c);
				            while ($fila = mysqli_fetch_assoc($res_fech))
			                	{
				      	            echo'<tr>
                                         <td scope="col" width="50px">'.$fila["id"].'</td>
                                         <td scope="col" width="238px">'.$fila["nombre_c"]." ".$fila["ape_pa"]." ".$fila["ape_ma"].'</td>
                                         <td scope="col" width="130px">'.$fila["fecha"].'</td>
                                         <td scope="col" width="180px">'.$fila["num_recibo"].'</td>
                                         <td scope="col" width="150px">'.$fila["id_difunto"].'</td>
                                         <td scope="col"  width="160px">'.$fila["ubicacion"].'</td>
                                         <td scope="col"  width="174px">'.$fila['usuario'].'</td>
				      	               </tr>';
                                }
                           }
                          else{
                            echo'<tr>
                            <td scope="col" width="50px">'.''.'</td>
                            <td scope="col" width="238px">'.''.'</td>
                            <td scope="col" width="130px">'.''.'</td>
                            <td scope="col" width="180px">'.'Búsqueda   sin   resultados'.'</td>
                            <td scope="col" width="150px">'.''.'</td>
                            <td scope="col"  width="160px">'.''.'</td>
                            <td scope="col"  width="174px">'.''.'</td>
                            </tr>';
                           }
                          
                        }
				      	?>
				    </tbody>
			</table>
	</div>
  </div>
</body>
</html>

<script>

        function fecha_n(){
            var min = document.getElementById("bd-desde").value;
            if (min==""){
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();
                 if(dd<10){
                        dd='0'+dd
                    } 
                    if(mm<10){
                        mm='0'+mm
                    } 
                
                today = yyyy+'-'+mm+'-'+dd;
                document.getElementById("bd-hasta").setAttribute("max", today);
            }
            document.getElementById("bd-hasta").setAttribute("min", min);
            
            
        }
        function fecha_d(){
            var max = document.getElementById("bd-hasta").value;
            if (max==""){
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();
                 if(dd<10){
                        dd='0'+dd
                    } 
                    if(mm<10){
                        mm='0'+mm
                    } 
                
                today = yyyy+'-'+mm+'-'+dd;
                document.getElementById("bd-desde").setAttribute("max", today);
            }else{
                document.getElementById("bd-desde").setAttribute("max", max);
            }
            
        }

</script>
