<!DOCTYPE html>
<html lang="en" style="overflow:auto;background:white;">
<head>
    <meta charset="UTF-8">

    <title>Búsqueda</title>
    <link rel="stylesheet" href="md/bootstrap.min.css">
    <link rel="stylesheet" href="font_awesome/css/all.min.css">
    <script src="js/jquery.js"></script>
    <script src="md/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/index_style.css">
</head>
<body style="background: white; overflow:auto;scrollbar-color: rgba(0, 0, 0, .5) rgba(0, 0, 0, 0);
    scrollbar-width: thin;">


<header>
	
		<div class="contenedor" id="uno"><a href="bienvenida.php" class="texto">
			<img class="icon" src="pictures/icon1.png">
			<p ref="bienvenida.php" class="texto">Inicio</p>
		</div>

		<div class="contenedor" id="dos">
		<a href="secciones.php" class="texto"><img class="icon" 
			src="pictures/Mapa.png" > <p class="texto"  href="secciones.php" >Mapa</p> </a>
		</div>

		<div class="contenedor" id="tres2">
		<a href="busqueda.php" class="texto"><img class="icon" 
			src="pictures/Tumba.png" > <p class="texto"  href="busqueda.php" >Busquedas</p> </a>
		</div>

		<div class="contenedor" id="cuatro">
			<a href="REPORTE.php" class="texto"><img class="icon" 
			src="pictures/Libreta.png" > <p class="texto"  href="REPORTE.php" >Reportes</p> </a>
		</div>

		<div class="contenedor" id="cinco">
			<a href="UpdateGobierno.php" class="texto"><img class="icon" 
			src="pictures/settings.png" > <p class="texto"  href="UpdateGobierno.php" >Ajustes</p> </a>
		</div>

		<div class="contenedor" id="seis" >
			<a href="cierrasesion.php" class="texto"><img class="icon" 
			src="pictures/exit2.png" > <p class="texto"  href="cierrasesion.php" >Cerrar</p> </a>
		</div>
		
    </header>
    




