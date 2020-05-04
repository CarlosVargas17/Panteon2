<?php
require_once "Conector.php";
?>
<?php 

$id_seccion=$_POST['id'];
$subseccion="SELECT  * FROM subsecciones where seccion='$id_seccion' ORDER BY nombre ASC ";
$res_subsecc=$mysqli -> query($subseccion);
$html="<option value='0'>Subsección</option>";
while($rowS=$res_subsecc->fetch_assoc()){
    $html="<option value='".$rowS['id_num']."'>".$rowS['nombre']."</option>";
    echo $html;
}

?>
