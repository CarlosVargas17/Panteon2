<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>

    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="style/index_style.css">
	<link href="https://fonts.googleapis.com/css?family=Catamaran&display=swap" rel="stylesheet">
</head>
<body>

<header>
	
		<div class="contenedor" id="uno">
            <a href="bienvenida.php">
			<img class="icon" src="pictures/icon1.png">
			<p class="texto" href="bienvenida.php">Inicio</p>
            
            </a>

		</div>

		<div class="contenedor" id="dos2">
		<a href="secciones.php" class="texto"><img class="icon" 
			src="pictures/Mapa.png" > <p class="texto"  href="secciones.php" >Mapa</p> </a>
		</div>

		<div class="contenedor" id="tres">
		<a href="busqueda.php" class="texto"><img class="icon" 
			src="pictures/Tumba.png" > <p class="texto"  href="busqueda.php" >Busquedas</p> </a>
		</div>

		<div class="contenedor" id="cuatro">
			<a href="Registros.php" class="texto"><img class="icon" 
			src="pictures/Libreta.png" > <p class="texto"  href="Registros.php" >Registros</p> </a>
		</div>

		<div class="contenedor" id="cinco">
			<a href="UpdateGobierno.php" class="texto"><img class="icon" 
			src="pictures/settings.png" > <p class="texto"  href="UpdateGobierno.php" >Ajustes</p> </a>
		</div>

		<div class="contenedor" id="seis" >
			<a href="cierrasesion.php" class="texto"><img class="icon" 
			src="pictures/exit2.png" > <p class="texto"  href="cierrasesion.php" >Cerrar</p> </a>
		</div>
		
	</header>
 
<div class="fondo">



    <?php 
      if(!isset($_GET['id']) || $_GET['id']==''){
        header('Location: secciones.php');
      }
    ?>
    <div class="seccionescss">
        <form action="subsecciones_back.php?id=<?php echo $_GET['id'] ?>" method="post">
            <input id="añade" type="submit" class="btn btn-success" name="subsecciones_back" 
                    value="Añadir subsección">
        </form>

        <div class="botones">
            <?php
                
                $id = $_GET['id'];
                $mysqli = new mysqli('localhost', 'root', '', 'ultratumba');
                $mysqli->set_charset("utf8");
                $query = "SELECT * FROM subsecciones WHERE seccion = '$id' ORDER BY id+0";
                $result = $mysqli->query($query);
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        $nombre = $row["nombre"];
                        $id2 = $row["id"];
                        echo "<a style='color: white;' class='btn btn-success' 
                        href='vista.php?id_s=$id&id_ss=$id2' >$nombre</a>";
                    }
                }
            ?>

        </div>
    
    </div>

<div class="inferior">

<p>GESTOR DE SUBSECCIONES</p>

</div>
</div>


    
</body>
</html>