<?php
require_once "Conector.php";
?>
<?php

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style/index_style.css">
    <link rel="stylesheet" href="md/bootstrap.min.css">
    <link rel="stylesheet" href="font_awesome/css/all.min.css">
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
    <script src="md/bootstrap.min.js"></script>
    <script src="js/push.min.js"></script>
    <script src="funcionedita2.js"></script>
    <script src="alertify.min.js"></script>
    <link rel="stylesheet" href="css/themes/default.min.css" />
    <link rel="stylesheet" href="css/alertify.min.css" />
    <style>
      th {
          font-family: 'Roboto', sans-serif;
      }
    </style>


    <link rel="icon"  type="image/png" href="Icon.png">

    <title>Gestor de usuarios</title>
    
</head>
<body >
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



<?php
      session_start();
      $usuario = $_SESSION["User"];
      $stmt = $mysqli->query("SELECT * FROM usuarios WHERE User='$usuario' ");
      $res = (mysqli_fetch_row($stmt));
      if ($res[4]=='Administrador'){
        ?>
          <div class="table-responsive">
            <div class="container-all">
              <div id="tablapaginas" class="container-form4" >
              </div>
            </div>
          </div>

        <?php
      }
      else{
        ?>
        <div class="table-responsive">
          <div class="container-all">
            <div class="container-form4" style="background: #133d62;" >
              
                <h3 style="font-family: roboto;color: #67e480;font-style: normal;text-align: center; -webkit-text-stroke: 0.5px black;">¡¡¡NO CUENTAS CON <br> LOS PERMISOS SUFICIENTES <br> PARA ACCEDER A ESTE SITIO!!!.
                </h3>

              

                <div style="width: 280px;height: auto;margin: auto 20px 0 0;position: fixed;left: 43%;">
                <video style="mask-image: url(&quot;pictures/mask.svg&quot;); width: 100%;" autoplay muted loop>
                    <source src="pictures/dinosaurio.mp4"  type="video/mp4">
                </video>
              </div>

              
            </div>
          </div>
        </div>
        
        <?php
      }


?>
  

</section>   


<div class="modal fade" id="modalmodificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="position: absolute">Edición de permisos de página</h4>
      </div>
      <div class="modal-body">
        <label>Página</label>
        <input type="text" name="" id="pagina" class="form-control input-sm" style="width: 90%; height:20px;" disabled>
        
        <label>Permisos</label>
        <select class="browser-default custom-select" name="" id="Permisos" style="width: 90%; height:20px;" >
                <option value="Administrador/Usuario">Administrador/Usuario</option>
                <option value="Administrador">Administrador</option>
        </select>
        
      </div>
      <div class="modal-footer">
        <button id="actualizaperm" type="button" class="btn btn-primary" data-dismiss="modal">Actualizar</button>

      </div>
    </div>
  </div>
</div>


</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
         $('#tablapaginas').load('tablapaginas.php');

         $('#actualizaperm').click(function(){
            actualizadatos();

            });

    });


    
</script>