$(buscar_d('','','id','difuntos'));

function buscar_d(consulta, filtro1, orden, tabla){
    $.ajax({
        url: './buscar.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta, filtro:filtro1, orden:orden, tabla:tabla},
    })
    .done(function(respuesta){
        $("#datos").html(respuesta);
    })
    .fail(function(){
        console.log('error');
    })
}

$(document).on('keyup', '#caja_busqueda', function(){
    var e = document.getElementById("filtro1");
    var strsel = e.options[e.selectedIndex].value;
    var valor = $(this).val();
    var ord = document.getElementById("orden");
    var stror = ord.options[ord.selectedIndex].value;
    var tabla = document.getElementById("tabla");
    var strta = tabla.options[tabla.selectedIndex].value;
    if(valor != ""){
        buscar_d(valor,strsel,stror,strta);
    }else{
        buscar_d('','',stror,strta);
    }
})

$(document).change('#filtro1', function(){
    var e = document.getElementById("filtro1");
    var strsel = e.options[e.selectedIndex].value;
    var valor = document.getElementById("caja_busqueda").value;
    var ord = document.getElementById("orden");
    var stror = ord.options[ord.selectedIndex].value;
    var tabla = document.getElementById("tabla");
    var strta = tabla.options[tabla.selectedIndex].value;
    if(valor != ""){
        buscar_d(valor,strsel,stror,strta);
    }else{
        buscar_d('','',stror,strta);
    }
});

$(document).change('#orden', function(){
    var e = document.getElementById("filtro1");
    var strsel = e.options[e.selectedIndex].value;
    var ord = document.getElementById("orden");
    var stror = ord.options[ord.selectedIndex].value;
    var valor = document.getElementById("caja_busqueda").value
    var tabla = document.getElementById("tabla");
    var strta = tabla.options[tabla.selectedIndex].value;;
    if(valor != ""){
        buscar_d(valor,strsel,stror,strta);
    }else{
        buscar_d('','',stror,strta);
    }
});

$(document).change('#tabla', function(){
    var e = document.getElementById("filtro1");
    var strsel = e.options[e.selectedIndex].value;
    var ord = document.getElementById("orden");
    var stror = ord.options[ord.selectedIndex].value;
    var valor = document.getElementById("caja_busqueda").value
    var tabla = document.getElementById("tabla");
    var strta = tabla.options[tabla.selectedIndex].value;;
    if(valor != ""){
        buscar_d(valor,strsel,stror,strta);
    }else{
        buscar_d('','',stror,strta);
    }
});