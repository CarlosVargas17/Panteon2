
<?php 
    require_once "Conector.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $correo =$_POST["mail"];
        $user =$_POST["User"];
        $stmt = $mysqli->query("SELECT * FROM usuarios WHERE usuario='$correo'  and User='$user'");
        $res = (mysqli_fetch_row($stmt));
        $length=10;
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        if ($max < 1) {
            throw new Exception('$keyspace must be at least two characters long');
        }
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[mt_rand(0, $max)];
        }

        
        $message  = "<html><body>";
   
   $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
   
   $message .= "<tr><td>";
   
   $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
    
   $message .= "<thead>
      <tr height='80'>
       <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >RECUPERACIÓN DE CONTRASEÑA</th>
      </tr>
      </thead>";
    
   $message .= "<tbody>
      
      <tr>
       <td colspan='4' style='padding:15px;'>
        <p style='font-size:20px;'>Hola ".$res[1]."</p>
        <hr />
        <p style='font-size:25px;'>Tu nueva contraseña es: ".$str."</p>
        <img src='https://i.ibb.co/fGD7018/Icon.png' alt='Gestor de panteones' title='Gestor de panteones' style='height:auto; width:50%; max-width:50%;' />
        <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'></p>
       </td>
      </tr>
      
      </tbody>";
    
   $message .= "</table>";
   
   $message .= "</td></tr>";
   $message .= "</table>";
   
   $message .= "</body></html>";



        if ($res[3]!=''){
            require 'PHPMailer-master/src/PHPMailer.php';
            require 'PHPMailer-master/src/SMTP.php';


            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "noreplaypanteones@gmail.com";
            $mail->Password = "usuario1209";
            $mail->SetFrom("noreplaypanteones@gmail.com");
            $mail->Subject = "Recuperación de contraseña";
            $mail->Body = $message;
            $mail->AddAddress("$res[3]");

            
            
            $pass1=password_hash($str,PASSWORD_DEFAULT);
            $query3= "UPDATE usuarios SET password='$pass1' WHERE usuario='$correo'  and User='$user'";
            $result3 = $mysqli->query($query3);
            if(!$mail->Send()) {
                ?>
            <script>
            Swal.fire({
                type: 'error',
                title: 'Error',
                text: '¡El correo no se envió!',        
            
            });
            
            </script>
            <?php
            } else {
                ?>
            <script>
                Swal.fire({        
                    type: 'success',
                    title: 'Éxito',
                    text: '¡Tu correo fue enviado con éxito!',   
                    
                
                });
                
            </script>
            <?php
            }
    }
    else{
        ?>
            <script>
                Swal.fire({
                type: 'error',
                title: 'Error',
                text: '¡Tu correo no coincide con nuestra base de datos!',        
            
            });
            
            </script>
            <?php
    }
}

?>

