<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Panteón</title>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="style/index_style.css">
	<link href="https://fonts.googleapis.com/css?family=Catamaran&display=swap" rel="stylesheet">


</head>
<body>


<!--   AQUI COMIENZA EL MENÚ   -->
<header>
	
		<div class="contenedor" id="uno">
            <a href="bienvenida.php">
			<img class="icon" src="pictures/icon1.png">
			<p class="texto" href="bienvenida.php">Inicio</p>
            
            </a>

		</div>

		<div class="contenedor" id="dos2">
		<a href="#" class="texto"><img class="icon" 
			src="pictures/Mapa.png" > <p class="texto"  href="#" >Mapa</p> </a>
		</div>

		<div class="contenedor" id="tres">
		<a href="busqueda.php" class="texto"><img class="icon" 
			src="pictures/Tumba.png" > <p class="texto"  href="busqueda.php" >Busquedas</p> </a>
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
 
<div class="fondo">



 <!--   AQUI TERMINA EL MENU -->

    <div class="seccionescss">
        <form action="secciones_back.php" method="post">
            <input id="añade" type="submit" class="btn btn-success " name="secciones_back" 
                    value="Añadir sección">
        </form>
    
      
        <div class="botones">
            <?php 
                $mysqli = new mysqli('localhost', 'root', '', 'ultratumba');
                $mysqli->set_charset("utf8");
                $query = "SELECT * FROM secciones ORDER BY id+0";
                $result = $mysqli->query($query);
                $val="adios";
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        $nombre = $row["nombre"];
                        $id = $row["id"];
                        echo "<a style='color: white;' class='btn btn-success' 
                        href='subsecciones.php?id=$id'>$nombre</a>";
                    }
                }  
            ?>
            
            </div>
    
    </div>
    


<div class="inferior">

<p>GESTOR DE SECCIONES</p>

</div>
</div>

</body>
</html>