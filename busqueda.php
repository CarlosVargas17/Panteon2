<!DOCTYPE html>
<html lang="en" style="overflow:auto;background:white;">
<head>
    <meta charset="UTF-8">
    <link rel="icon"  type="image/png" href="Icon.png">
    <title>Búsqueda</title>
    <link rel="stylesheet" href="style/index_style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="md/bootstrap.min.css">
    <link rel="stylesheet" href="font_awesome/css/all.min.css">
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
    <script src="md/bootstrap.min.js"></script>
    <script src="js/push.min.js"></script>
</head>
<body style="background: white; overflow:auto;scrollbar-color: rgba(0, 0, 0, .5) rgba(0, 0, 0, 0);
    scrollbar-width: thin;text-align:center;width:100%;">


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
			src="pictures/Tumba.png" > <p class="texto"  href="busqueda.php" >Búsquedas</p> </a>
		</div>

		<div class="contenedor" id="cuatro">
			<a href="REPORTE.php" class="texto"><img class="icon" 
			src="pictures/Libreta.png" > <p class="texto"  href="REPORTE.php" >Reportes</p> </a>
		</div>

		<div class="contenedor" id="cinco">
			<a href="Ajustes_bi.php" class="texto"><img class="icon" 
			src="pictures/settings.png" > <p class="texto"  href="Ajustes_bi.php" >Ajustes</p> </a>
		</div>

		<div class="contenedor" id="seis" >
			<a href="cierrasesion.php" class="texto"><img class="icon" 
			src="pictures/exit2.png" > <p class="texto"  href="cierrasesion.php" >Cerrar</p> </a>
		</div>
		
    </header>
    


  <!-- Aqui empieza la notificación -->
  <?php 
    session_start();
    if (isset($_SESSION['message']) and $_SESSION['message']!="") {
        if ($_SESSION['message']=='success'){
            echo '<script>
                Push.create("Éxito",{
                    body: "Los datos se han actualizado correctamente.",
                    icon: "pictures/success.png",
                    timeout: 5000,
                    onClick: function () {
                        
                        this.close();
                    }
                });
            </script>';
        }else{
            echo '<script>
                Push.create("Error",{
                    body: "Ha ocurrido un error, revise sus datos.",
                    icon: "pictures/error.png",
                    timeout: 5000,
                    onClick: function () {
                        
                        this.close();
                    }
                });
            </script>';
        }
 $_SESSION['message']=''; } ?>
 <!-- Aqui termina la notificación -->



