<?php
require "Conector.php";
session_start();
$usuario = $_SESSION["User"];
$stmt = $mysqli->query("SELECT * FROM usuarios WHERE User='$usuario' ");
$stmt2 = $mysqli->query("SELECT * FROM ventanas WHERE ventana='Reportes' ");
$res = (mysqli_fetch_row($stmt));
$res2 = (mysqli_fetch_row($stmt2));
$accesoedit=$res2[1];
if ($res[4]=='Administrador'){
    if ($accesoedit=='Administrador'){
        $acceder='Administrador';
    }
    else{
    $acceder='Administrador/Usuario';
}
}
else{
	$acceder='Administrador/Usuario';
}

if ($res[5]=='No aprobado' or $usuario==''){
  header("Location: denegado.php");
}

else{
if ($accesoedit!=$acceder){
  header("Location: denegado2.php");
  }
}
?>



<?php
require "Conector.php";
?> 

<?php
ob_start();
?>
<?php



global $Desde0;
global $Hasta0;
$var=0;


?>
<?php
$seccion="SELECT id,nombre FROM secciones ORDER BY id ASC";
$res_secc=$mysqli -> query($seccion);
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <link rel="icon"  type="image/png" href="Icon.png">
	<title>Reportes</title>
  <link rel="stylesheet" href="style/index_style.css">
  
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/report.css">
	<link rel="stylesheet" href="md/bootstrap.min.css">
    <script type="text/javascript" src="jquery.min.js"></script>
    
  <link href="https://fonts.googleapis.com/css?family=Catamaran&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="style/index_style.css">
  
  <script language="javascript">
    $(document).ready(function(){
      $("#cbx_seccion").change(function(){
        $("#cbx_seccion option:selected").each(function(){
          id=$(this).val();
          $.post("getSubseccion.php",{id:id
          }, function(data){
            $("#cbx_subseccion").html(data);
          });
        });

      });
    });
  
  </script>
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
			src="pictures/Tumba.png" > <p class="texto"  href="busqueda.php" >Búsquedas</p> </a>
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

<section class="example2">
    
    <ul class="cuadrados">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>



