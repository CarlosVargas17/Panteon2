<?php
require "Conector.php";
session_start();
$usuario = $_SESSION["User"];
$stmt = $mysqli->query("SELECT * FROM usuarios WHERE User='$usuario' ");

$res = (mysqli_fetch_row($stmt));

      if ($res[5]=='No aprobado' or $usuario==''){
        header("Location: denegado.php");
      }
?>


<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pantalla Principal</title>
	<link rel="icon"  type="image/png" href="Icon.png">
	<link href="https://fonts.googleapis.com/css?family=Catamaran&display=swap" rel="stylesheet">
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="style/index_style.css">
	<link rel="stylesheet" href="css/estylo.css">
	
	<link rel="stylesheet" href="css/themes/default.min.css" />
	<link rel="stylesheet" href="md/bootstrap.min.css">
<script src="md/bootstrap.min.js"></script>

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
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
</script> 


</head>
<body onload="startTime()">

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
	

	<div id="clockdate" style="position: absolute;top: 67%;right: 1%;">
	<div class="clockdate-wrapper">
		<div id="clock"></div>
		<div id="date"></div>
	</div>
	</div>


		
	<!--<div id="titulo">
			<p id="header">&#128123; Panteon &#128123;</p>
			<p id="subheader">Garcia de la cadena</p>	
		</div>-->
		<header>
		
			<div class="contenedor" id="uno2">
				<img class="icon" src="pictures/icon1.png">
				<p class="texto">Inicio</p>
			</div>

			<div class="contenedor" id="dos">
			<a href="secciones.php" class="texto"><img class="icon" 
				src="pictures/Mapa.png" > <p class="texto"  href="secciones.php" >Mapa</p> </a>
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


	<div class="centrado" style="top: 130px;">

	<p >Bienvenido a su diseñador y gestor de panteón</p>

	</div>

	<div class="msghola" >
		<p>
			Bienvenido: <?php echo($usuario);?>
		</p>
		
	</div>
	<div class="msgversion">
		<p>
			Versión: 1.0
		</p>
	</div>

	<div class="imagenpanteon">
		<img src="pictures/50-512.png" alt="panteonimg">
	</div>

	<div class="lista">
		<ul>
			<h4 class="a" >Herramientas</h4>
			<h4 class="b">Genera una gran cantidad  <br>de secciones y subsecciones </h4>
			<h4 class="b">Diseña los espacios de subseccion a tu gusto</h4>
			<h4 class="b">Almacena registros de compra y entierro</h4>
			<h4 class="b">Realiza búsquedas inteligentes de datos</h4>
			<h4 class="b">Genera reportes en las fechas necesarias</h4>
			<h4 class="b">Imprime tus recibos de compra</h4>
			<h4 class="b">Cambia datos gubernamentales cuando lo necesites</h4>
			
		</ul>

	</div>
	<div class="lista2" style="text-align: right;">
		<ul>
			<h4 class="a2" >Elementos</h4>
			<h4 class="b2">Tumbas con cambio de color segun estado</h4>
			<h4 class="b2">Caminos de piedra, tierra y pavimento</h4>
			<h4 class="b2">Intersecciones de piedra, tierra y pavimento</h4>
			<h4 class="b2">Árboles, fuentes, puertas, baños</h4>
			<h4 class="b2">Cientos de estos elementos en cada subseccion para utilizar</h4>
			
		</ul>
	</div>


</ul>
</section>
</body>
</html>