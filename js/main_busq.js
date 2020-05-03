var num_pp=document.getElementById('num_pp').value;
var start=document.getElementById('start').value;
var tabla = document.getElementById("tabla");
var strta = tabla.options[tabla.selectedIndex].value;
$(buscar_d('','','id',strta,num_pp,start));

function buscar_d(consulta, filtro1, orden, tabla, num_pp, start){
    $.ajax({
        url: './buscar.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta, filtro:filtro1, orden:orden, tabla:tabla, num_pp:num_pp, start:start},
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
    var num_pp=document.getElementById('num_pp').value;
    var start=document.getElementById('start').value;
    if(valor != ""){
        buscar_d(valor,strsel,stror,strta,num_pp,start);
    }else{
        buscar_d('','',stror,strta,num_pp,start);
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
    var num_pp=document.getElementById('num_pp').value;
    var start=document.getElementById('start').value;
    if(valor != ""){
        buscar_d(valor,strsel,stror,strta,num_pp,start);
    }else{
        buscar_d('','',stror,strta,num_pp,start);
    }
});

$(document).change('#orden', function(){
    var e = document.getElementById("filtro1");
    var strsel = e.options[e.selectedIndex].value;
    var ord = document.getElementById("orden");
    var stror = ord.options[ord.selectedIndex].value;
    var valor = document.getElementById("caja_busqueda").value
    var tabla = document.getElementById("tabla");
    var strta = tabla.options[tabla.selectedIndex].value;
    var num_pp=document.getElementById('num_pp').value;
    var start=document.getElementById('start').value;
    if(valor != ""){
        buscar_d(valor,strsel,stror,strta,num_pp,start);
    }else{
        buscar_d('','',stror,strta,num_pp,start);
    }
});

$(document).change('#tabla', function(){
    var e = document.getElementById("filtro1");
    var strsel = e.options[e.selectedIndex].value;
    var ord = document.getElementById("orden");
    var stror = ord.options[ord.selectedIndex].value;
    var valor = document.getElementById("caja_busqueda").value
    var tabla = document.getElementById("tabla");
    var strta = tabla.options[tabla.selectedIndex].value;
    console.log("Aqui cambia");
    if(valor != ""){
        buscar_d(valor,strsel,stror,strta,5,0);
    }else{
        buscar_d('','',stror,strta,5,0);
    }
});