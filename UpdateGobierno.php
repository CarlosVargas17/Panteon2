<?php 

$mysqli = new mysqli ('localhost','root','','ultratumba');
$mysqli->set_charset("utf8");
$consu="SELECT * FROM gobierno";
$res=$mysqli -> query($consu);
$mostrar=mysqli_fetch_array($res);


if (empty($mostrar)){
   echo'ingreso';
   session_start();
   $insert_start="INSERT INTO gobierno (id, municipio, presidente, nombre_logo, imagen) VALUES(1,'Municipio','Presidente','defecto.png','pass')";
   $res_insert=$mysqli -> query($insert_start);
   echo"<div class='logoPos'><img src='"."img/".$mostrar["nombre_logo"]."'width='480' height='350'></div>";
   header('Location: UpdateGobierno.php');
}
else{
  echo"<div class='logoPos'><img src='"."img/".$mostrar["nombre_logo"]."'width='480' height='350'></div>";
}


//fault how refresh window because in the moment it doesnt do the dates and create validations

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index_style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="md/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Catamaran&display=swap" rel="stylesheet">
    <link href="css/estilosGob.css" rel="stylesheet">
    <script src="js/push.min.js"></script>
    <title>Cambiar información gubernamental</title>
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

		<div class="contenedor" id="cuatro2">
			<a href="REPORTE.php" class="texto"><img class="icon" 
			src="pictures/Libreta.png" > <p class="texto"  href="REPORTE.php" >Reportes</p> </a>
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
        <h4 class='Gobh4'>Información del gobierno.</h4>
        <br>
          <div class="form-group">
             <label class='SubGob'>Nombre del presidente:</label>
             
             <input class=" SubGob inputGob" type="text" name="nombre" id="inputId" placeholder="" pattern="^[a-zA-Z\sñáéíóúÁÉÍÓÚ .]*$"  maxlength="45">
             <script>document.getElementById("inputId").placeholder="<?php echo $mostrar['presidente'];?>"</script>
          </div>

          <div class="form-group">
             <label class='SubGob'>Nombre del municipio:</label>
             <input class="SubGob inputGob" type="text" name="municipio" id="muniId" placeholder="" pattern="^[a-zA-Z\sñáéíóúÁÉÍÓÚ .]*$"  maxlength="45">
             <script>document.getElementById("muniId").placeholder="<?php echo $mostrar['municipio'];?>"</script>
          </div>

          <div class="form-group">
             <label class="SubGob">Imagen del logo:</label>
             <input class=" SubGob inputGob" type="file" name="logo" accept="image/*">
          </div>
          
         
          <a href="#"><input class='btn btn-success SubGob' name='update_datos' type='submit' value='Actualizar'></a>
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
   $municipio=$_POST['municipio'];
///---------------------------------------------------------------------------------------------
   $select_name="SELECT * FROM gobierno";
   $select_res=$mysqli -> query($select_name);
   $mostrar=mysqli_fetch_array($select_res);
//=========================se valida que solo ingrese nombre========================
    if ($name_img=="" and $nombre!="" and $municipio==""){//here is if
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
   
   
//==========================se valida que solo ingrese imagen====================
   elseif($name_img!="" and $nombre=="" and $municipio==""){
    session_start();
     if (in_array($type_img,$permitidos)&& $limite_kb>=$size_img){
      
        $archivo=$_FILES['logo']['tmp_name'];
        $ruta='pictures';
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
//===================valida solo ingreso de municipio==========================================
elseif($name_img=="" and $nombre=="" and $municipio!=""){
        session_start();
        $query="UPDATE gobierno set municipio='$municipio' WHERE 1";
        $result=$mysqli -> query($query);
        if(!$result){
          $_SESSION['update']='error';
          header('Location: UpdateGobierno.php');
        }
        $_SESSION['update']='success';
        header('Location: UpdateGobierno.php');

   }
//============valida ingreso de imagen y nombre ==============================================
elseif($name_img!="" and $nombre!="" and $municipio==""){
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
///=========================valida ingreso de imagen y municipio==============
elseif($name_img!="" and $nombre=="" and $municipio!=""){
    session_start();
     if (in_array($type_img,$permitidos)&& $limite_kb>=$size_img){
        $archivo=$_FILES['logo']['tmp_name'];//contiene el archivo como tal
        $ruta='img';
        $ruta=$ruta."/".$name_img;
        move_uploaded_file($archivo,$ruta); // a donde quiero mover el archivo
        $query="UPDATE gobierno set municipio='$municipio', nombre_logo='$name_img', imagen='$ruta' WHERE 1";
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
//=========================ingreso municipio y presidente---------------------------------
elseif($name_img=="" and $nombre!="" and $municipio!=""){
    session_start();
        $query="UPDATE gobierno set municipio='$municipio',presidente='$nombre' WHERE 1";
        $result=$mysqli -> query($query);
        if(!$result){
          $_SESSION['update']='error';
          header('Location: UpdateGobierno.php');
        }

        $_SESSION['update']='success';
        header('Location: UpdateGobierno.php');
      
   }

//============================ingreso de imagen,nombre y municipio===================================================

   elseif($name_img!="" and $nombre!="" and $municipio!=""){
    session_start();
    if (in_array($type_img,$permitidos)&& $limite_kb>=$size_img){
        $archivo=$_FILES['logo']['tmp_name'];//contiene el archivo como tal
        $ruta='img';
        $ruta=$ruta."/".$name_img;
        move_uploaded_file($archivo,$ruta); // a donde quiero mover el archivo
        $query="UPDATE gobierno set presidente='$nombre', nombre_logo='$name_img', imagen='$ruta',municipio='$municipio' WHERE 1";
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
   
//============================valida que ninguno de los tres se ingrese========
   elseif($name_img=="" and $nombre=="" and $municipio==""){
  //elemento agregado
    $_SESSION['update']='error';
    header('Location: UpdateGobierno.php'); 
     
   }   
}
?>

