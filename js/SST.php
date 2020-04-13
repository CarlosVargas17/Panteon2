<?php
    
    try{
        $v=$_REQUEST['valor'];
        $x=$_REQUEST['x3']; 
        $y=$_REQUEST['y3'];
        $ele=$_REQUEST['ele'];
        ?>
        <script>
        num=<?php echo $ele;?>;
        var divisor = document.getElementById(num);
        $nom='p'+num;
        var p = document.createElement('px');
        p.innerHTML = num;

        divisor.appendChild(p)





        </script>

        <?php
        

        $mysqli = new mysqli('localhost', 'root', '', 'ultratumba');
        $mysqli->set_charset("utf8");

        $stmt = $mysqli->query("SELECT * FROM fosas WHERE ubicacion = '$v'");
        $res = (mysqli_fetch_row($stmt));

        
        if ($res[0]) {
            $query= "UPDATE fosas set s_top='$y', s_left='$x' WHERE ubicacion= '$v'";
            $result = $mysqli->query($query);
            
        
        }
        else {
        $estado='Libre';
        
        $query = "INSERT INTO fosas(ubicacion,s_top,s_left,estado) VALUES ('$v','$y','$x','$estado')";
        $result = $mysqli->query($query);

        }


    }
    catch(Exception $e){

        echo ("Error");
    }
?>