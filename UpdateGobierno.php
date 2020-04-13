<?php 

$mysqli = new mysqli ('localhost','root','','ultratumba');
$mysqli->set_charset("utf8");
$consu="SELECT * FROM gobierno";
$res=$mysqli -> query($consu);
$mostrar=mysqli_fetch_array($res);
echo"<div class='logo-pos'><img src='"."img/".$mostrar["nombre_logo"]."'width='500' height='200'></div>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/index_style.css">
    <script src="js/push.min.js"></script>
    <title>Ajustes</title>

    
</head>
<body>
<style type="text/css"> 
html, body {
        font-family: Verdana,sans-serif;
        font-size: 15px;
        line-height: 1.5;
        background: linear-gradient(0deg, #017EDC 0%, #48CD82 70%);
        width: 100%;
        height: 100%;
        
    }
</style>
<header>
	
    <div class="contenedor" id="uno">
    <a href="bienvenida.php" class="texto">
        <img class="icon3" src="pictures/icon1.png">
        <p class="texto3" href="bienvenida.php">Inicio</p>
    </div>

    <div class="contenedor" id="dos">
    <a href="Mapa.php" class="texto"><img class="icon3" 
        src="pictures/Mapa.png" > <p class="texto3"  href="Mapa.php" >Mapa</p> </a>
    </div>

    <div class="contenedor" id="tres">
    <a href="tumbas.php" class="texto"><img class="icon3" 
        src="pictures/Tumba.png" > <p class="texto3"  href="tumbas.php" >Tumbas</p> </a>
    </div>

    <div class="contenedor" id="cuatro">
        <a href="Registros.php" class="texto"><img class="icon3" 
        src="pictures/Libreta.png" > <p class="texto3"  href="Registros.php" >Registros</p> </a>
    </div>

    <div class="contenedor" id="cinco2">
        <a href="UpdateGobierno.php" class="texto"><img class="icon3" 
        src="pictures/settings.png" > <p class="texto3"  href="UpdateGobierno.php" >Ajustes</p> </a>
    </div>

    <div class="contenedor" id="seis" >
        <a href="cierrasesion.php" class="texto"><img class="icon3" 
        src="pictures/exit2.png" > <p class="texto3"  href="cierrasesion.php" >Cerrar</p> </a>
    </div>
    
</header>

  <!-- Aqui empieza la notificación -->
  <?php 
                session_start();
                if (isset($_SESSION['update'])) {
                    if ($_SESSION['update']=='success'){
                        echo '<script>
                            Push.create("Éxito",{
                                body: "Los datos se han actualizado correctamente.",
                                icon: "pictures/success.png",
                                timeout: 5000,
                                onClick: function () {
                                    
                                    this.close();
                                }
                            });
                        </script>';
                    }else{
                        echo '<script>
                            Push.create("Error",{
                                body: "Ha ocurrido un error, revise sus datos.",
                                icon: "pictures/error.png",
                                timeout: 5000,
                                onClick: function () {
                                    
                                    this.close();
                                }
                            });
                        </script>';
                    }
                session_unset(); } ?>
                <!-- Aqui termina la notificación -->

    <div class="container">
        <form action="" method='POST' class="datos" enctype='multipart/form-data'>
        <h4>Información del gobierno</h4>
          <div class="form-group">
             <label>Nombre del presidente:</label>
             
             <input class="form-control" type="text" name="nombre" id="inputId" placeholder="" pattern="^[a-zA-Z\sñáéíóú]*$"  maxlength="45">
             <script>document.getElementById("inputId").placeholder="<?php echo $mostrar['presidente'];?>"</script>
          </div>
          <div class="form-group">
             <label>Imagen del logo:</label>
             <input class="form-control" type="file" name="logo" accept="image/*">
          </div>
         
          <a href="#"><input class='btn btn-success ' name='update_datos' type='submit' value='Actualizar'></a>
        </form>
    </div>
    <script src='js/jquery.js'></script>
    <script src='js/bootstrap.min.js'></script>
</body>
</html>


<?php
$var=1;
if(isset($_POST['update_datos']))
  {
   $permitidos=array("image/jpeg","image/gif","image/png",'image/jpg');
   $limite_kb=1024*1024*35;
   $mysqli = new mysqli ('localhost','root','','ultratumba');
   $mysqli->set_charset("utf8");
   $name_img=$_FILES['logo']['name'];
   $size_img=$_FILES['logo']['size'];
   $type_img=$_FILES['logo']['type'];
   $nombre=$_POST['nombre'];
  

   if ($name_img=="" and $nombre!=""){
    session_start();
    $query="UPDATE gobierno set presidente='$nombre' WHERE 1";
    $result=$mysqli -> query($query);
    if(!$result){
          $_SESSION['update']='error';
          header('Location: UpdateGobierno.php');
    }
      
    $_SESSION['update']='success';

    header('Location: UpdateGobierno.php');
      
   }
   

   elseif($name_img!="" and $nombre==""){
    session_start();
     if (in_array($type_img,$permitidos)&& $limite_kb>=$size_img){
      
        $archivo=$_FILES['logo']['tmp_name'];
        $ruta='img';
        $ruta=$ruta."/".$name_img;
        move_uploaded_file($archivo,$ruta);
        $query="UPDATE gobierno set nombre_logo='$name_img', imagen='$ruta' WHERE 1";
        $result=$mysqli -> query($query);
        if(!$result){
          $_SESSION['update']='error';
          header('Location: UpdateGobierno.php');
        }

        $_SESSION['update']='success';
        header('Location: UpdateGobierno.php');
      }
     else{
         //elemento agregado
        $_SESSION['update']='error';
        header('Location: UpdateGobierno.php'); 
     }
   }

   elseif($name_img!="" and $nombre!=""){
    session_start();
    if (in_array($type_img,$permitidos)&& $limite_kb>=$size_img){
        $archivo=$_FILES['logo']['tmp_name'];//contiene el archivo como tal
        $ruta='img';
        $ruta=$ruta."/".$name_img;
        move_uploaded_file($archivo,$ruta); // a donde quiero mover el archivo
        $query="UPDATE gobierno set presidente='$nombre', nombre_logo='$name_img', imagen='$ruta' WHERE 1";
        $result=$mysqli -> query($query);
        if(!$result){
          $_SESSION['update']='error';
          header('Location: UpdateGobierno.php');
        }

        $_SESSION['update']='success';
        header('Location: UpdateGobierno.php');
     
     }
    else{
        //elemento agregado
        $_SESSION['update']='error';
        header('Location: UpdateGobierno.php'); 
    }
   }
   
   elseif($name_img=="" and $nombre==""){
  //elemento agregado
    $_SESSION['update']='error';
    header('Location: UpdateGobierno.php'); 
     
   }   
}
?>