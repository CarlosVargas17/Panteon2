<?php

    include ('coderegister.php');

?>

<html lang="en">
<head>
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="showpass.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de usuario</title>
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
            <h1 class="title"> Registrarse</h1>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            
                <Label for="">Nombre</Label>
                <input type="text" name="username">
                <span class="msg-error">
                <?php echo $username_err;?>
                </span>
                <Label for="">Nombre de usuario (ID)</Label>
                <input type="text" name="User">
                <span class="msg-error">
                <?php echo $User_err;?>
                </span>
                <Label for="">Contraseña</Label>
                <input  type="password" name="password" id="password">
                <div><button class="show2" type="button" onclick="mostrarContrasena()">&#128065; </button></div>

                <span class="msg-error">
                <?php echo $password_err;?>
                </span>
                <input class="logreg" type="submit" value="Registrarse">


            </form>
            <span class="text-footer">¿Ya te has registrado?<a href="index.php">Inicia sesión</a>
            </span>

        </div>

        
    </div>
    </ul>
    </section>
    


    
</body>
</html>