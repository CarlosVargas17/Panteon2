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

<head>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="style/index_style.css">
    <script type="text/javascript" src="showpass.js"></script>
    <script src="js/push.min.js"></script>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon"  type="image/png" href="Icon.png">
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
        src="pictures/Tumba.png" > <p class="texto"  href="busqueda.php" >Búsquedas</p> </a>
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
<div class="container-form3" style="padding: 3.5%;">
            <h1 class="title2"> Ventana de Ajustes</h1>
            <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
            </form>
            <br>
            <hr>
            

            <div class="contenedor20" >
                <form class="logact1a" action="UpdateGobierno.php" method="get">
                <img class="iconos" src="pictures/prueba.png" >
                <a class="textoajus" >Cambiar información</a>
                <a class="textoajus2" >de gobierno</a>
                <input id="logact1" type="submit" value=" ">
                </form>
            </div>
            <div class="contenedor20"action="ccontra.php" method="get">
                <form class="logact2a"  action="ccontra.php" method="get">
                <img class="iconos" src="pictures/contrasena.png" >
                <a class="textoajus" >Cambiar contraseña</a>
                <a class="textoajus2" >de usuario</a>
                <input id="logact2" type="submit" value="  ">
                </form>
            </div>
            <div class="contenedor20" >
                <form class="logact3a"  action="ajuste_cuenta.php" method="get">
                <img type="submit" class="iconos" src="pictures/usuario.png" >
                <a type="submit" class="textoajus" >Cambiar nombre</a>
                <a type="submit" class="textoajus2" >de usuario</a>
                <input  id="logact3" type="submit" value="   ">
                </form>
            </div>

            <div class="contenedor20">
                <form class="logact4a"  action="gestorusuarios.php" method="get">
                <img type="submit" class="iconos" src="pictures/perfil.png" >
                <a type="submit" class="textoajus" >Gestor</a>
                <a type="submit" class="textoajus2" >de usuarios</a>
                <input  id="logact4" type="submit" value="   ">
                </form>
            </div>


            <div class="contenedor20">
                <form class="logact5a"  action="GestionAccesos.php" method="get">
                <img type="submit" class="iconos" src="pictures/navegador.png" >
                <a type="submit" class="textoajus" >Gestor</a>
                <a type="submit" class="textoajus2" >de accesos</a>
                <input  id="logact5" type="submit" value="   ">
                </form>
            </div>
            <div class="contenedor20">
                <form class="logact6a"  action="info.php" method="get">
                <img type="submit" class="iconos" src="pictures/icon.png" >
                <a type="submit" class="textoajus" >Acerca de</a>
                <a type="submit" class="textoajus2" >:)</a>
                <input  id="logact6" type="submit" value="   ">
                </form>
            </div>
			

        
    </div>
    </ul>
    </section>
    

</body>
</html>