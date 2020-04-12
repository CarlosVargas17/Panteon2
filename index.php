<?php

    require "codelogin.php"
?>

<html lang="en">
<head>
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="showpass.js"></script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

</head>
<body>
    
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
        <div class="container-form">
            <img src="pictures/logogdc.jpg" class="logo">
            <h1 class="title"> Iniciar sesión</h1>

            <form method="post" action= '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' >
            
            
                <Label for="">Nombre de usuario</Label>
                <input type="text" name="User">
                <span class="msg-error">
                <?php
                echo $User_err;
                ?>
                </span>
                <Label for="">Contraseña</Label>
                <input  type="password" name="password" id="password" >
                <div><button class="show" type="button" onclick="mostrarContrasena()">&#128065; </button></div>
                

                <span class="msg-error">
                    
                <?php
                echo $password_err;
                ?>
                </span>
                <input class="logreg" type="submit" value="Iniciar">

                

            </form>
            <span class="text-footer">¿No te has registrado?
                                        <a href="Registro.php">Registrate</a>
            </span>
        </div>
        
    </div>
    
        </ul>
    </section>


                
    
    

    
</body>
</html>