<div id="modal1" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="left: 10%;position: fixed;width: 80%;">
      <div class="modal-header">
        <h4 class="modal-title">Editar registro</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="edita_dif.php" method="POST" id="formulario_venta">
    <div class="form-group">
        <div class="row" style="box-sizing: border-box !important;">
            <div class="col-md-3 mx-auto">
                <h5>Datos del difunto</h5>
                <select name="num_d" id="num_d" class="form-control" onchange="cambia_d()">
                </select>
                <input type="hidden" name="id" id="id_d" class="form-control">
                <input type="text" name="ubicacion2" class="form-control" 
                style="margin-top:10px" id="ubi" disabled>
                <input type="hidden" name="ubicacion" class="form-control" 
                placeholder="Ubicación" style="margin-top:10px">
                <input type="text" name="nombre" class="form-control" 
                placeholder="Nombre" id="name" autofocus>
                <input type="text" name="ape_pa" class="form-control" 
                placeholder="Apellido paterno" style="margin-top:10px" id="ape_p">
                <input type="text" name="ape_ma" class="form-control" 
                placeholder="Apellido materno" style="margin-top:10px" id="ape_m">
                
                
                <label for="fecha_nac" style="margin-top:10px" id="la_nac">Fecha de nacimiento</label>
                <input id="nac" type="date" name="fecha_nac" class="form-control" max="<?php $hoy=date("Y-m-d"); 
                $hoy2=strtotime($hoy."- 0 days"); echo date("Y-m-d",$hoy2);?>" onchange="fecha_n()">
                <label for="fecha_def" id="la_def" style="margin-top:10px">Fecha de defunción</label>
                <input type="date" name="fecha_def" class="form-control" id="def"  max="<?php $hoy=date("Y-m-d"); 
                $hoy2=strtotime($hoy."- 0 days"); echo date("Y-m-d",$hoy2);?>" onchange="fecha_d()">
            </div>
            <div class="col-md-3 mx-auto">
                <h5>Datos de la venta</h5>
                <input type="hidden" name="id_c" id="id_v" class="form-control">
                <input type="text" name="nombre_c" class="form-control" 
                placeholder="Nombre del comprador" readonly> 
                <input type="text" name="ape_pa_c" class="form-control" 
                placeholder="Apellido paterno" style="margin-top:10px" readonly>
                <input type="text" name="ape_ma_c" class="form-control" 
                placeholder="Apellido materno" style="margin-top:10px" readonly>
                <input type="text" name="calle" class="form-control" 
                placeholder="Calle" style="margin-top:10px" required>
                <input type="text" name="numero" class="form-control" 
                placeholder="Número" style="margin-top:10px" onkeypress="return check(event)" required>
                <input type="text" name="colonia" class="form-control" 
                placeholder="Colonia" style="margin-top:10px" required>
                <input type="text" name="num_recibo" class="form-control" 
                placeholder="Numero de recibo" style="margin-top:10px" readonly>              
            </div>
            <div class="col-md-3 mx-auto">
                <label for="referencia" style="margin-top:25px">Referencia:</label>
                <textarea name="referencia" rows="3" placeholder="Referencia" 
                class="form-control"></textarea>
                <label for="estado" style="margin-top:10px">Estado de la tumba:</label>
                <select id="es" name="estado" class="form-control" style="width:150px;" onchange="upt_es()">
                    <option value="ocupada">Vendida y ocupada</option>
                    <option value="apartada">Apartada</option>
                    <option value="pagos_oc">A pagos y ocupada</option>
                    <option value="pagos_lib">A pagos y libre</option>
                </select>
            </div>
            
        </div>
        
    </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="edita_dif" id="submit" class="btn btn-primary">Guardar cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      </form>
    </div>
  </div>
