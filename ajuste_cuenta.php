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
    <title>Cambio de contraseña</title>
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
                <div class="container-form2">
                <img type="submit" class="iconos2" src="pictures/usuario.png" >
                    <h1 class="title"> Actualizar cuenta </h1>
                    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
                    <?php
                    if (isset($_POST['Confirmar'])){
                        session_start();
                        $mysqli = new mysqli('localhost', 'root', '', 'ultratumba');
                        $mysqli->set_charset("utf8");  
                        //$passActual=$mysqli->real_escape_string ($_POST['anti']) ; 
                        $Clave=$mysqli->real_escape_string ( $_POST['nomb'] ) ; 
                        $Nombre=$mysqli->real_escape_string ( $_POST['nombc'] ) ;
                        $usuario = $_SESSION["User"];
                    
                        $sqlA=$mysqli->query("UPDATE usuarios SET User='$Clave',Usuario='$Nombre' WHERE User='$usuario'");
                        
                    }
                    ?>
                    <Label for="">Actualizar Nombre de Usuario (ID)</Label>
                    <input type="text" name="nomb" required>
        
                    <Label for="">Actualizar Nombre</Label>
                    <input type="text" name="nombc" required>
                        
                        

                    <input class="logact" type="submit" value="Confirmar" name="Confirmar">

                    </form>
			
            
            </div>
        </div>
    </ul>
</section>
</body>
</html>