<div class="centrado" style="text-align: center;font-size:1px;"><p>Reportes</p></div>
        
         
                  <form method="GET" >
			 	                 <!-- RANGO DE FECHAS A BUSCAR Y EXPORTAR -->
					             	<label style="font-weight: normal; font-family: Arial;position: absolute;margin-top:16%;left: 3%;color:#fff;width: 11%;">Desde: <input style='' class="formControlReport" type="date" id="bd-desde" name="Desde" max="<?php $hoy=date("Y-m-d"); $hoy2=strtotime($hoy."- 0 days"); echo date("Y-m-d",$hoy2);?>" onchange="fecha_n()"/></label>
						            <label style="font-weight: normal;font-family: Arial;position: absolute;margin-top:16%;left:20%;color:#fff;width: 11%;">Hasta: <input style='' class="formControlReport" type="date" id="bd-hasta" name="Hasta"  max="<?php $hoy=date("Y-m-d"); $hoy2=strtotime($hoy."- 0 days"); echo date("Y-m-d",$hoy2);?>"  onchange="fecha_d()"/></label>
                        
                        <input name="buscar" id="rango_fecha" class="btn btn-sm btn-primary" type="submit" value='Buscar' style="position:absolute;margin-top:18%;left:68%;font-family: Arial;">
						             <!-- BOTON PARA EXPORTAR EL RANGO DE FECHAS -->
					            	<input name='report' id='reporte' type="submit" value="Exportar PDF" class=" btn btn-sm btn-danger" style="position: absolute;margin-top:18%;left:76%;font-family: Arial;">
                        <input name='todo' type="submit" value="Mostrar todo" class=" btn btn-sm btn-success" style="position: absolute;margin-top:18%;left:87%;font-family: Arial;">
                        
                        <!---SELECT PARA SELECCIONAR SECCIONES-->
                       
                        
                        <label style="font-weight: normal; font-family: Arial;position: absolute;margin-top:16%;left:35%;color:#fff; width:10%;">Secciones:
                              <select class="formControlSelect"  name="cbx_seccion" id="cbx_seccion"  style="">
                               <option value="0">Sección</option>
                               <?php while($row=$res_secc->fetch_assoc()){?>
                               <option value="<?php echo $row['id'];?>"><?php echo $row['nombre'];?>
                               </option>
                               <?php } ?> 
                               </select> 
                        </label>
                        <label style="font-weight: normal; font-family: Arial;position: absolute;margin-top:16%;left:50%;color:#fff; width:12%;">Subsecciones:
                                <!---SELECT PARA SELECCIONAR SUBSECCIONES-->
                                <select  onchange="valida()" class="formControlSelect2" id="cbx_subseccion" name="cbx_subseccion"  style="">   
                               </select>
                        </label>
                       
                        <!--<input name="buscar2"  class="btn btn-sm btn-primary" type="submit" value='Buscar' style="position:absolute;left:1075px;top:70px;font-family: Arial;">--> 
                  </form>
               
        
              
                <table class="table table-striped table-fixed" style="position:absolute;margin-top:23%;left:3%;">
				            	<thead class="thead-light" >
                      <tr  >
						                <th scope="col" width="2.5%" style="font-family: Arial;" >N°</th>
						                <th scope="col" width="18%" style="font-family: Arial;">Comprador</th>
						                <th scope="col" width="9.7%" style="font-family: Arial;">Fecha</th>
						                <th scope="col" width="13%" style="font-family: Arial;">Número de recibo</th>
						                <th scope="col"  width="12%" style="font-family: Arial;">Difuntos en fosa</th>
						                <th scope="col"  width="9.5%" style="font-family: Arial;">Ubicación</th>
						                <th scope="col"  width="12.5%" style="font-family: Arial;">Usuario</th>
				             	</tr>
                       </thead>
                      <tbody style="background: white;">
                    <script>$('#reporte').attr("disabled", true);</script>
                    <?php
                    
                
                    if (isset($_GET['buscar'])){ 
                            
                               $Desde0=$_GET['Desde'];
                               $Hasta0=$_GET['Hasta'];
                               $Seccion0=$_GET['cbx_seccion'];
                               $Subseccion0='';
                               if(!isset($_GET['cbx_subseccion'])){
                                      $Subseccion0='';

                                      }
                                      else{
                                          $Subseccion0=$_GET['cbx_subseccion'];
                                      }
                               $_SESSION['cbx_seccion']=$Seccion0;
                               $_SESSION['cbx_subseccion']=$Subseccion0;
                               $_SESSION['Desde']=$Desde0;
                               $_SESSION['Hasta']=$Hasta0;


                               $_SESSION['uni_seccion']="";
                               $_SESSION['uni_subseccion']="";
                               
                            
                               if(empty($Subseccion0) and empty($Seccion0) and empty($Desde0) and empty($Hasta0)){
                                  DATOS("","");  
                               }
                               elseif(isset($Desde0) and isset($Hasta0) and empty($Subseccion0) and empty($Seccion0)){
                                    $Desde0=$_GET['Desde'];
                                    $Hasta0=$_GET['Hasta'];  
                                    //------------------VERIFICAR SI HAY RANGO-------------------------
                                    $NFind="SELECT DISTINCT * FROM ventas
                                            WHERE fecha BETWEEN '$Desde0' AND '$Hasta0'";
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
                               elseif(empty($Desde0) and empty($Hasta0) and $Subseccion0!='' and $Seccion0!=''){
                                    
                                    $seccion01=$_GET['cbx_seccion'];
                                    $subseccion01=$_GET['cbx_subseccion'];
                                    $num_seccion="SELECT id,nombre from secciones where id='$seccion01'";
                                    $num_subseccion="SELECT id,nombre from subsecciones where id_num='$subseccion01'";
                                    $rec_se01=$mysqli->query($num_seccion);
                                    $rec_su01=$mysqli->query($num_subseccion);
                                    $filat = mysqli_fetch_assoc($rec_se01);
                                    $filat2 = mysqli_fetch_assoc($rec_su01);
                                    $var=$filat["id"].'-'.$filat2["id"];
                                    $seccionv=$filat["id"];
                                    $subseccionv=$filat2["id"];
                                    $_SESSION['uni_seccion']=$seccionv;
                                    $_SESSION['uni_subseccion']=$subseccionv;
                                    $_SESSION['var']=$var;
                                    SECCSUB($var);
                                    
                               }
                               elseif($Desde0!='' and $Hasta0!='' and $Subseccion0!='' and $Seccion0!=''){
                                   
            //===================subseccion y secciones========================================
                                    $seccion01=$_GET['cbx_seccion'];
                                    $subseccion01=$_GET['cbx_subseccion'];
                                    $num_seccion="SELECT id,nombre from secciones where id='$seccion01'";
                                    $num_subseccion="SELECT id,nombre from subsecciones where id_num='$subseccion01'";
                                    $rec_se01=$mysqli->query($num_seccion);
                                    $rec_su01=$mysqli->query($num_subseccion);
                                    $filat = mysqli_fetch_assoc($rec_se01);
                                    $filat2 = mysqli_fetch_assoc($rec_su01);
                                    $var=$filat["id"].'-'.$filat2["id"];
                                    $Desde0=$_GET['Desde'];
                                    $Hasta0=$_GET['Hasta'];
                                    $seccionv=$filat["id"];
                                    $subseccionv=$filat2["id"];
                                    $_SESSION['uni_seccion']=$seccionv;
                                    $_SESSION['uni_subseccion']=$subseccionv;
                                    $_SESSION['var']=$var;
                                    Mixer($var,$Desde0,$Hasta0);
      
            

                               }
                               elseif(isset($Desde0) and isset($Hasta0) and $Subseccion0=="" and $Seccion0!=""){
                                    $seccion01=$_GET['cbx_seccion'];
                                    $num_seccion="SELECT id,nombre from secciones where id='$seccion01'";
                            
                                    $rec_se01=$mysqli->query($num_seccion);
                    
                                    $filat = mysqli_fetch_assoc($rec_se01);
                                    $var=$filat["id"];
                                    $Desde0=$_GET['Desde'];
                                    $Hasta0=$_GET['Hasta'];
                                    $seccionv=$filat["id"];
                                    $_SESSION['uni_seccion']=$seccionv;
                                    $_SESSION['var']=$var;
                                    Mixer($var,$Desde0,$Hasta0);
                               }
                               else{
                                    DATOS("","");
                               }
                              
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
                        $_SESSION['var']="";
                        $Seccionr0=$_SESSION['uni_seccion']="";
                        $_SESSION['uni_subseccion']='';
                        DATOS($Desde01,$Hasta01);  
                   }
                   elseif(isset($_GET['report'])){
                        $Desde0= $_SESSION['Desde'];
                        $Hasta0= $_SESSION['Hasta'];
                        //$Seccion0=$_SESSION['cbx_seccion'];
                        //$Subseccion0=$_SESSION['cbx_subseccion'];
                        $Seccionr0=$_SESSION['uni_seccion'];
                        $Subseccionr0=$_SESSION['uni_subseccion'];


                        $var=$_SESSION['var'];
        
                        header("location:PDFG.php?Desde0=$Desde0&Hasta0=$Hasta0&var=$var&Seccion0=$Seccionr0&Subseccion0=$Subseccionr0");
                   }

                          


                   //===================================FUNCIONES MIXTAS FECHA Y SECCIONES===========================
                   function Mixer($var,$Desde0,$Hasta0){
                   
                    require "Conector.php";

                    $mixt="SELECT DISTINCT * FROM ventas WHERE fecha BETWEEN '$Desde0' AND '$Hasta0' AND ubicacion LIKE '".$var."%'";
                    $mix_result=$mysqli -> query($mixt);
                    $ab=0;
                    if (mysqli_num_rows($mix_result)!=0){
				          while ($fila = mysqli_fetch_assoc($mix_result))
                          {   $ab+=1;
                            $ubi=$fila['ubicacion'];
                            $q="SELECT ubicacion FROM difuntos WHERE ubicacion='$ubi'";
                            $r=$mysqli->query($q);
                            $num=mysqli_num_rows($r);
				      	            echo'<tr>
                                         <td scope="col" width="2.7%">'.$ab.'</td>
                                         <td scope="col" width="20%">'.$fila["nombre_c"]." ".$fila["ape_pa"]." ".$fila["ape_ma"].'</td>
                                         <td scope="col" width="12.3%">'.$fila["fecha"].'</td>
                                         <td scope="col" width="14%">'.$fila["num_recibo"].'</td>
                                         <td scope="col"  width="12%">'.$num.'</td>
                                         <td scope="col"  width="12%">'.$fila["ubicacion"].'</td>
                                         <td scope="col"  width="11.5%">'.$fila['usuario'].'</td>
                               </tr>';
                               echo"<script>$('#reporte').attr('disabled', false);</script>";
                                }
                    }
                    else{
                                         echo'<tr>
                                         <td scope="col" width="2.7%>'.''.'</td>
                                         <td scope="col" width="20%">'.''.'</td>
                                         <td scope="col" width="12.3%">'.''.'</td>
                                         <td scope="col" width="14%">'.'Búsqueda   sin   resultados'.'</td>
                                         <td scope="col"  width="12%">'.''.'</td>
                                         <td scope="col"  width="12%">'.''.'</td>
                                         <td scope="col"  width="11.5%">'.''.'</td>
                                         </tr>';
                                         //$_SESSION['Desde']='';
                                         //$_SESSION['Hasta']='';
                                         //$_SESSION['var']='';
                        }
                
                    }






                      
                     
//==========================FUNCIONES QUE CONSULTAN LAS FECHAS Y SUBSECCIONES====================

//--------------------------FUNCION ENCARGADA DE CONSULTAR Y RECIBIR PARAMETROS------------------
//-----------------------------------------------------------------------------------------------
                      function DATOS($Desde0,$Hasta0){
                          if($Desde0!="" and $Hasta0!=""){
                            require "Conector.php";
                            $fecha_c="SELECT DISTINCT * FROM ventas 
                            WHERE ubicacion AND fecha BETWEEN '$Desde0' AND '$Hasta0'";
                            //$fecha_c="SELECT DISTINCT * FROM ventas 
                            //WHERE fecha BETWEEN '$Desde0' AND '$Hasta0' ORDER BY fecha";
      

                            $res_fech=$mysqli -> query($fecha_c);
                            $a=0;
				            while ($fila = mysqli_fetch_assoc($res_fech))
                        { $a+=1;
                          $ubi=$fila['ubicacion'];
                          $q="SELECT ubicacion FROM difuntos WHERE ubicacion='$ubi'";
                          $r=$mysqli->query($q);
                          $num=mysqli_num_rows($r);
				      	            echo'<tr>
                                         <td scope="col" width="2.7%">'.$a.'</td>
                                         <td scope="col" width="20%">'.$fila["nombre_c"]." ".$fila["ape_pa"]." ".$fila["ape_ma"].'</td>
                                         <td scope="col" width="10.3%">'.$fila["fecha"].'</td>
                                         <td scope="col" width="14%">'.$fila["num_recibo"].'</td>
                                         <td scope="col"  width="12%">'.$num.'</td>
                                         <td scope="col" width="12%">'.$fila["ubicacion"].'</td>
                                         <td scope="col"  width="11.5%">'.$fila['usuario'].'</td>
                               </tr>';
                               echo"<script>$('#reporte').attr('disabled', false);</script>";
                                }
                           }
                          else{
                            echo'<tr>
                            <td scope="col" width="2.7%">'.''.'</td>
                            <td scope="col" width="20%">'.''.'</td>
                            <td scope="col" width="10.3%">'.''.'</td>
                            <td scope="col" width="14%">'.'Búsqueda   sin   resultados'.'</td>
                            <td scope="col"  width="12%">'.''.'</td>
                            <td scope="col"  width="12%">'.''.'</td>
                            <td scope="col"  width="11.5%">'.''.'</td>
                            </tr>';
                           }
                          
                        }
                    
//-------------------------FUNCION ENCARGADA DE CONSULTAR LAS SECCIONES--------------------------

//================================================================================================
                    function SECCSUB($var){
                      $_SESSION['var']=$var;

                      if($var!=""){
                        
                          require "Conector.php";

                        $fecha_c="SELECT DISTINCT * FROM ventas WHERE ubicacion LIKE '".$var."%'";
                        $res_fech=$mysqli -> query($fecha_c);
                        $i=0;
                        
                        if (mysqli_num_rows($res_fech)!=0){
                           while ($fila = mysqli_fetch_assoc($res_fech)){
                                $i+=1;
                                $ubi=$fila['ubicacion'];
                                $q="SELECT ubicacion FROM difuntos WHERE ubicacion='$ubi'";
                                $r=$mysqli->query($q);
                                $num=mysqli_num_rows($r);
                                echo'<tr>
                                             <td scope="col" width="2.7%">'.$i.'</td>
                                             <td scope="col" width="20%">'.$fila["nombre_c"]." ".$fila["ape_pa"]." ".$fila["ape_ma"].'</td>
                                             <td scope="col" width="10.3%">'.$fila["fecha"].'</td>
                                             <td scope="col" width="14%">'.$fila["num_recibo"].'</td>
                                             <td scope="col"  width="12%">'.$num.'</td>
                                             <td scope="col"  width=12%">'.$fila["ubicacion"].'</td>
                                             <td scope="col"  width="11.5%">'.$fila['usuario'].'</td>
                                   </tr>';
                                   echo"<script>$('#reporte').attr('disabled', false);</script>";
                            }
                        }
                        elseif(mysqli_num_rows($res_fech)==0)
                         {
                            echo'<tr>
                            <td scope="col" width="2.7%">'.''.'</td>
                            <td scope="col" width="20%">'.''.'</td>
                            <td scope="col" width="10.3%">'.''.'</td>
                            <td scope="col" width="14%">'.'Búsqueda   sin   resultados'.'</td>
                            <td scope="col"  width="12%">'.''.'</td>
                            <td scope="col"  width=12%">'.''.'</td>
                            <td scope="col"  width="11.5%">'.''.'</td>
                            </tr>';
                            $_SESSION['Desde']='';
                            $_SESSION['Hasta']='';
                            
                        }

                        
                          
                    }
                }


                     
				      	?>
				    </tbody>
                </table>
        </div>
    </body>

    </ul>
    </section>
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


<?php
?>
<?php
ob_end_flush();
?>


<style>
.formControlSelect{
	display: block !important;
	width: 100% !important;
	height: calc(1.5em + .22rem + 0px) !important;
	padding: .375rem .75rem !important;
	font-size: 1rem !important;
	font-weight: 400 !important;
	line-height: 1.5 !important;
	color: #495057 !important;
	background-color: #fff !important;
	background-clip: padding-box !important;
	border: 1px solid #ced4da !important;
	border-radius: .25rem !important;
	transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
}
.formControlSelect2{

display: block!important;
width: 110%!important;
height: calc(1.5em + .22rem + 0px)!important;
padding: .375rem .75rem!important;
font-size: 1rem!important;
font-weight: 400!important;
line-height: 1.5!important;
color: #495057!important;
background-color: #fff!important;
background-clip: padding-box!important;
border: 1px solid #ced4da!important;
border-radius: .25rem!important;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out!important;
}
.table-fixed tbody{
 
 width:93%!important; 
   height:250px!important;
 overflow-y:auto!important;
  

}



.table-fixed tbody,
.table-fixed th{
   
   display:grid!important;
   

}

.table-fixed thead > tr > th{
 float:left!important;
 border-bottom-width:0 !important;
}

.thead-light{
  display: contents !important;
}
</style>