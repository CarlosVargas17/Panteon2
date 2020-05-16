<?php
require_once "Conector.php";
?>

<div class="row">
    <div class="col-sm-12" style="flex: 0 0 97% !important;">

        <h1 class="title2">Ajustes de usuario</h1>
        <br>
        
        <caption>
            <button class="btn btn-success " data-toggle="modal" data-target="#modalnuevo" style="position: absolute;top: 2%;right: 1.3%;" >Agregar usuario
            </button>
        </caption>
        <table class="table table-hover table-condensed table-bordered table-sm" style="text-align: center; font-family: 'Roboto', sans-serif">
        
        
        
        <thead class="thead-dark">
            <tr>
                <th>User</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Estado</th>
                <th style="width:15%;">Acción</th>
            </tr>
        </thead>
        <?php
            $stmt = $mysqli->query("SELECT * FROM usuarios");
            if($stmt){
                while($row= $stmt ->fetch_array()){
                    $User=$row['User'];
                    $Nombre=$row['Usuario'];
                    $Rol=$row['Rol'];
                    $Estado=$row['Estado'];
                    $datos=$User."||".$Nombre."||".$Rol."||".$Estado;
                    $datos2=$User."||".$Rol;
        ?>
        <tr>
            <th><?php echo($User); ?></th>
            <th><?php echo($Nombre); ?></th>
            <th><?php echo($Rol); ?></th>
            <th><?php echo($Estado); ?></th>
            <th><button id="editauser" type="button" class="btn btn-primary btn-lg btn-sm " 
            data-toggle="modal" data-target="#modalmodificar" onclick="agregaform('<?php echo $datos?>')">
                Modificar
                </button>
                <button type="button" class="btn btn-danger btn-lg btn-sm" 
                    onclick="preguntaSINO('<?php echo$datos2; ?>')">
                Eliminar
                </button>
            </th>
        </tr>
        <?php
                }}
        ?>

        </table>


    </div>


</div>
