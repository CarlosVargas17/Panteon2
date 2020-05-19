<?php
    session_start();
    require_once "Conector.php";
?>

<?php 

    if(!isset($_GET['id_s']) || $_GET['id_s']==''){
    header('Location: secciones.php');
    }
    $id_s=$_GET['id_s'];
    $id_ss=$_GET['id_ss'];
    $vista=$_GET['vista'];
    if ($vista=="ven"){
        $tip="Ventas";
        $selected='Ventana de ventas';
    }
    else{
        $tip="Diseño";
        $selected='Ventana de diseño';
    }

      $nombre="Seccion ".$id_s." Subseccion ".$id_ss." ".$tip;
?>

<?php
require "Conector.php";
$usuario = $_SESSION["User"];
$stmt = $mysqli->query("SELECT * FROM usuarios WHERE User='$usuario' ");
$stmt2 = $mysqli->query("SELECT * FROM ventanas WHERE ventana='$selected' ");
$res = (mysqli_fetch_row($stmt));
$res2 = (mysqli_fetch_row($stmt2));
$accesoedit=$res2[1];
if ($res[4]=='Administrador'){
    if ($accesoedit=='Administrador'){
        $acceder='Administrador';
    }
    else{
    $acceder='Administrador/Usuario';
}
}
else{
	$acceder='Administrador/Usuario';
}

if ($res[5]=='No aprobado' or $usuario==''){
    header("Location: denegado.php");
  }

