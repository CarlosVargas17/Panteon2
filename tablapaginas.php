<?php
require_once "Conector.php";
?>

<div class="row">
    <div class="col-sm-12" style="flex: 0 0 97% !important;">

        <h1 class="title2" style="color: black;font-family: Arial;font-weight: 700;">Ajustes de acceso</h1>
        <br>
        
        <caption>
        </caption>
        <table class="table table-hover table-condensed table-bordered table-sm" style="text-align: center; font-family: 'Roboto', sans-serif">
        
        
        
        <thead class="thead-dark">
            <tr>
                <th>Página</th>
                <th>Acceso</th>
                <th style="width:15%;">Acción</th>
            </tr>
        </thead>
        <?php
            $stmt = $mysqli->query("SELECT * FROM ventanas");
            if($stmt){
                while($row= $stmt ->fetch_array()){
                    $Pagina=$row['ventana'];
                    $Acceso=$row['acceso'];
                    $datos=$Pagina."||".$Acceso;
        ?>
        <tr>
            <th><?php echo($Pagina); ?></th>
            <th><?php echo($Acceso); ?></th>
            <th><button id="editaacceso" type="button" class="btn btn-primary btn-lg btn-sm " 
            data-toggle="modal" data-target="#modalmodificar" onclick="agregaform('<?php echo $datos?>')">
                Modificar
                </button>
            </th>
        </tr>
        <?php
                }}
        ?>

        </table>


    </div>


</div>
