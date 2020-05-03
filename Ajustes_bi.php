<html lang="en">
<head>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="style/index_style.css">
    <script type="text/javascript" src="showpass.js"></script>
    <script src="js/push.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajustes</title>
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

    <div class="contenedor" id="cuatro">
        <a href="REPORTE.php" class="texto"><img class="icon" 
        src="pictures/Libreta.png" > <p class="texto"  href="REPORTE.php" >Reportes</p> </a>
    </div>

    <div class="contenedor" id="cinco2">
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
<div class="container-all">
<div class="container-form3">
            <h1 class="title2"> Ventana de Ajustes</h1>
            <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
            </form>
            <br>
            <hr>
            


			<form class="logact1a" action="UpdateGobierno.php" method="get">
            <img class="iconos" src="pictures/prueba.png" >
            <a class="textoajus" >Cambiar información</a>
            <a class="textoajus2" >de gobierno</a>
			<input   id="logact1" type="submit" value=" ">
			</form>

			<form class="logact2a"  action="ccontra.php" method="get">
            <img class="iconos" src="pictures/contrasena.png" >
            <a class="textoajus" >Cambiar contraseña</a>
            <a class="textoajus2" >de usuario</a>
			<input id="logact2" type="submit" value="  ">
			</form>

			<form class="logact3a"  action="ajuste_cuenta.php" method="get">
            <img type="submit" class="iconos" src="pictures/usuario.png" >
            <a type="submit" class="textoajus" >Cambiar nombre</a>
            <a type="submit" class="textoajus2" >de usuario</a>
			<input  id="logact3" type="submit" value="   ">
			</form>
			

        </div>
    </div>
    </ul>
    </section>

</body>
</html>