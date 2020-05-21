

<html lang="en">
<head>
    <link rel="stylesheet" href="css/estilos.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon"  type="image/png" href="Icon.png">
    <link rel="stylesheet" href="css/alertify.min.css" />
 

 <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">	
      
      <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">  
      <script src="jquery.min.js"></script>	 	
    <script src="popper/popper.min.js"></script>	 	 	
    <script src="bootstrap4/js/bootstrap.min.js"></script>
	  
    <!--    Plugin sweet Alert 2  -->
	<script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
    <title>Recuperar contraseña</title>
</head>
<body>
<?php

include ('codemail2.php');

?>
<?php
require_once "Conector.php";
?> 
<?php

$consu="SELECT * FROM gobierno";
$res=$mysqli -> query($consu);
$mostrar=mysqli_fetch_array($res);
?>
    
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
    <div class="container-img">
            <?php

            $imagen="pictures/logogdc.jpg";
            if (empty($mostrar)){
                $imagen="pictures/logogdc.jpg";
            }
            else{
                $consult="SELECT * FROM gobierno";
                $resul=$mysqli -> query($consult);
                $row= $resul ->fetch_array();
                $logo= $row['nombre_logo']; 
                
                $imagen="img/".$logo;
            }
            ?>
            <img src="<?php echo($imagen); ?>" class="logo">
            <h1 class="title"> Recupera tu acceso</h1>
    </div>
    <div class="container-form">
    
            <div class="formpost2">
            <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="top: 20%;position: absolute;width: 100%;">

                <Label for="">ID de usuario</Label>
                <input required placeholder="ID" type="text" name="User">
                <Label for="">Correo</Label>
                <input required placeholder="correo@dominio.com" type="email" name="mail">
                <input class="logreg" type="submit" value="Recuperar" style="left: 0%;top: 125%;font-size: 120%;">


            </form>
            </div>
            <span class="text-footer" style="top: 70% !important;">¿Recuerdas tus datos?<a href="index.php">Inicia sesión</a>
            </span>

        </div>

        
</div>
</ul>
</section>
    


    
</body>
</html>
<style>
input[type="email"]
{

    width: 100%;
    height: 30px;
    background: rgba(0, 0, 0, 0);
    border: none ;
    outline: none;
    border-bottom: 1px solid rgba(0, 0, 0, 0.175);
    color: rgb(15, 65, 228);
    font-size: 16px;
   
}
</style>