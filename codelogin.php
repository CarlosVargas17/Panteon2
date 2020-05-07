<?php
    //iniciar sesion
    session_start();
    if(isset($_SESSION["loggedin"])&& $_SESSION["loggedin"]=== true){

        header("location: bienvenida.php");
        

        exit;
    }
    require_once "Conexion.php";
    $User= $password ="";
    $User_err =$password_err = "";

    if($_SERVER["REQUEST_METHOD"]=== "POST"){
        if(empty(trim($_POST["User"]))){
            $User_err="Inserta una direccion de correo";
        }
        else{
            $User = trim($_POST["User"]);
        }

        if(empty(trim($_POST["password"]))){
            $password_err="Inserta una contraseña";
        }
        else{
            $password = trim($_POST["password"]);
        }
        if(empty($User_err)&& empty($password_err)){
            $sql = "SELECT id,usuario,User,password FROM usuarios WHERE User = ?";
            if($stmt=mysqli_prepare($con,$sql)){
                mysqli_stmt_bind_param($stmt,"s",$param_User);
                $param_User = $User;
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                }
                if (mysqli_stmt_num_rows($stmt)==1){
                    mysqli_stmt_bind_result($stmt,$id,$usuario,$User,$hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password,$hashed_password)){
                            session_start();
                            /*Almacena datos en variable de sesión */
                            $_SESSION["loggedin"]=true;
                            $_SESSION["id"]=$id;
                            $_SESSION["User"]=$User;
                            header("location:bienvenida.php");
                        }
                        else{
                            $password_err="Contraseña incorrecta";
                        }
                    }
                }
                else{
                    $User_err="No se ha encontrado ninguna cuenta existente";
                }
            }
        else
        {
            echo "Algo salió mal, no es tu culpa";
        }
        }
        mysqli_close($con);

    }



    

?>