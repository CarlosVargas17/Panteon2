<?php
require_once "Conector.php";
session_start();
$usuario = $_SESSION["User"];
$stmt = $mysqli->query("SELECT * FROM usuarios WHERE User='$usuario' ");
$stmt2 = $mysqli->query("SELECT * FROM ventanas WHERE ventana='Selector Diseño | Ventas' ");
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

    if(!isset($_GET['id_s']) || $_GET['id_s']==''){
    header('Location: secciones.php');
    }
    $id_s=$_GET['id_s'];
    $id_ss=$_GET['id_ss'];

      $nombre="Seccion ".$id_s." Subseccion ".$id_ss." Vista";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	    
    <meta charset="UTF-8">
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="style/index_style.css">
	<link rel="icon"  type="image/png" href="Icon.png">
	<title><?php echo($nombre);?></title>
<script language="JavaScript">
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
	console.log(hr);
	if (hr<=6 || hr>=19){
		document.body.style.background = "linear-gradient(0deg, #4C867E 0%, #38093C 70%)"; 
	}
	}
</script>
</head>
<body  onload="startTime()">


<!--   AQUI COMIENZA EL MENÚ   -->
<header>
	
		<div class="contenedor" id="uno">
            <a href="bienvenida.php">
			<img class="icon" src="pictures/icon1.png">
			<p class="texto" href="bienvenida.php">Inicio</p>
            
            </a>

		</div>

		<div class="contenedor" id="dos2">
		<a href="javascript: history.go(-1)" class="texto"><img class="icon" 
			src="pictures/back.png" > <p class="texto"  href="javascript: history.go(-1)" >Atrás</p> </a>
		</div>

		<div class="contenedor" id="tres">
		<a href="busqueda.php" class="texto"><img class="icon" 
			src="pictures/Tumba.png" > <p class="texto"  href="busqueda.php" >Búsquedas</p> </a>
		</div>

		<div class="contenedor" id="cuatro">
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



 <!--   AQUI TERMINA EL MENU -->
<div class="vistadivis">
<?php 
        $id_s=$_GET['id_s'];
        $id_ss=$_GET['id_ss'];
	?>  
	 <h1 class="vish1" >ELEGIR VISTA</h1>
    <div class="divdisenoimg" >
		<div class="divdiseno" ></div>
		<script>
       if( screen.width <'1280' || screen.height<'720'){
           
        document.write('<a title="Aquí podrás ubicar solamente tus tumbas y decoración" href="denegado3.php" class="mybutton">Diseño</a>');


       }
       else{
        document.write('<a title="Aquí podrás ubicar solamente tus tumbas y decoración" href="S1.php?id_s=<?php echo $id_s;?>&id_ss=<?php echo $id_ss;?>&vista=dis" class="mybutton">Diseño</a>');


       }
    </script>
        
	</div>


	<div class="divventasimg" >
		<div class="divventas"></div>
        <a title="Aquí podrás realizar transacciones dentro de tus tumbas" href='S1.php?id_s=<?php echo $id_s;?>&id_ss=<?php echo $id_ss;?>&vista=ven'
        class='mybutton2'>Ventas</a>
	</div>


	<div class="jouse"></div>


	<div class="tu1" style="right: 116px;bottom: 95px;"></div>
	<div class="tu1" style="right: 196px;bottom: 1px;"></div>
	<div class="tu2" style="left: 496px;bottom: 61px;-webkit-transform: scaleX(-1);"></div>
	<div class="tu2" style="right: 396px;bottom: 1px;"></div>
	<div class="tu3" style="left: 596px;bottom: 1px;-webkit-transform: scaleX(-1);"></div>
	<div class="tu4" style="left: 396px;bottom: 1px;"></div>
	


</div>

    

</body>
</html>