</div>


    <?php
        if (isset($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=1;
        }
        if (isset($_GET['table'])){
            $table=strval($_GET['table']);
            $orden=strval($_GET['orden']);
        }else{
            $table='difuntos';
            $orden='id';
        }

        $num_pp=5;
        $start=($page-1)*5;
    ?>
    

    <input type="hidden" id="num_pp" value=<?php echo $num_pp; ?>>
    <input type="hidden" id="start" value=<?php echo $start; ?>>
   <section style="position: absolute;top: 100px;text-align:center;width:100%;" >

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
            style="width: 200px;" onchange="cambia_tabla()">
                <option value="difuntos">Difuntos</option>
                <option value="ventas">Ventas</option>
            </select>

            
            <script>
                function actualiza(){
                    console.log("Hola tabla")
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
                        nombre_c : 'Nombre',
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
                  return;  
                }
                var table="<?php echo $table; ?>";
                document.getElementById('tabla').value=table;
                actualiza();
                var orden="<?php echo $orden; ?>"
                document.getElementById('orden').value=orden;
            </script>
            
        </div>
        
        <div id="datos" style="font-size:18px;margin-top:20px;text-align:center;width:99%;margin-left: 0.5%;">

        </div>
    </section>
    <script src="md/jquery.min.js"></script>
    <script src="md/bootstrap.min.js"></script>
    <script src="js/main_busq.js"></script>
    <script>
        function abre(e){
            sel_dif=document.getElementById("num_d");
            sel_dif.options.length = 0;
            sel_dif.options[sel_dif.options.length] = new Option(1, 1);
            var btn = e
            var currow = $(btn).closest('tr');
            var id = currow.find('td:eq(0)').text();
            var nombre = currow.find('td:eq(1)').text();
            var ape_pa = currow.find('td:eq(2)').text();
            var ape_ma = currow.find('td:eq(3)').text();
            var fecha_nac = currow.find('td:eq(4)').text();
            var fecha_def = currow.find('td:eq(5)').text();
            var ubicacion = currow.find('td:eq(6)').text();
            document.getElementById("id_d").value=id;
            document.getElementsByName("nombre")[0].value=nombre;
            document.getElementsByName("ape_pa")[0].value=ape_pa;
            document.getElementsByName("ape_ma")[0].value=ape_ma;
            document.getElementsByName("fecha_nac")[0].value=fecha_nac;
            document.getElementsByName("fecha_def")[0].value=fecha_def;
            document.getElementsByName("ubicacion")[0].value=ubicacion;
            document.getElementsByName("ubicacion2")[0].value=ubicacion;

            document.getElementsByName("nombre")[0].readOnly = true;
            document.getElementsByName("ape_pa")[0].readOnly = true;
            document.getElementsByName("ape_ma")[0].readOnly = true;
            document.getElementsByName("fecha_nac")[0].readOnly = true;
            document.getElementsByName("fecha_def")[0].readOnly = true;


            var tabla = document.getElementById("tabla");
            var strta = tabla.options[tabla.selectedIndex].value;

            console.log(strta);

            let form= new FormData();
            form.append("id",id);
            form.append("tabla","difuntos");
            form.append("ubi",ubicacion);
            fetch('edita_get.php',{method:'POST',body:form})
            .then(res=>res.json())
            .then(data=>{
                console.log(data);
                var datos = data['datos']
                var estado = data['estado'];
                document.getElementById("id_v").value=datos['id'];
                document.getElementsByName("nombre_c")[0].value=datos['nombre_c'];
                document.getElementsByName("ape_pa_c")[0].value=datos['ape_pa'];
                document.getElementsByName("ape_ma_c")[0].value=datos['ape_ma'];
                document.getElementsByName("calle")[0].value=datos['calle'];
                document.getElementsByName("numero")[0].value=datos['numero'];
                document.getElementsByName("colonia")[0].value=datos['colonia'];
                document.getElementsByName("num_recibo")[0].value=datos['num_recibo'];
                document.getElementsByName("referencia")[0].value=datos['referencia'];
                document.getElementById("es").value=estado['estado'];
                if (estado['estado']=='ocupada'){
                    document.getElementById("es").disabled=true;
                }else{
                    document.getElementById("es").disabled=false;
                }
            })
            $("#modal1").modal("show"); 

        }

        function abre2(e){
            var btn = e;
            var currow = $(btn).closest('tr');
            var id = currow.find('td:eq(0)').text();
            var nombre = currow.find('td:eq(1)').text();
            var ape_pa = currow.find('td:eq(2)').text();
            var ape_ma = currow.find('td:eq(3)').text();
            var calle = currow.find('td:eq(4)').text();
            var numero = currow.find('td:eq(5)').text();
            var colonia = currow.find('td:eq(6)').text();
            var num_recibo = currow.find('td:eq(8)').text();
            var ubicacion = currow.find('td:eq(11)').text();
            var referencia = document.getElementById(id).value;
            document.getElementsByName("nombre_c")[0].value=nombre;
            document.getElementsByName("ape_pa_c")[0].value=ape_pa;
            document.getElementsByName("ape_ma_c")[0].value=ape_ma;
            document.getElementsByName("calle")[0].value=calle;
            document.getElementsByName("numero")[0].value=numero;
            document.getElementsByName("colonia")[0].value=colonia;
            document.getElementsByName("num_recibo")[0].value=num_recibo;
            document.getElementsByName("ubicacion")[0].value=ubicacion;
            document.getElementsByName("ubicacion2")[0].value=ubicacion;
            document.getElementsByName("referencia")[0].value=referencia;
            document.getElementById("id_v").value=id;
            var sel_dif =document.getElementById("num_d");
            sel_dif.options.length = 0;

            let form1= new FormData();
            form1.append("ubicacion",ubicacion);

            fetch('get_difuntos.php',{method:'POST', body:form1})
            .then(res=>res.json())
            .then(data=>{
                var datos1 = data['datos_d'];
                var numero=datos1['COUNT(*)'];
                var i=0;
                for(i=1;i<=numero;i++){
                    sel_dif.options[sel_dif.options.length] = new Option(i, i);
                }
                sel_dif.options[sel_dif.options.length] = new Option("Nuevo difunto", "nuevo");
            });

            var tabla = document.getElementById("tabla");
            var strta = tabla.options[tabla.selectedIndex].value;

            console.log(ubicacion);

            let form= new FormData();
            form.append("id",ubicacion);
            form.append("tabla",strta);
            fetch('edita_get.php',{method:'POST',body:form})
            .then(res=>res.json())
            .then(data=>{
                console.log(data);
                var datos = data['datos']
                var estado = data['estado']
                document.getElementById("id_d").value=datos['id'];
                document.getElementsByName("nombre")[0].value=datos['nombre'];
                document.getElementsByName("ape_pa")[0].value=datos['ape_pa'];
                document.getElementsByName("ape_ma")[0].value=datos['ape_ma'];
                document.getElementsByName("fecha_nac")[0].value=datos['fecha_nac'];
                document.getElementsByName("fecha_def")[0].value=datos['fecha_def'];
                document.getElementById("es").value=estado['estado'];
                if (estado['estado']=='ocupada'){
                    document.getElementById("es").disabled=true;
                }else{
                    document.getElementById("es").disabled=false;
                }
                if(estado['estado']=="pagos_lib" || estado['estado']=="apartada"){
                    document.getElementById("name").style.visibility = "hidden";
                    document.getElementById("ape_p").style.visibility = "hidden";
                    document.getElementById("ape_m").style.visibility = "hidden";
                    document.getElementById("la_nac").style.visibility = "hidden";
                    document.getElementById("nac").style.visibility = "hidden";
                    document.getElementById("def").style.visibility = "hidden";
                    document.getElementById("la_def").style.visibility = "hidden";
                }else{
                    document.getElementById("name").style.visibility = "visible";
                    document.getElementById("ape_p").style.visibility = "visible";
                    document.getElementById("ape_m").style.visibility = "visible";
                    document.getElementById("la_nac").style.visibility = "visible";
                    document.getElementById("nac").style.visibility = "visible";
                    document.getElementById("def").style.visibility = "visible";
                    document.getElementById("def").style.visibility = "visible";
                    document.getElementById("la_def").style.visibility = "visible";
                }
                if (datos['nombre']!=""){
                    document.getElementsByName("nombre")[0].readOnly = true;
                    document.getElementsByName("ape_pa")[0].readOnly = true;
                    document.getElementsByName("ape_ma")[0].readOnly = true;
                    document.getElementsByName("fecha_nac")[0].readOnly = true;
                    document.getElementsByName("fecha_def")[0].readOnly = true;
                }else{
                    document.getElementsByName("nombre")[0].readOnly = false;
                    document.getElementsByName("ape_pa")[0].readOnly = false;
                    document.getElementsByName("ape_ma")[0].readOnly = false;
                    document.getElementsByName("fecha_nac")[0].readOnly = false;
                    document.getElementsByName("fecha_def")[0].readOnly = false;
                    document.getElementById("nac").value="";
                    document.getElementById("def").value="";

                }
            })
            $("#modal1").modal("show"); 

        }
        function elimina(e){
            var btn = e;
            var currow = $(btn).closest('tr');
            var id = currow.find('td:eq(0)').text();
            var tabla = document.getElementById('tabla').value;
            if(tabla=='difuntos'){
                var ubicacion = currow.find('td:eq(6)').text();
            }else{
                var ubicacion = currow.find('td:eq(11)').text();
            }
            console.log(ubicacion);
            let form= new FormData();
            form.append("id",id);
            form.append("ubicacion",ubicacion);
            form.append("tabla",tabla);
            fetch('elimina_dif.php',{method:'POST',body:form})
            .then(res=>res.json())
            .then(data=>{
                console.log(data);
            });

        }
        function upt_es(){
            obj=document.getElementById("es");
            if(obj.value=="pagos_lib" || obj.value=="apartada"){
                document.getElementById("name").style.visibility = "hidden";
                document.getElementById("ape_p").style.visibility = "hidden";
                document.getElementById("ape_m").style.visibility = "hidden";
                document.getElementById("la_nac").style.visibility = "hidden";
                document.getElementById("nac").style.visibility = "hidden";
                document.getElementById("def").style.visibility = "hidden";
                document.getElementById("la_def").style.visibility = "hidden";
                document.getElementsByName("nombre")[0].required = false;
                document.getElementsByName("ape_pa")[0].required = false;
                document.getElementsByName("ape_ma")[0].required = false;
                document.getElementsByName("fecha_nac")[0].required = false;
                document.getElementsByName("fecha_def")[0].required = false;
            }else{
                document.getElementById("name").style.visibility = "visible";
                document.getElementById("ape_p").style.visibility = "visible";
                document.getElementById("ape_m").style.visibility = "visible";
                document.getElementById("la_nac").style.visibility = "visible";
                document.getElementById("nac").style.visibility = "visible";
                document.getElementById("def").style.visibility = "visible";
                document.getElementById("def").style.visibility = "visible";
                document.getElementById("la_def").style.visibility = "visible";
                document.getElementsByName("nombre")[0].required = true;
                document.getElementsByName("ape_pa")[0].required = true;
                document.getElementsByName("ape_ma")[0].required = true;
                document.getElementsByName("fecha_nac")[0].required = true;
                document.getElementsByName("fecha_def")[0].required = true;
            }
        }
function check(e) {
   tecla = (document.all) ? e.keyCode : e.which;
   //Tecla de retroceso para borrar, siempre la permite
   if (tecla == 8) {
       return true;
   }
   // Patron de entrada, en este caso solo acepta numeros y letras
   patron = /[A-Za-z0-9]/;
   tecla_final = String.fromCharCode(tecla);
   return patron.test(tecla_final);
}
function fecha_n(){
    var min = document.getElementById("nac").value;
    if (min==""){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
         if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 
        
        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("def").setAttribute("max", today);
    }
    document.getElementById("def").setAttribute("min", min);
    
    
}
function fecha_d(){
    var max = document.getElementById("def").value;
    if (max==""){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
         if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 
        
        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("nac").setAttribute("max", today);
    }else{
        document.getElementById("nac").setAttribute("max", max);
    }
    
}

    function cambia_d(){
        var num = document.getElementById("num_d").value;
        var ubicacion = document.getElementsByName("ubicacion2")[0].value;
        console.log(num);
        if (num=="nuevo"){
            document.getElementsByName("nombre")[0].readOnly = false;
            document.getElementsByName("ape_pa")[0].readOnly = false;
            document.getElementsByName("ape_ma")[0].readOnly = false;
            document.getElementsByName("fecha_nac")[0].readOnly = false;
            document.getElementsByName("fecha_def")[0].readOnly = false;
            document.getElementById("id_d").value="nuevo";
            document.getElementsByName("nombre")[0].value="";
            document.getElementsByName("ape_pa")[0].value="";
            document.getElementsByName("ape_ma")[0].value="";
            document.getElementsByName("fecha_nac")[0].value="";
            document.getElementsByName("fecha_def")[0].value="";
            document.getElementsByName("nombre")[0].required = true;
            document.getElementsByName("ape_pa")[0].required = true;
            document.getElementsByName("ape_ma")[0].required = true;
            document.getElementsByName("fecha_nac")[0].required = true;
            document.getElementsByName("fecha_def")[0].required = true;
        }else{
            let form1= new FormData();
            form1.append("num",num);
            form1.append("fosa",ubicacion);
            fetch('get_difuntos.php',{method:'POST', body:form1})
            .then(res=>res.json())
            .then(data=>{
                var datos=data['datos_d'];
                document.getElementsByName("nombre")[0].readOnly = false;
                document.getElementsByName("ape_pa")[0].readOnly = false;
                document.getElementsByName("ape_ma")[0].readOnly = false;
                document.getElementsByName("fecha_nac")[0].readOnly = false;
                document.getElementsByName("fecha_def")[0].readOnly = false;
                document.getElementById("id_d").value=datos['id'];
                document.getElementsByName("nombre")[0].value=datos['nombre'];
                document.getElementsByName("ape_pa")[0].value=datos['ape_pa'];
                document.getElementsByName("ape_ma")[0].value=datos['ape_ma'];
                document.getElementsByName("fecha_nac")[0].value=datos['fecha_nac'];
                document.getElementsByName("fecha_def")[0].value=datos['fecha_def'];
                if(datos['ape_pa']!=""){
                    document.getElementsByName("nombre")[0].readOnly = true;
                    document.getElementsByName("ape_pa")[0].readOnly = true;
                    document.getElementsByName("ape_ma")[0].readOnly = true;
                    document.getElementsByName("fecha_nac")[0].readOnly = true;
                    document.getElementsByName("fecha_def")[0].readOnly = true;
                }else{
                    document.getElementsByName("nombre")[0].required = false;
                    document.getElementsByName("ape_pa")[0].required = false;
                    document.getElementsByName("ape_ma")[0].required = false;
                    document.getElementsByName("fecha_nac")[0].required = false;
                    document.getElementsByName("fecha_def")[0].required = false;
                }
            });
        }
    }
    </script>


</body>
</html>