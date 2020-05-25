<?php
require_once "Conector.php";
session_start();
$usuario = $_SESSION["User"];
$stmt = $mysqli->query("SELECT * FROM usuarios WHERE User='$usuario' ");
$stmt2 = $mysqli->query("SELECT * FROM ventanas WHERE ventana='Subsecciones' ");
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

    if(!isset($_GET['id'])){
    header('Location: secciones.php');
    }
    $id_s=$_GET['id'];

      $nombre="Seccion ".$id_s." Subsecciones";
?>
<?php
require "Conector.php";

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon"  type="image/png" href="Icon.png">
    <title><?php echo($nombre);?></title>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="style/index_style.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/alertify.min.css" />
 
    <link rel="stylesheet" href="css/themes/default.min.css" />
    
    <script src="alertify.min.js"></script>
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
			src="pictures/back.png" > <p class="texto"  href="secciones.php" >Atrás</p> </a>
		</div>

		<div class="contenedor" id="tres">
		<a href="busqueda.php" class="texto"><img class="icon" 
			src="pictures/Tumba.png" > <p class="texto"  href="busqueda.php" >Búsquedas</p> </a>
		</div>

		<div class="contenedor" id="cuatro">
			<a href="Registros.php" class="texto"><img class="icon" 
			src="pictures/Libreta.png" > <p class="texto"  href="Registros.php" >Registros</p> </a>
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
                
                $query = "SELECT * FROM subsecciones WHERE seccion = '$id' ORDER BY id+0";
                $result = $mysqli->query($query);
                $num=mysqli_num_rows($result);
                $i=1;
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        $nombre = $row["nombre"];
                        $id2 = $row["id"];
                        echo "<a style='color: white;' class='btn btn-success' 
                        href='vista.php?id_s=$id&id_ss=$id2' id='$i' name1='$id' name2='$id2'>$nombre</a>";
                        $i++;
                    }
                }
            ?>

        </div>
    
    </div>

<div class="inferior">

<p>GESTOR DE SUBSECCIONES</p>

</div>
<div class="ubicass" >
		<p>
			Sección: <?php echo($id_s);?>
		</p>
		
</div>

<style>

.ubicass{
    position: absolute;
    top: 75px;
    right: 90px;
    filter: drop-shadow(0px 3px 0px #444);

}
.ubicass p{
    color: white;
font-size: 170%;
}
</style>
</div>

<script src="plugins/CtxMenu-Javascript-master/ctxmenu/ctxmenu.js"></script>
<script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>

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
        sec=element.getAttribute("name1");
        sub=element.getAttribute("name2");
        var confirm= alertify.confirm('ELIMINAR','Confirmas eliminar este elemento?',null,null).set('labels',
        {ok:'Eliminar', cancel:'No, conservalo'}); 	

                        confirm.set({transition:'slide'});   	

                        confirm.set('onok', function(){ //callbak al pulsar botón positivo
                                eliminaok(objeto,sec,sub);


                        });

                        confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
                            alertify.error('Has manetenido este elemento');

                        });
    }
    function eliminaok(objeto,sec,sub){
        var ele=objeto;
        var secc=sec;
        var subs=sub;
        
        $(document).ready(function(){
            $("#"+objeto).load('subsecciones_back.php',{ele:ele,sec:secc,sub:subs});

    });
}
function recarga(){
    location.reload();
}

</script>
    
</body>
</html>