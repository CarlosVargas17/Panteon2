
<?php 
    require_once "Conexion.php";

    $username = $User = $password= "";
    $username_err = $User_err = $password_err ="";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        /*Validar nombre de usuario*/ 
        if (empty(trim($_POST["username"]))){
            $username_err = "No puede existir campo vacio";
        }
        else{
            $sql ="SELECT id FROM usuarios WHERE Usuario = ?";

            if($stmt =mysqli_prepare($con,$sql)){
                mysqli_stmt_bind_param($stmt,"s",$param_username);
                $param_username = trim($_POST["username"]);
                if(mysqli_stmt_execute($stmt)){
                    if(mysqli_stmt_num_rows($stmt)==2){
                        $User_err="Nombre existente";
                    }
                    else{
                        mysqli_stmt_store_result($stmt);
                        
                        $username = trim($_POST["username"]);
                    }
                    
                }
                else{
                    echo "Algo salió mal, no es tu culpa";
                }
            }
        }


        /*Validar User*/ 
        if (empty(trim($_POST["User"]))){
            $User_err = "Porfavor ingresa un ID";
        }
        else{
            $sql ="SELECT id FROM usuarios WHERE User = ?";

            if($stmt =mysqli_prepare($con,$sql)){
                mysqli_stmt_bind_param($stmt,"s",$param_User);
                $param_User = trim($_POST["User"]);
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt)==1){
                        $User_err="User ya registrado";
                    }
                    else{
                        $User = trim($_POST["User"]);
                    }
                }
                else{
                    echo "Algo salió mal, no es tu culpa";
                }
            }
        }


        /*valida pass */

        if(empty(trim($_POST["password"]))){
            $password_err="Inserta una contraseña";
        }
        elseif(strlen(trim($_POST["password"]))<8){
            $password_err="La contraseña debe ser de al menos 8 caracteres";


        }
        else{
            $password =trim($_POST["password"]);
        }

        /*comprobar errores de entrada antes de insertar los datos en la base de datos.*/
        if(empty($username_err) && empty($User_err) && empty($password_err)){
            
            $sql = "INSERT INTO usuarios (Usuario, User, password) VALUES(?,?,?)";
            if($stmt =mysqli_prepare($con,$sql)){
                mysqli_stmt_bind_param($stmt,"sss", $param_username,$param_User,$param_password);
                $param_username=$username;
                $param_User=$User;
                $param_password=password_hash($password,PASSWORD_DEFAULT); /*Encriptar contraseña */
                if (mysqli_stmt_execute($stmt)){
                    header("location:index.php");
                    

                }
                else{
                    echo"Algo salió mal, no es tu culpa";
                }


            }
        }
        mysqli_close($con);
    }

?>