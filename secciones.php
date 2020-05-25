<?php
require_once "Conector.php";
session_start();
$usuario = $_SESSION["User"];
$stmt = $mysqli->query("SELECT * FROM usuarios WHERE User='$usuario' ");
$stmt2 = $mysqli->query("SELECT * FROM ventanas WHERE ventana='Secciones' ");
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

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon"  type="image/png" href="Icon.png">
    <title>Panteón</title>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="style/index_style.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/alertify.min.css" />
 
    <link rel="stylesheet" href="css/themes/default.min.css" />
    
    <script src="alertify.min.js"></script>


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
 
<div class="fondo">



 <!--   AQUI TERMINA EL MENU -->

    <div class="seccionescss">
        <form action="secciones_back.php" method="post">
            <input id="añade" type="submit" class="btn btn-success " name="secciones_back" 
                    value="Añadir sección">
        </form>
    
      
        <div class="botones">
            <?php 
                
                $query = "SELECT * FROM secciones ORDER BY id+0";
                $result = $mysqli->query($query);
                $val="adios";
                $num=mysqli_num_rows($result);
                $i=1;
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        $nombre = $row["nombre"];
                        $id = $row["id"];
                        echo "<a style='color: white;' class='btn btn-success' 
                        href='subsecciones.php?id=$id' id='$i' name1='$id'>$nombre</a>";
                        $i=$i+1;
                    }
                }  
            ?>
            
            </div>
    
    </div>
<script src="plugins/CtxMenu-Javascript-master/ctxmenu/ctxmenu.js"></script>
<script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
    


<div class="inferior">

<p>GESTOR DE SECCIONES</p>

</div>
</div>

<script src="/jquery.min.js"></script>
<script>
    var num=<?php echo $num; ?>;
    for(var i=1;i<=num;i++){
        var id="#"+i;
        var menusec = CtxMenu(id);
        menusec.addItem("Eliminar sección",elimina,Icon = "imagenes/borrar.svg");
    }
    function elimina(element){
        objeto=element.id;
        ubicacion=element.getAttribute("name1");
        var confirm= alertify.confirm('ELIMINAR','Confirmas eliminar este elemento?',null,null).set('labels', 
        {ok:'Eliminar', cancel:'No, conservalo'}); 	

                        confirm.set({transition:'slide'});   	

                        confirm.set('onok', function(){ //callbak al pulsar botón positivo
                                eliminaok(objeto,ubicacion);


                        });

                        confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
                            alertify.error('Has manetenido este elemento');

                        });
    }
    function eliminaok(objeto,ubicacion){
        var ele=objeto;
        var ubicacion=ubicacion;
        
        $(document).ready(function(){
            $("#"+objeto).load('secciones_back.php',{ele:ele,ubicacion:ubicacion});

    });
}
function recarga(){
    location.reload();
}

</script>

</body>
</html>