else{
if ($accesoedit!=$acceder){
    header("Location: denegado2.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon"  type="image/png" href="Icon.png">
    <title><?php echo($nombre);?></title>
    <script>
       if( screen.width < screen.height){
           
        document.write('<link rel="stylesheet" type="text/css" href="css/style3.css">');


       }
       else{
        document.write('<link rel="stylesheet" type="text/css" href="css/style2.css">');


       }
    </script>
       
        

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
<link rel="stylesheet" href="style/index_style.css">
<link rel="stylesheet" href="css/estylo.css">
<link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet"> 

<script src="js/modernizr-2.6.2.min.js"></script>
<script src="js/push.min.js"></script>
<link rel="stylesheet" href="css/alertify.min.css" />
 
<link rel="stylesheet" href="css/themes/default.min.css" />
 
<script src="alertify.min.js"></script>

<script language="JavaScript">
function startTime() {
    var today = new Date();
	}
</script>
	 
</head>

<body onload="startTime()">
<div class="tapador" id="tapable"></div>

<?php

$vista=$_GET['vista'];

if ($vista == 'ven'){
    
?>
    <script>
    document.getElementById('tapable').style.setProperty("visibility","visible");
    </script>
<?php
}
else{
    
?>
<script type="text/javascript" src="js/Ajustes.js"></script>
    <script>
    document.getElementById('tapable').style.setProperty("visibility","hidden");
    </script>
<?php

}

?>	





<?php

$vista=$_GET['vista'];

if ($vista == 'ven'){
    
?>
<div id="id01" class="w3-modal">
        <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('id01').style.display='none'" style="font-size: 20px; text-align:right;" class="w3-display-topright btncanc"><a>Cancelar</a></span>
            <div style="text-align: center; font-size:20px; margin-top:50px">
                <p>Ubicación:                  <a id="modal_ubicacion"></a></p>
                <p>Nombre:                     <a id="modal_name"></a></p>
                <p>Apellido paterno:           <a id="modal_ape_pa"></a></p>
                <p>Apellido materno:           <a id="modal_ape_ma"></a></p>
                <p>Fecha de nacimiento:        <a id="modal_fecha_nac"></a></p>
                <p>Fecha de defunción:         <a id="modal_fecha_def"></a></p>
                <br>
                <a href="#" id="boton_r" class="b_recibo"><p>Imprimir recibo</p></a>
            </div>
            
        </div>
        </div>
</div>


<?php
}

?>

<!--   AQUI COMIENZA EL MENÚ   -->

<header>
	
		<div class="contenedor" id="uno">
            <a href="bienvenida.php">
			<img class="icon" src="pictures/icon1.png">
			<p class="texto" href="bienvenida.php">Inicio</p>
            
            </a>

		</div>

		<div class="contenedor" id="dos2">
		<a href="javascript: history.go(-1)" class="texto"><img class="icon" 
            src="pictures/back.png" > <p class="texto"  href="javascript: history.go(-1)" >Atrás</p> </a>
            
		</div>

		<div class="contenedor" id="tres">
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



 <!--   AQUI TERMINA EL MENU -->


 <?php 
        
        $_SESSION['loggedin']=true;
        if($_SESSION['loggedin']==true){
          
    ?>

                 <!-- Aqui empieza la notificación -->
                 <?php 
                
                if (isset($_SESSION['message']) and $_SESSION['message']!="") {
                    if ($_SESSION['message']=='success'){
                        echo '<script>
                            Push.create("Éxito",{
                                body: "La venta se ha realizado exitosamente.",
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


 <div class="paleta"></div>





<span class="contenedorx">
<?php

	for ($i=500; $i>=1; $i--){
?>
		<div id='<?php echo $i;?>' name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>" class="draggable"  
        <?php if($_GET['vista']=='ven'){ ?>onmouseup="agregarEvento('<?php echo $_GET['id_s'];?>','<?php echo $_GET['id_ss'];?>','<?php echo $i;?>')"<?php } ?> >
         <p id="p<?php echo $i;?>"><?php echo $i;?></p>
        </div>
        
        <?php

}
for ($i=100; $i>=1; $i--){
?>


		<!--  ELEMENTO 1  -->
		<div id='elem<?php echo $i;?>' name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>" class="draggable2">
		</div>

		
		<!--  ELEMENTO 3  -->
		<div id='elemd<?php echo $i;?>' name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>"class="draggable4">
		</div>
<!--  ELEMENTO 5  -->
        <div id='elemf<?php echo $i;?>'name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>" class="draggable6">
		
		</div>
<!--  ELEMENTO 6  -->
        <div id='elemg<?php echo $i;?>'name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>" class="draggable7">
		
        </div>





<!--  SPRINT 3    -->
<!--  ELEMENTO 7  -->
<div id='elemh<?php echo $i;?>'name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>" class="draggable8">
        </div>
<!--  ELEMENTO 8  -->
<div id='elemi<?php echo $i;?>'name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>" class="draggable9">
        </div>
<!--  ELEMENTO 9  -->
<div id='elemj<?php echo $i;?>'name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>" class="draggable10">
        </div>
<!--  ELEMENTO 10  -->
<div id='elemk<?php echo $i;?>'name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>" class="draggable11">
        </div>

<!--  ELEMENTO 12  -->
<div id='elemm<?php echo $i;?>'name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>" class="draggable13">
        </div>
<!--  ELEMENTO 13  -->
<div id='elemn<?php echo $i;?>'name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>" class="draggable14">
        </div>
<!--  ELEMENTO 14  -->
<div id='elemo<?php echo $i;?>'name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>" class="draggable15">
        </div>


		


<?php

}
?>
<a class="titulo"><img src="./imagenes/pintar.png" width="30"><br>PALETA DE<br>DISEÑO</a>


<div id="elemp" class="draggable16" name1="<?php echo $_GET['id_s'];?>" name2="<?php echo $_GET['id_ss'];?>">
    <a title="VACIAR TODO" class="todoselem" ><img  src="./imagenes/borrar.svg" width="30">ELIMINA TODO</a>
</div>
        


		

		</span>	

    
	<div id="droppable" class="droppable" >
</div>
</div>


<?php if($vista == 'dis'){?>


<script src="popper/popper.min.js"></script>	 	 	
<!--  Plugin CtxMenu -->
<script src="plugins/CtxMenu-Javascript-master/ctxmenu/ctxmenu.js"></script>
<script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
<script src="codigo.js"></script>

<?php } ?>

<?php

if ($vista == 'ven'){
    
    ?>


<script>
    document.getElementById('droppable').style.setProperty("top","15%");
</script>

<?php
}

?>

<div id="id02" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-container">
        <span onclick="document.getElementById('id02').style.display='none'"  class="w3-display-topright btncanc"><a>Cancelar</a></span>
        <div class="container">
            <div class="row">
                <div class="col mx-auto">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3 style="font-size: 36px; margin-top: 5px; margin-left: 30%;" >Realizar venta</h3>
                        </div>
                        <div class="card-body">               
                            <form action="guarda_dif.php?id_s=<?php echo $id_s ?>&id_ss=<?php echo $id_ss ?>" method="POST" id="formulario_venta">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 mx-auto datdif">
                                            <h5>Datos del difunto</h5>
                                            <input type="text" name="ubicacion2" class="form-control" 
                                            style="margin-top:10px" id="ubi" disabled>
                                            <input type="hidden" name="ubicacion" class="form-control" 
                                            placeholder="Ubicación" style="margin-top:10px" id="ubicacion" >
                                            <input id="name" type="text" name="nombre" class="form-control" 
                                            placeholder="Nombre" autofocus >
                                            <input id="ape_p" type="text" name="ape_pa" class="form-control" 
                                            placeholder="Apellido paterno" style="margin-top:10px" >
                                            <input id="ape_m" type="text" name="ape_ma" class="form-control" 
                                            placeholder="Apellido materno" style="margin-top:10px" >
                                            <label id="la_nac" for="fecha_nac" style="margin-top:10px">Fecha de nacimiento</label>
                                            <input id="nac" type="date" name="fecha_nac" class="form-control" max="<?php $hoy=date("Y-m-d"); 
                                            $hoy2=strtotime($hoy."- 0 days"); echo date("Y-m-d",$hoy2);?>" onchange="fecha_n()">
                                            <label for="fecha_def" id="la_def" style="margin-top:10px">Fecha de defunción</label>
                                            <input type="date" name="fecha_def" class="form-control" id="def"  max="<?php $hoy=date("Y-m-d"); 
                                            $hoy2=strtotime($hoy."- 0 days"); echo date("Y-m-d",$hoy2);?>" onchange="fecha_d()">
                                            

                                            
                                        </div>
                                        <div class="col-md-4 mx-auto datcom">
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
                                            placeholder="Número" style="margin-top:10px" onkeypress="return check(event)" required>
                                            <input type="text" name="colonia" class="form-control" 
                                            placeholder="Colonia" style="margin-top:10px" required>
                                            <input type="text" name="num_recibo" class="form-control" style="margin-top:10px;top: 210px;position: absolute;left: 198px;"
                                            placeholder="Número de recibo" style="margin-top:10px" onkeypress="return check(event)" required>
                                            <textarea style="width: 130px;" name="referencia" rows="3" placeholder="Referencia" 
                                            class="form-control" style="margin-top:10px"></textarea>
                                            <label style="margin-top:10px;position: absolute;top: 350px;left: 1px;" for="estado" style="margin-top:10px">Estado de la tumba:</label>
                                            <select style="width:150px;position: absolute;left: 140px;top: 340px;" name="estado" class="form-control" style="width:150px;" onchange="fecha(this);">
                                                <option value="ocupada">Vendida y ocupada</option>
                                                <option value="apartada">Apartada</option>
                                                <option value="pagos_oc">A pagos y ocupada</option>
                                                <option value="pagos_lib">A pagos y libre</option>
                                            </select>

                                            
                                        </div>
                                        
                                    </div>
                                    
                                    <input type="submit" class="btn btn-success btnvent" 
                                    name="guarda_dif" value="Guardar"  id="submit" style="margin-top:20px">
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

</div>




<script>
function agregarEvento(id_s,id_ss,num){
    
    var el = document.getElementById(num)
    el.removeEventListener("mouseup", agregarEvento, false);
    el.addEventListener("click",()=>{
        informacionventas(id_s,id_ss,num)
    })
}


function informacionventas(id_s,id_ss,num){
    
var id = id_s+"-"+id_ss+"-"+num
console.log(id)

var modal1 = document.getElementById('id01')
var modal2 = document.getElementById('id02')
var formulario = document.getElementById("formulario_venta")

console.log("sol")
var datos= new FormData()
datos.append("idventa",id)
fetch('cambios.php',{method:'POST',body:datos})
.then(res=>res.json())
.then(data=>{
    formulario.ubicacion.value=id
    formulario.ubicacion2.value=id
    console.log("N "+data['datos'])
    if(data['datos']==null || data['datos'] == undefined){
        console.log("TODONULL")
        for(let i = 0; i<formulario.elements.length;i++){
            formulario.elements[i].disabled = false
        }
        formulario.nombre.value = ''
        formulario.ape_pa.value = ''
        formulario.ape_ma.value = ''
        formulario.fecha_nac.value = ''
        formulario.fecha_def.value = ''
        modal2.style.display='block'
        formulario.nombre_c.value = ''
        formulario.ape_pa_c.value = ''
        formulario.ape_ma_c.value = ''
        formulario.calle.value = ''
        formulario.numero.value = ''
        formulario.colonia.value = ''
        formulario.num_recibo.value = ''
        formulario.referencia.value = ''
    }else{
        var datos = data['datos']
        //Cambia de modal, pues el estado no es libre, y no muestra la venta
        if(datos['estado']!='Libre'){
            informacion(id_s,id_ss,num)
            return
        }
        for(let i = 0; i<formulario.elements.length;i++){
            formulario.elements[i].disabled = true
        }
        
        
        cambiacolortumbasimple(num,datos['estado'])
        modal2.style.display='block'
        formulario.nombre.value = datos['nombre']
        formulario.ape_pa.value = datos['ape_pa']
        formulario.ape_ma.value = datos['ape_ma']
        formulario.fecha_nac.value = datos['fecha_nac']
        formulario.fecha_def.value = datos['fecha_def']
        if(data['datosventa']==null){
            formulario.nombre_c.value = ''
            formulario.ape_pa_c.value = ''
            formulario.ape_ma_c.value = ''
            formulario.calle.value = ''
            formulario.numero.value = ''
            formulario.colonia.value = ''
            formulario.num_recibo.value = ''
            formulario.referencia.value = ''
        }
        else{
            var datosv = data['datosventa']
            formulario.nombre_c.value = datosv['nombre_c']
            formulario.ape_pa_c.value = datosv['ape_pa']
            formulario.ape_ma_c.value = datosv['ape_ma']
            formulario.calle.value = datosv['calle']
            formulario.numero.value = datosv['numero']
            formulario.colonia.value = datosv['colonia']
            formulario.num_recibo.value = datosv['num_recibo']
            formulario.referencia.value = datosv['referencia']                
        }  
    }
    formulario.ubicacion.disabled = false
    formulario.ubicacion.style.display = 'none'
    formulario.ubicacion2.disabled = true
    
})
    
}


    var green=new Image()
    green.src="pictures/tumbamin.png"
    green.onload=colortumbasimple()
    function colortumbasimple(id){        
        var datos= new FormData()
        datos.append("id",id)
        fetch('cambios.php',{method:'POST',body:datos})
        
        .then(res=>res.json())
        .then(data=>{
            let fosas = data['datos']
            for(let key in fosas){
                console.log(key)
                var color=''
                if(fosas[key]=='Libre'){
                    color = "url(pictures/tumbamin002.png)"
                }
                if(fosas[key]=='ocupada'){
                    color = "url(pictures/tumbamin1.png)"
                }
                if(fosas[key]=='apartada'){
                    color = "url(pictures/tumbamin.png)"
                }
                if(fosas[key]=='pagos_oc'){
                    color = "url(pictures/tumbamin4.png)"
                }
                if(fosas[key]=='pagos_lib'){
                    color = "url(pictures/tumbamin3.png)"
                }
                try{
                    document.getElementById(key).style.backgroundImage=color;
                    document.getElementById(key).style.backgroundSize="contain";
                }catch(e){
                    console.log(e);
                    
                }
                
            }
            
        }) 
    }
    function cambiacolortumbasimple(id, estado){     

        let fosas = {'estado':estado}
        var key = 'estado'
        console.log(key)
        var color=''
        console.log(fosas[key])
        if(fosas[key]=='Libre'){
            console.log("1")
            color = "url(pictures/tumbamin002.png)"
        }
        if(fosas[key]=='ocupada'){
            console.log("2")
            color = "url(pictures/tumbamin1.png)"
        }
        if(fosas[key]=='apartada'){
            console.log("3")
            color = "url(pictures/tumbamin.png)"
        }
        if(fosas[key]=='pagos_oc'){
            console.log("4")
            color = "url(pictures/tumbamin4.png)"
        }
        if(fosas[key]=='pagos_lib'){
            console.log("5")
            color = "url(pictures/tumbamin3.png)"
        }
            var elemento = document.getElementById(id)
            elemento.style.background = color
            elemento.style.backgroundSize="contain";
  
    }
    function informacion(id_s,id_ss,num){
        var id = id_s+"-"+id_ss+"-"+num
        console.log(id)
        
        var modal1 = document.getElementById('id01')
        var modal2 = document.getElementById('id02')
        var ubicacion=document.getElementById("modal_ubicacion")
        var name=document.getElementById("modal_name")
        var ape_pa=document.getElementById("modal_ape_pa")
        var ape_ma=document.getElementById("modal_ape_ma")
        var fecha_nac=document.getElementById("modal_fecha_nac")
        var fecha_def=document.getElementById("modal_fecha_def")
        var boton=document.getElementById("boton_r")

        var ubicacion2=document.getElementById("ubicacion")
        var ubicacion3=document.getElementById("ubi")
        
        
        console.log("Zenbu")
        var datos= new FormData()
        datos.append("id",id)
        fetch('cambios.php',{method:'POST',body:datos})
        .then(res=>res.json())
        .then(data=>{
            console.log(data)
            ubicacion.innerHTML=id
            
            if(data['datos']==null){
                console.log("Aqui");
                
                modal1.style.display='block'
                name.innerHTML=""
                ape_pa.innerHTML=""
                ape_ma.innerHTML=""
                fecha_nac.innerHTML=""
                fecha_def.innerHTML=""
            }else{
                var datos = data['datos']
                cambiacolortumbasimple(num,datos['estado'])
                var id_dif=datos["id"];
                modal1.style.display='block'
                boton.href="Recibo_pdf.php?variable1="+id_dif+"&variable2="+id
                name.innerHTML=datos["nombre"]
                ape_pa.innerHTML=datos["ape_pa"]
                ape_ma.innerHTML=datos["ape_ma"]
                fecha_nac.innerHTML=datos["fecha_nac"]
                fecha_def.innerHTML=datos["fecha_def"]

            }
            
        })
        }

        let form = new FormData()
        form.append("tumbas","s")
        form.append("sec",<?php echo $_GET['id_s']; ?>)
        form.append("subsec",<?php echo $_GET['id_ss']; ?>)
        fetch('cambios.php',{method:'POST',body:form})
        .then(res=>res.json())
        .then(data=>{

            console.log(data)
            
        })


        function fecha(obj){
            
            if(obj.value=="pagos_lib" || obj.value=="apartada"){
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

        

</script>

<?php

        
        $id_s=$_GET['id_s'];
        
        $id_ss=$_GET['id_ss'];
        $consulta= ($id_s.'-'.$id_ss.'-');
        $nombre= ('1-1-%');
        $str=strlen($consulta);

        $stmt = $mysqli->query("SELECT * FROM fosas WHERE ubicacion LIKE '%$consulta%'");
        if ($stmt){
            while($row= $stmt ->fetch_array()){
                
                $ubicacion= $row['ubicacion'];
                $s_top = $row['s_top'];
                $s_left =$row['s_left'];
                $estado= $row['estado'];


                
                
                $rest = substr("$ubicacion", $str);


   
    
        



?>
<script>
    $idn=<?php echo $rest;?>;
    $top=<?php echo $s_top;?>;
    $left=<?php echo $s_left;?>;
    $widthdisplay=screen.width-150;
    $heightdisplay=screen.height-150;
    console.log("Width: "+$widthdisplay);
    console.log("Height: "+$heightdisplay);
    $medida1=($widthdisplay*100)/1366;
    $medida2=($heightdisplay*100)/768;
    console.log("Width%: "+$medida1);
    console.log("Height%: "+$medida2);
    $top3=(($medida1*$top)/100);
    $left3=(($medida2*$left)/100);
    document.getElementById($idn).style.setProperty("top", (parseInt($top))+'px');
    document.getElementById($idn).style.setProperty("left", (parseInt($left))+'px');
    $est="<?php echo $estado;?>";
    cambiacolortumbasimple($idn,$est)
        $nom='p'+$idn;
        document.getElementById($nom).style.visibility="visible";

   

</script>
<?php
            }
            
        }

        $consulta2= ($id_s."-".$id_ss);
        $str2=strlen($consulta);
       
        $stmt2 = $mysqli->query("SELECT * FROM objetos WHERE ubicacion LIKE '%$consulta2%'");
        if($stmt2){
            while($row2= $stmt2 ->fetch_array()){
                $id= $row2['id'];
                $s_top2 = $row2['s_top'];
                $s_left2 =$row2['s_left'];
                $ubicacion= $row2['ubicacion'];
                $rotacion=$row2['rotacion'];
                $width=$row2['width'];
                $height=$row2['height'];



?>
<script>
    $obb=('<?php echo $id;?>');

    $obj=<?php echo $id;?>;

    $top2=<?php echo $s_top2;?>;
    $left2=<?php echo $s_left2;?>;
    $rotacion2='<?php echo strval($rotacion); ?>';
    var rotacion3=$rotacion2.substr('d',($rotacion2.length -2));
    $obb2=$obb.substr(0,5);

    
    $width2=<?php echo $width;?>;
    $height2=<?php echo $height;?>;
    document.getElementById($obb).style.setProperty("top", (parseInt($top2))+'px');
    document.getElementById($obb).style.setProperty("left", (parseInt($left2))+'px');
    //document.getElementById($obb).style.setProperty("rotate", $rotacion2);
    
    

    //ACTUALIZACION PARA 90 GRADOS
    if ($rotacion2=='90deg'){
        if($obb2=='elem1' || $obb2=='elem2'|| $obb2=='elem3'|| $obb2=='elem4'|| $obb2=='elem5'|| $obb2=='elem6'|| $obb2=='elem7'|| $obb2=='elem8'|| $obb2=='elem9'){
            
            document.getElementById($obb).style.setProperty("background", "url(imagenes/road_vert.png) no-repeat");
            document.getElementById($obb).style.setProperty("background-size", "100%");
            document.getElementById($obb).style.setProperty("width", '35px');
            document.getElementById($obb).style.setProperty("height", '130px');
            
            
        }
        else{
            
            var idee=$obb2;
            if (idee=='elemd'){
                
                document.getElementById($obb).style.setProperty("background", "url(imagenes/rock_vert.png) no-repeat");
                document.getElementById($obb).style.setProperty("background-size", "100% 100%");
                document.getElementById($obb).style.setProperty("width", '35px');
                document.getElementById($obb).style.setProperty("height", '130px');
        
        
            }
            if (idee=='elemk'){
            
            document.getElementById($obb).style.setProperty("background", "url(imagenes/road_vert2.png) no-repeat");
            document.getElementById($obb).style.setProperty("background-size", "100% 100%");
            document.getElementById($obb).style.setProperty("width", '35px');
            document.getElementById($obb).style.setProperty("height", '130px');
    
    
            }
            if (idee=='elemo'){
            console.log("objeto elemental")
            document.getElementById($obb).style.setProperty("background", "url(imagenes/puerta3.png) no-repeat");
            document.getElementById($obb).style.setProperty("background-size", "100% 100%");
            document.getElementById($obb).style.setProperty("width", '80px');
            document.getElementById($obb).style.setProperty("height", '57px');
    
    
            }
                

        }
    }
    //ACTUALIZACION PARA 0 GRADOS
    if ($rotacion2=='0deg'){
        if($obb2=='elem1' || $obb2=='elem2'|| $obb2=='elem3'|| $obb2=='elem4'|| $obb2=='elem5'|| $obb2=='elem6'|| $obb2=='elem7'|| $obb2=='elem8'|| $obb2=='elem9'){
            
            document.getElementById($obb).style.setProperty("background", "url(imagenes/road_hori.png) no-repeat");
            document.getElementById($obb).style.setProperty("background-size", "100% 100%");

            document.getElementById($obb).style.setProperty("width", '130px');
            document.getElementById($obb).style.setProperty("height", '35px');
            
            
        }
        else{
            var idee=$obb2;
            if (idee=='elemd'){

                document.getElementById($obb).style.setProperty("background", "url(imagenes/rock_hori.png) no-repeat");
                document.getElementById($obb).style.setProperty("background-size", "100% 100%");
                document.getElementById($obb).style.setProperty("width", '130px');
                document.getElementById($obb).style.setProperty("height", '35px');
        
        
            }
            if (idee=='elemk'){

            document.getElementById($obb).style.setProperty("background", "url(imagenes/road_hori2.png) no-repeat");
            document.getElementById($obb).style.setProperty("background-size", "100% 100%");
            document.getElementById($obb).style.setProperty("width", '130px');
            document.getElementById($obb).style.setProperty("height", '35px');
    
    
            }
            if (idee=='elemo'){
            console.log("objeto elemental")
            document.getElementById($obb).style.setProperty("background", "url(imagenes/puerta.png) no-repeat");
            document.getElementById($obb).style.setProperty("background-size", "100% 100%");
            document.getElementById($obb).style.setProperty("width", '80px');
            document.getElementById($obb).style.setProperty("height", '57px');
    
    
            }
            
                

            }
    }

    //ACTUALIZACION PARA 45 GRADOS
    if ($rotacion2=='45deg'){
        document.getElementById($obb).style.setProperty("background", "url(imagenes/puerta2.png) no-repeat");
            document.getElementById($obb).style.setProperty("background-size", "100% 100%");
            document.getElementById($obb).style.setProperty("width", '57px');
            document.getElementById($obb).style.setProperty("height", '80px');
    }
    if ($rotacion2=='135deg'){
        document.getElementById($obb).style.setProperty("background", "url(imagenes/puerta4.png) no-repeat");
            document.getElementById($obb).style.setProperty("background-size", "100% 100%");
            document.getElementById($obb).style.setProperty("width", '57px');
            document.getElementById($obb).style.setProperty("height", '80px');
    }

    



</script>

<?php
            }
            
        }
    else{

?>
<script>
    console.log("nada");
</script>

<?php 
}

}

else{
        header('Location: index.php');
    } ?>

</body>
</html>
