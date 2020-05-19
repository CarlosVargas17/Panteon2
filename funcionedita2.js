function agregaform(datos){
    d=datos.split('||');
    $('#pagina').val(d[0]);
    $('#Permisos').val(d[1]);
}

function actualizadatos(){

    
    pagina=$('#pagina').val();
    permisos=$('#Permisos').val();

    cadena="pagina="+pagina+"&permisos="+permisos;
    
    $.ajax({
        type:"POST",
        url:"actualizapermisos.php",
        data:cadena,
        success:function(r){
            console.log("r"+r);
            if(r==1){
                $('#tablapaginas').load('tablapaginas.php');
                alertify.success("Modificado correctamente");
            }
            else{
                alertify.error("Error inesperado");
            }
        }
    });

}