<div id="modal1" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="edita_dif.php" method="POST" id="formulario_venta">
    <div class="form-group">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h5>Datos del difunto</h5>
                <input type="text" name="ubicacion2" class="form-control" 
                style="margin-top:10px" id="ubi" disabled>
                <input type="hidden" name="ubicacion" class="form-control" 
                placeholder="Ubicación" style="margin-top:10px">
                <input type="text" name="nombre" class="form-control" 
                placeholder="Nombre" autofocus required>
                <input type="text" name="ape_pa" class="form-control" 
                placeholder="Apellido paterno" style="margin-top:10px" required>
                <input type="text" name="ape_ma" class="form-control" 
                placeholder="Apellido materno" style="margin-top:10px" required>
                
                
                <label for="fecha_nac" style="margin-top:10px">Fecha de nacimiento</label>
                <input type="date" name="fecha_nac" class="form-control" required>
                <label for="fecha_def" id="la_def" style="margin-top:10px">Fecha de defunción</label>
                <input type="date" name="fecha_def" class="form-control" id="def" required>
            </div>
            <div class="col-md-4 mx-auto">
                <h5 style="margin-top:10px">Datos de la venta</h5>
                <input type="text" name="nombre_c" class="form-control" 
                placeholder="Nombre del comprador" required>
                <input type="text" name="ape_pa_c" class="form-control" 
                placeholder="Apellido paterno" style="margin-top:10px" required>
                <input type="text" name="ape_ma_c" class="form-control" 
                placeholder="Apellido materno" style="margin-top:10px" required>
                <input type="text" name="calle" class="form-control" 
                placeholder="Calle" style="margin-top:10px" required>
                <input type="text" name="numero" class="form-control" 
                placeholder="numero" style="margin-top:10px" required>
                <input type="text" name="colonia" class="form-control" 
                placeholder="Colonia" style="margin-top:10px" required>
                <input type="text" name="num_recibo" class="form-control" 
                placeholder="Numero de recibo" style="margin-top:10px" required>
                
            </div>
            <div class="col-md-4 mx-auto">
                <textarea name="referencia" rows="3" placeholder="Referencia" 
                class="form-control" style="margin-top:10px"></textarea>
                <label for="estado" style="margin-top:10px">Estado de la tumba:</label>
                <select name="estado" class="form-control" style="width:150px;" onchange="fecha(this);">
                    <option value="ocupada">Vendida y ocupada</option>
                    <option value="apartada">Apartada</option>
                    <option value="pagos_oc">A pagos y ocupada</option>
                    <option value="pagos_lib">A pagos y libre</option>
                </select>
            </div>
            
        </div>
        
        <input type="submit" class="btn btn-success" 
        name="edita_dif" value="Guardar"  id="submit" style="margin-top:20px">
        
    </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    
   <section style="position: absolute;top: 100px;left: 7%;text-align:center;" >

        <h1 style="font-size:32px;">Búsqueda</h1>
        <div class="div1" style="font-size: 20px;">
            <label for="caja_busqueda">Buscar:</label>
            <input type="text" name="caja_busqueda" id="caja_busqueda">

        </div>
        <div class="div1" style="font-size: 20px;">
            <label style="margin-left: 50px" for="filtro1">Buscar por:</label>
            <select class="browser-default custom-select" name="filtro1" id="filtro1"
            style="width: 200px;">
                <option value="id">ID</option>
                <option value="nombre" selected>Nombre</option>
                <option value="ape_pa">Ape. Pa.</option>
                <option value="ape_ma">Ape. Ma.</option>
                <option value="ubicacion">Ubicación</option>
            </select>
            <label style="margin-left: 50px" for="orden">Ordenar por:</label>
            <select class="browser-default custom-select" name="orden" id="orden"
            style="width: 200px;">
                <option value="id">ID</option>
                <option value="nombre">Nombre</option>
                <option value="ape_pa">Ape. Pa.</option>
                <option value="ape_ma">Ape. Ma.</option>
                <option value="ubicacion">Ubicación</option>
            </select>
            <label style="margin-left: 50px" for="tabla">Buscar en:</label>
            <select class="browser-default custom-select" name="tabla" id="tabla"
            style="width: 200px;" onchange="actualiza()">
                <option value="difuntos" selected>Difuntos</option>
                <option value="ventas">Ventas</option>
            </select>
            
        </div>
        
        <div id="datos" style="font-size:18px;margin-top:20px;text-align:center;">

        </div>
    </section>
    <script src="md/jquery.min.js"></script>
    <script src="js/main_busq.js"></script>
    <script>
        function actualiza(){
            var select1 = document.getElementById("filtro1");
            select1.options.length = 0;
            var select2 = document.getElementById("orden");
            select2.options.length = 0;

            var array_dif = {
                id : 'ID',
                nombre : 'Nombre',
                ape_pa : 'Ape. Pa.',
                ape_ma : 'Ape. Ma.',
                ubicacion : 'Ubicación'
            };

            var array_ven = {
                id : 'ID',
                nombrec : 'Nombre',
                ape_pa : 'Ape. Pa.',
                ape_ma : 'Ape. Ma.',
                calle : 'Calle',
                numero : 'Número',
                colonia : 'Colonia',
                num_recibo: 'Num. Recibo',
                usuario : 'Usuario',
                presidente: 'Presidente'
            };

            var sel = document.getElementById("tabla").value;
            if (sel=="difuntos"){
                for(index in array_dif) {
                    select1.options[select1.options.length] = new Option(array_dif[index], index);
                    select2.options[select2.options.length] = new Option(array_dif[index], index);
                }
            }else{
                for(index in array_ven) {
                    select1.options[select1.options.length] = new Option(array_ven[index], index);
                    select2.options[select2.options.length] = new Option(array_ven[index], index);
                }
            }

        }

        function abremodal(){
            var modal = document.getElementById('id02');
            modal.style.display='block';
        }
    </script>


</body>
</html>