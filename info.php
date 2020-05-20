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
<html lang="en">
<head>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" href="style/index_style.css">
    <script type="text/javascript" src="showpass.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon"  type="image/png" href="Icon.png">
    <title>Información</title>
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

    <div class="contenedor" id="cuatro">
        <a href="REPORTE.php" class="texto"><img class="icon" 
        src="pictures/Libreta.png" > <p class="texto"  href="REPORTE.php" >Reportes</p> </a>
    </div>

    <div class="contenedor" id="cinco2">
        <a href="Ajustes_bi.php" class="texto"><img class="icon" 
        src="pictures/back.png" > <p class="texto"  href="Ajustes_bi.php" >Atrás</p> </a>
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
       

	

<div class="container-all">
<div class="container-forminfo" style='border:8px outset; color:#4070c6;'>

    <br>
    
    <br>
    <div class='logo-Fab2'><img src='pictures/header.png'></div>
    <div class='logo-Fab'><img src='pictures/fabrica.png'width='400' height='270'></div>
    <div class='logo-Fab3'><img src='pictures/ref.png'></div>
    <hr style="height: 2px;border: 0;color: #2860c1; background-color: #40c68d;">
    <div class="container-forminfo2" >
    <div class="listainfo" style="text-align:left;">
    
    <h4 style='font-family: fantasy;font-size: 22px;' >Acerca de:</h4>
	   <ul>
      
        <h4 class="al2" style='font-weight: bold;font-family: fantasy;font-size: 15px; color:#2b6931;line-height:30px;'>Nombre del sistema:</h4>
        <h4 class="al2" style='font-size: 12px;font-family: fantasy;'>Software para la gestión de panteones.</h4>
        <h4 class="al2" style='font-weight: bold;font-family: fantasy;font-size: 15px; color:#2b6931;line-height:30px;'>Responsables de fábrica:</h4>
        <h4 class="al2" style='font-size: 12px;font-family: fantasy;'>Ing. Flavio Lamas Salas.</h4>
        <h4 class="al2" style='font-size: 12px;font-family: fantasy;'>Ing. Lorena Aguilar Montes.</h4>
        <h4 class="al2" style='font-weight: bold;font-size: 15px; color:#2b6931;line-height:30px;font-family: fantasy;'>Asesores:</h4>
        <h4 class="al2" style='font-size: 12px;font-family: fantasy;'>Mtro. Rafael Campa García.</h4>
        <h4 class="al2" style='font-size: 12px;font-family: fantasy;'>MIS. Ma. Estrellita González Radilla.</h4>
        <h4 class="al2" style='font-size: 12px;font-family: fantasy;'>MAE. Luz Elvira Luna Ayala.</h4>
		<h4 class="al2" style='font-weight: bold;font-size: 15px; color:#2b6931;line-height:30px;font-family: fantasy;'>Equipo de desarrollo:</h4>
		<h4 class="al2" style='font-size: 12px;font-family: fantasy;'>Jaime Josue García Hernández.</h4>
		<h4 class="al2" style='font-size: 12px;font-family: fantasy;'>Carlos Eduardo Vargas Salazar.</h4>
		<h4 class="al2" style='font-size: 12px;font-family: fantasy;'>Aberlardo Suarez Vergara.</h4>
        <h4 class="al2" style='font-size: 12px;font-family: fantasy;'>Mayra Janeth Gómez de los Santos.</h4>
        <h4 class="al2" style='font-size: 12px;font-family: fantasy;'>Mario Alejandro Bugarin González. </h4>
        
	  </ul>
    </div>
</div>
</div>
</div>
</ul>   
<section>
</body>
</html>