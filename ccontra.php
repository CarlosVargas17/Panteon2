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
<html lang="en">
<head>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="style/index_style.css">
    <script type="text/javascript" src="showpass.js"></script>
    <script src="js/push.min.js"></script>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon"  type="image/png" href="Icon.png">
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
        
            <h1 class="title"> Cambio de contraseña </h1>
            <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
            <?php
            if (isset($_POST['Cambiar'])){
                session_start();
                
                //$passActual=$mysqli->real_escape_string ($_POST['anti']) ; 
                $passActual = $mysqli->real_escape_string($_POST['anti']);
                $pass1=$mysqli->real_escape_string ( $_POST['new'] ) ; 
                $pass2=$mysqli->real_escape_string ( $_POST['new2'] ) ;
                $usuario = $_SESSION["User"];

                $sqlA=$mysqli->query("SELECT password from usuarios where User = '$usuario'") or trigger_error($mysqli->error);
                $rowA= $sqlA->fetch_assoc();
                if (password_verify($passActual,$rowA['password']))
                {
                    if($pass1==$pass2){
                        if(strlen(($pass1))<8){
                            //echo "La contraseña debe ser de al menos 8 caracteres";
                            
                            echo '<script>
                            Push.create("Error",{
                                body: "La contraseña debe ser de al menos 8 caracteres",
                                icon: "pictures/error.png",
                                timeout: 5000,
                                onClick: function () {
                                    
                                    this.close();
                                }
                            });
                            </script>';
                            

                        }
                        else{
                            $pass1=password_hash($pass1,PASSWORD_DEFAULT);
                            $update=$mysqli->query("UPDATE usuarios set password = '$pass1' where User = '$usuario'");
                            if($update){
                                //echo"se ha actualizado tu contraseña";
                                echo '<script>
                                Push.create("Éxito",{
                                    body: "Se ha actualizado tu contraseña",
                                    icon: "pictures/success.png",
                                    timeout: 5000,
                                    onClick: function () {
                                        
                                        this.close();
                                    }
                                });
                                </script>';
                            }
                        }
                            
                    }
                    else{
                        
                        //echo "No coinciden las contraseñas";
                        echo '<script>
                        Push.create("Error",{
                            body: "No coinciden las contraseñas",
                            icon: "pictures/error.png",
                            timeout: 5000,
                            onClick: function () {
                                
                                this.close();
                            }
                        });
                        </script>';
                    }
                }
                else
                {
                    //echo"Tu contraseña actual no coincide";
                    echo '<script>
                    Push.create("Error",{
                        body: "Tu contraseña actual no coincide",
                        icon: "pictures/error.png",
                        timeout: 5000,
                        onClick: function () {
                            
                            this.close();
                        }
                    });
                    </script>';
                }
            }
            ?>

                <Label for="">Contraseña actual</Label>
                <input type="password" name="anti" required>
   
                <Label for="">Nueva contraseña</Label>
                <input type="password" name="new" required>
                
                <Label for="">Confirmar contraseña</Label>
                <input  type="password" name="new2" required>

                <input class="logact" type="submit" value="Cambiar" name="Cambiar">
            </form>
            
        </div>
    </div>
    </ul>
    </section>
    


    
</body>
</html>