function insertadatos(User,Nombre,Password,Rol,Estado){
    
    cadena="User="+User+"&Nombre="+Nombre+"&Password="+Password+"&Rol="+Rol+"&Estado="+Estado;
    
    $.ajax({
        type:"POST",
        url:"insertarDatos.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tablausers').load('tablaguarda.php');
                alertify.success("Creado correctamente");
            }
            else{
                alertify.error("Error inesperado");
            }
        }
    });

}

function agregaform(datos){
    d=datos.split('||');
    $('#user').val(d[0]);
    $('#nombre').val(d[1]);
    $('#rol').val(d[2]);
    $('#estado').val(d[3]);
}

function actualizadatos(){

    
    User=$('#user').val();
    Nombre=$('#nombre').val();
    Rol=$('#rol').val();
    Estado=$('#estado').val();

    cadena="User="+User+"&Nombre="+Nombre+"&Rol="+Rol+"&Estado="+Estado;
    
    $.ajax({
        type:"POST",
        url:"actualizaDatos.php",
        data:cadena,
        success:function(r){
            console.log("r"+r);
            if(r==1){
                $('#tablausers').load('tablaguarda.php');
                alertify.success("Modificado correctamente");
            }
            else{
                alertify.error("Error inesperado");
            }
        }
    });

}

function preguntaSINO(datos){
    dato=datos.split('||');
    $User=dato[0];
    $Rol=dato[1];
    if ($Rol=="Administrador"){
        alertify.error("No puedes eliminar a un administrador");
    }
    else{
    var confirm= alertify.confirm('Eliminar usuario','¿Está seguro que desea eliminar el usuario?',null,null).set('labels', {ok:'Eliminar', cancel:'No, mantenerlo'}); 	
 
                confirm.set({transition:'slide'});   	
                
                confirm.set('onok', function(){ //callbak al pulsar botón positivo
                        eliminarDatos($User);
                        
                });
                
                confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
                    alertify.error('Operación cancelada');
                    
                });
    }
}

function eliminarDatos(User){
    cadena="User="+User;
    $.ajax({
        type:"POST",
        url:"eliminarUser.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tablausers').load('tablaguarda.php');
                alertify.success("Eliminado con éxito");
            }
            else{
                alertify.error("Error inesperado");
            }

        }
    });

}