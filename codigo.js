function rota90(element){
    //element.style.setProperty("rotate", '90deg');
    var ide=element.id;
    var sec=element.getAttribute("name1");
    var subsec=element.getAttribute("name2");
    var ubicacion=sec+"-"+subsec;
    var rot='90deg';
    var tama=document.getElementById(String(ide)).clientWidth;
    var tama2=document.getElementById(String(ide)).clientHeight;

    

    $obb=ide;
    $obb2=$obb.substr(0,5);



    if($obb2=='elem1' || $obb2=='elem2'|| $obb2=='elem3'|| $obb2=='elem4'|| $obb2=='elem5'|| $obb2=='elem6'|| $obb2=='elem7'|| $obb2=='elem8'|| $obb2=='elem9'){
        console.log("objeto elemental")
        document.getElementById($obb).style.setProperty("background", "url(imagenes/road_vert.png) no-repeat");
        document.getElementById($obb).style.setProperty("background-size", "100% 100%");
        document.getElementById($obb).style.setProperty("width", '35px');
        document.getElementById($obb).style.setProperty("height", '130px');
        
        
    }
    else{
        
        var idee=$obb2;
        if (idee=='elemd'){
            console.log("objeto elemental")
            document.getElementById($obb).style.setProperty("background", "url(imagenes/rock_vert.png) no-repeat");
            document.getElementById($obb).style.setProperty("background-size", "100% 100%");
            document.getElementById($obb).style.setProperty("width", '35px');
            document.getElementById($obb).style.setProperty("height", '130px');
    
    
        }
        if (idee=='elemk'){
        console.log("objeto elemental")
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
    $(document).ready(function(){


        $("#"+ide).load('actualizarotacion.php',{ide:ide,sec:sec,subsec:subsec,ubicacion:ubicacion,rot:rot,tama:tama,tama2:tama2});

    });
   
}
function rota0(element){
    //element.style.setProperty("rotate", '90deg');
    var ide=element.id;
    var sec=element.getAttribute("name1");
    var subsec=element.getAttribute("name2");
    var ubicacion=sec+"-"+subsec;
    var rot='0deg';
    var tama=document.getElementById(String(ide)).clientWidth;
    var tama2=document.getElementById(String(ide)).clientHeight;

    
    $obb=ide;
    $obb2=$obb.substr(0,5);
    if($obb2=='elem1' || $obb2=='elem2'|| $obb2=='elem3'|| $obb2=='elem4'|| $obb2=='elem5'|| $obb2=='elem6'|| $obb2=='elem7'|| $obb2=='elem8'|| $obb2=='elem9'){
        console.log("objeto elemental")
        document.getElementById($obb).style.setProperty("background", "url(imagenes/road_hori.png) no-repeat");
        document.getElementById($obb).style.setProperty("background-size", "100% 100%");
        console.log("width"+$width2);
        console.log("width"+$height2);
        document.getElementById($obb).style.setProperty("width", '130px');
        document.getElementById($obb).style.setProperty("height", '35px');

        
    }
    else{
        var idee=$obb2;
        if (idee=='elemd'){
            console.log("objeto elemental2")
            document.getElementById($obb).style.setProperty("background", "url(imagenes/rock_hori.png) no-repeat");
            document.getElementById($obb).style.setProperty("background-size", "100% 100%");
            document.getElementById($obb).style.setProperty("width", '130px');
            document.getElementById($obb).style.setProperty("height", '35px');
    
    
        }
        if (idee=='elemk'){
        console.log("objeto elemental2")
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

    $(document).ready(function(){


        $("#"+ide).load('actualizarotacion.php',{ide:ide,sec:sec,subsec:subsec,ubicacion:ubicacion,rot:rot,tama:tama,tama2:tama2});

    });


    
}
function printa (element){
        identificador=element.id
        seccion=element.getAttribute("name1");
        subseccion=element.getAttribute("name2");
        //obten width
        tama=document.getElementById(String(identificador)).clientWidth;
        tama2=document.getElementById(String(identificador)).clientHeight;

        alert("propiedades(" + tama+tama2+")");
}
function rota45(element){
    //element.style.setProperty("rotate", '90deg');
    var ide=element.id;
    var sec=element.getAttribute("name1");
    var subsec=element.getAttribute("name2");
    var ubicacion=sec+"-"+subsec;
    var rot='45deg';
    var tama=document.getElementById(String(ide)).clientWidth;
    var tama2=document.getElementById(String(ide)).clientHeight;

    

    $obb=ide;
    $obb2=$obb.substr(0,5);
    document.getElementById($obb).style.setProperty("background", "url(imagenes/puerta2.png) no-repeat");
    document.getElementById($obb).style.setProperty("background-size", "100% 100%");
    document.getElementById($obb).style.setProperty("width", '57px');
    document.getElementById($obb).style.setProperty("height", '80px');


    $(document).ready(function(){


        $("#"+ide).load('actualizarotacion.php',{ide:ide,sec:sec,subsec:subsec,ubicacion:ubicacion,rot:rot,tama:tama,tama2:tama2});

    });
}
function rota135(element){
    //element.style.setProperty("rotate", '90deg');
    var ide=element.id;
    var sec=element.getAttribute("name1");
    var subsec=element.getAttribute("name2");
    var ubicacion=sec+"-"+subsec;
    var rot='135deg';
    var tama=document.getElementById(String(ide)).clientWidth;
    var tama2=document.getElementById(String(ide)).clientHeight;

    

    $obb=ide;
    $obb2=$obb.substr(0,5);
    document.getElementById($obb).style.setProperty("background", "url(imagenes/puerta4.png) no-repeat");
    document.getElementById($obb).style.setProperty("background-size", "100% 100%");
    document.getElementById($obb).style.setProperty("width", '57px');
    document.getElementById($obb).style.setProperty("height", '80px');


    $(document).ready(function(){


        $("#"+ide).load('actualizarotacion.php',{ide:ide,sec:sec,subsec:subsec,ubicacion:ubicacion,rot:rot,tama:tama,tama2:tama2});

    });
}
function elimina(element){
    objeto=element.id;
    var sec=element.getAttribute("name1");
    var subsec=element.getAttribute("name2");
    var ubicacion=sec+"-"+subsec;
    var confirm= alertify.confirm('ELIMINAR','Confirmas eliminar este elemento?',null,null).set('labels', {ok:'Eliminar', cancel:'No, conservalo'}); 	
 
                confirm.set({transition:'slide'});   	
                
                confirm.set('onok', function(){ //callbak al pulsar botón positivo
                        eliminaok(objeto,ubicacion);
                        
                        
                });
                
                confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
                    alertify.error('Has manetenido este elemento');
                    
                });

}
function eliminaok(objeto,ubicacion){
    var ele=objeto;
    var ubicacion=ubicacion;
    
    $(document).ready(function(){


        $("#"+objeto).load('SSE.php',{ele:ele,ubicacion:ubicacion});

    });
    
    
}
function recarga(){
    location.reload();
}
for (var i = 0; i < 100; i++) {
    var idcarret= "#elem"+i;
    var idrock= "#elemd"+i;
    var idladrillo="#elemk"+i;
    var idpuerta= "#elemo"+i;
    var idf="#elemf"+i;
    var idg="#elemg"+i;
    var idh="#elemh"+i;
    var idi="#elemi"+i;
    var idj="#elemj"+i;
    var idm="#elemm"+i;
    var idn="#elemn"+i;
    
    var contextMenucarretera = CtxMenu(idcarret);
    var contextMenutierra = CtxMenu(idrock);
    var contextMenuladrillo = CtxMenu(idladrillo);
    var contextMenupuerta = CtxMenu(idpuerta);
    var contextMenuidf = CtxMenu(idf);
    var contextMenuidg = CtxMenu(idg);
    var contextMenuidh = CtxMenu(idh);
    var contextMenuidi = CtxMenu(idi);
    var contextMenuidj = CtxMenu(idj);
    var contextMenuidm = CtxMenu(idm);
    var contextMenuidn = CtxMenu(idn);


    //MENU DE CARRETERA

    contextMenucarretera.addItem("Recargar Página",function(){location.reload();},Icon = "imagenes/reload.svg");
    contextMenucarretera.addSeperator();
    contextMenucarretera.addItem("Rotar 90°",rota90,Icon = "imagenes/angulo90.svg");
    contextMenucarretera.addSeperator();
    contextMenucarretera.addItem("Rotar 180°",rota0,Icon = "imagenes/angulo180.svg");
    contextMenucarretera.addSeperator();
    contextMenucarretera.addItem("Eliminar",elimina,Icon = "imagenes/borrar.svg");


    //MENU DE TIERRA

    contextMenutierra.addItem("Recargar Página",function(){location.reload();},Icon = "imagenes/reload.svg");
    contextMenutierra.addSeperator();
    contextMenutierra.addItem("Rotar 90°",rota90,Icon = "imagenes/angulo90.svg");
    contextMenutierra.addSeperator();
    contextMenutierra.addItem("Rotar 180°",rota0,Icon = "imagenes/angulo180.svg");
    contextMenutierra.addSeperator();
    contextMenutierra.addItem("Eliminar",elimina,Icon = "imagenes/borrar.svg");

    //MENU DE LADRILLO GRIS

    contextMenuladrillo.addItem("Recargar Página",function(){location.reload();},Icon = "imagenes/reload.svg");
    contextMenuladrillo.addSeperator();
    contextMenuladrillo.addItem("Rotar 90°",rota90,Icon = "imagenes/angulo90.svg");
    contextMenuladrillo.addSeperator();
    contextMenuladrillo.addItem("Rotar 180°",rota0,Icon = "imagenes/angulo180.svg");
    contextMenuladrillo.addSeperator();
    contextMenuladrillo.addItem("Eliminar",elimina,Icon = "imagenes/borrar.svg");

    //MENU DE PUERTA

    contextMenupuerta.addItem("Recargar Página",function(){location.reload();},Icon = "imagenes/reload.svg");
    contextMenupuerta.addSeperator();
    contextMenupuerta.addItem("Rotar 45°",rota45,Icon = "imagenes/angulo45.svg");
    contextMenupuerta.addSeperator();
    contextMenupuerta.addItem("Rotar 90°",rota90,Icon = "imagenes/angulo90.svg");
    contextMenupuerta.addSeperator();
    contextMenupuerta.addItem("Rotar 135°",rota135,Icon = "imagenes/angulo135.svg");
    contextMenupuerta.addSeperator();
    contextMenupuerta.addItem("Rotar 180°",rota0,Icon = "imagenes/angulo180.svg");
    contextMenupuerta.addSeperator();
    contextMenupuerta.addItem("Eliminar",elimina,Icon = "imagenes/borrar.svg");

    contextMenuidf.addItem("Eliminar",elimina,Icon = "imagenes/borrar.svg");
    contextMenuidf.addSeperator();
    contextMenuidf.addItem("Recargar pagina",recarga,Icon = "imagenes/reload.svg");
    
    
    contextMenuidg.addItem("Eliminar",elimina,Icon = "imagenes/borrar.svg");
    contextMenuidg.addSeperator();
    contextMenuidg.addItem("Recargar pagina",recarga,Icon = "imagenes/reload.svg");
    
    
    contextMenuidh.addItem("Eliminar",elimina,Icon = "imagenes/borrar.svg");
    contextMenuidh.addSeperator();
    contextMenuidh.addItem("Recargar pagina",recarga,Icon = "imagenes/reload.svg");
    
    
    contextMenuidi.addItem("Eliminar",elimina,Icon = "imagenes/borrar.svg");
    contextMenuidi.addSeperator();
    contextMenuidi.addItem("Recargar pagina",recarga,Icon = "imagenes/reload.svg");
    
    
    contextMenuidj.addItem("Eliminar",elimina,Icon = "imagenes/borrar.svg");
    contextMenuidj.addSeperator();
    contextMenuidj.addItem("Recargar pagina",recarga,Icon = "imagenes/reload.svg");
    
    
    contextMenuidm.addItem("Eliminar",elimina,Icon = "imagenes/borrar.svg");
    contextMenuidm.addSeperator();
    contextMenuidm.addItem("Recargar pagina",recarga,Icon = "imagenes/reload.svg");
    
    
    contextMenuidn.addItem("Eliminar",elimina,Icon = "imagenes/borrar.svg");
    contextMenuidn.addSeperator();
    contextMenuidn.addItem("Recargar pagina",recarga,Icon = "imagenes/reload.svg");
    
    

    
    
}






function eliminatumba(element){
    objeto=element.id;
    var sec=element.getAttribute("name1");
    var subsec=element.getAttribute("name2");
    var ubicacion=sec+"-"+subsec+"-"+objeto;
    console.log( "Ubicacion"+ubicacion);
    var confirm= alertify.confirm('ELIMINAR','Confirmas eliminar este elemento?',null,null).set('labels', {ok:'Eliminar', cancel:'No, conservalo'}); 	
 
                confirm.set({transition:'slide'});   	
                
                confirm.set('onok', function(){ //callbak al pulsar botón positivo
                        eliminatumbaok(objeto,ubicacion);
                        
                        
                        
                });
                
                confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
                    alertify.error('Has manetenido este elemento');
                    
                });
    
}

function eliminatumbaok(objeto,ubicacion){
    var ubicacion=ubicacion;
    
    $(document).ready(function(){


        $("#"+objeto).load('SSET.php',{ubicacion:ubicacion});

    });
    
    
}
//menu tumba
for (var i = 0; i < 500; i++) {
    var identi= "#"+i;
    var contextMenuTwo = CtxMenu(identi);
    // Añade un seperador
    contextMenuTwo.addSeperator();
    // Añade un segundo elemento al menú, esta vez con un ícono
    contextMenuTwo.addItem("Recargar Página",
        function(){
            location.reload();
        },
        Icon = "imagenes/info.svg"
    );
    contextMenuTwo.addSeperator();    
    //Para añadir mas items de menu
    contextMenuTwo.addItem("Eliminar",eliminatumba,Icon = "imagenes/borrar.svg");
}


