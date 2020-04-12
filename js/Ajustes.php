<script>
$(document).ready(function(){
    
    $(".draggable").draggable({snap:".draggable2,.draggable3,.draggable4,.draggable5",snapMode: "outer"});
    $(".draggable2").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable3").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable4").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable5").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable6").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable7").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
	$(".droppable").droppable({
		drop: function(e, ui){
            $elemento=ui.draggable.attr('id');
            $id_s=ui.draggable.attr('name1');
            $id_ss=ui.draggable.attr('name2');
            
            
            console.log("seccion",$id_s);
            console.log("subseccion",$id_ss);
            console.log("Tumba",$elemento);
            $equal='';
            for ($i=1000; $i>=1; $i--){
                if ($elemento==$i){
                    $equal='a';
                }
                if ($elemento=="elem"+$i){
                    
                    $equal='b';
                }
                if ($elemento=="elemp"+$i){

                    $equal='c';
                }
                if ($elemento=="elemd"+$i){

                    $equal='d';
                }
                if ($elemento=="eleme"+$i){

                    $equal='e';
                }
                if ($elemento=="elemf"+$i){

                    $equal='f';
                }
                if ($elemento=="elemg"+$i){

                    $equal='g';
                }
            }
            if ($equal=='a'){
                $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
                $( ".draggable" ).draggable({ containment: "#droppable"});
                $tama=$elemento.length;
                console.log("tamaño "+$tama);
                ubica($id_s,$id_ss,$elemento)
                //agregarEvento($id_s,$id_ss,$elemento)
                /*$name="p"+($elemento);
                $elemen2="box"+$elemento;
                console.log($name);   
                document.getElementById($name).style.visibility="visible";
                document.getElementById($elemen2).style.setProperty("visibility","visible");*/
                $equal='';
            }
        if ($equal=='b'){
            $tam=$elemento.length;
            $elem=String($elemento).substr(4,$tam);
            console.log($elem);
            $x=document.getElementById(String($elemento)).style.left;
            $y=document.getElementById(String($elemento)).style.top;
            console.log($x);
            console.log($y);
            $ubicacion2='boxa'+$elem;
            $y2a= parseInt('-37');
            document.getElementById($ubicacion2).style.setProperty("top", (parseInt($y2a))+'px');
            document.getElementById($ubicacion2).style.setProperty("visibility","visible");
            $( ".draggable2" ).draggable({ containment: "#droppable"});
            $equal='';

        }
        if($equal=='c'){
            $tam2=$elemento.length;
            $elem2=String($elemento).substr(5,$tam2);
            console.log($elem2);
            $x=document.getElementById(String($elemento)).style.left;
            $y=document.getElementById(String($elemento)).style.top;
            console.log($x);
            console.log($y);

            $ubicacion3='boxb'+$elem2;
            
            $y2b= parseInt('-37');
            document.getElementById($ubicacion3).style.setProperty("top", (parseInt($y2b))+'px');
            document.getElementById($ubicacion3).style.setProperty("visibility","visible");

            $( ".draggable3" ).draggable({ containment: "#droppable"});
            $equal='';
        }
        if($equal=='d'){
            $tam2=$elemento.length;
            $elem2=String($elemento).substr(5,$tam2);
            console.log($elem2);
            $x=document.getElementById(String($elemento)).style.left;
            $y=document.getElementById(String($elemento)).style.top;
            console.log($x);
            console.log($y);

            $ubicacion3='boxc'+$elem2;
            
            $y2b= parseInt('-37');
            document.getElementById($ubicacion3).style.setProperty("top", (parseInt($y2b))+'px');
            document.getElementById($ubicacion3).style.setProperty("visibility","visible");

            $( ".draggable4" ).draggable({ containment: "#droppable"});
            $equal='';
        }
        if($equal=='e'){
            $tam2=$elemento.length;
            $elem2=String($elemento).substr(5,$tam2);
            console.log($elem2);
            $x=document.getElementById(String($elemento)).style.left;
            $y=document.getElementById(String($elemento)).style.top;
            console.log($x);
            console.log($y);

            $ubicacion3='boxd'+$elem2;
            
            $y2b= parseInt('-37');
            document.getElementById($ubicacion3).style.setProperty("top", (parseInt($y2b))+'px');
            document.getElementById($ubicacion3).style.setProperty("visibility","visible");

            $( ".draggable5" ).draggable({ containment: "#droppable"});
            $equal='';
        }

        if($equal=='f'){
            $tam2=$elemento.length;
            $elem2=String($elemento).substr(5,$tam2);
            console.log($elem2);
            $x=document.getElementById(String($elemento)).style.left;
            $y=document.getElementById(String($elemento)).style.top;
            console.log($x);
            console.log($y);

            $ubicacion3='boxe'+$elem2;
            
            $y2b= parseInt('-37');
            document.getElementById($ubicacion3).style.setProperty("top", (parseInt($y2b))+'px');
            document.getElementById($ubicacion3).style.setProperty("visibility","visible");

            $( ".draggable6" ).draggable({ containment: "#droppable"});
            $equal='';
        }
        if($equal=='g'){
            $tam2=$elemento.length;
            $elem2=String($elemento).substr(5,$tam2);
            console.log($elem2);
            $x=document.getElementById(String($elemento)).style.left;
            $y=document.getElementById(String($elemento)).style.top;
            console.log($x);
            console.log($y);

            $ubicacion3='boxf'+$elem2;
            
            $y2b= parseInt('-37');
            document.getElementById($ubicacion3).style.setProperty("top", (parseInt($y2b))+'px');
            document.getElementById($ubicacion3).style.setProperty("visibility","visible");

            $( ".draggable7" ).draggable({ containment: "#droppable"});
            $equal='';
        }
        
            
        }
        
	
    });
    
    
    
        
 
    
    
    
	
});

function outterFunction(identifi) {
    
    $elemen=identifi;
    console.log($elemen.length);
    document.getElementById(String($elemen)).style.setProperty("top", (parseInt('90')+'px'));
    document.getElementById(String($elemen)).style.setProperty("left", parseInt('53')+'px');
}


function ubica(id_s,id_ss,num){
    
    //alert("Esta es la tumba "+num+" de la sección "+id_s+" subsección "+id_ss);
    
    var valor=id_s+"-"+id_ss+"-"+num;
    
    //alert($valor);
    var x2=$x.substr('x',($x.length -1));
    var x3=x2.substr('p',(x2.length -1));
    var y2=$y.substr('x',($y.length -1));
    var y3=y2.substr('p',(y2.length -1));
    var ele=num;
    console.log(valor,x3,y3);
    
    $(document).ready(function(){


        $("#"+num).load('/../Panteon2/js/SST.php',{valor:valor,x3:x3,y3:y3,ele:ele});

    });
    

}

function outterFunction0(identifi,caja) {

$elemen2=identifi;

$cax=caja
$name="p"+caja


console.log($elemen2.length);
document.getElementById($name).style.visibility="hidden";
document.getElementById(String($cax)).style.setProperty("top", (parseInt('90')+'px'));
document.getElementById(String($cax)).style.setProperty("left", parseInt('27')+'px');
document.getElementById($elemen2).style.setProperty("visibility","hidden");
}
function outterFunction2(identifi,caja) {

    $elemen2=identifi;

    $cax=caja

    console.log($elemen2.length);
    document.getElementById(String($cax)).style.setProperty("top", (parseInt('151')+'px'));
    document.getElementById(String($cax)).style.setProperty("left", parseInt('7')+'px');
    document.getElementById($elemen2).style.setProperty("visibility","hidden");
}

function outterFunction3(identifi,caja) {

    $elemen3=identifi;

    $cax3=caja

    console.log($elemen3.length);
    document.getElementById(String($cax3)).style.setProperty("top", (parseInt('250')+'px'));
    document.getElementById(String($cax3)).style.setProperty("left", parseInt('27')+'px');
    document.getElementById($elemen3).style.setProperty("visibility","hidden");
}
function outterFunction4(identifi,caja) {

    $elemen3=identifi;

    $cax3=caja

    console.log($elemen3.length);
    document.getElementById(String($cax3)).style.setProperty("top", (parseInt('200')+'px'));
    document.getElementById(String($cax3)).style.setProperty("left", parseInt('7')+'px');
    document.getElementById($elemen3).style.setProperty("visibility","hidden");
}
function outterFunction5(identifi,caja) {

    $elemen3=identifi;

    $cax3=caja

    console.log($elemen3.length);
    document.getElementById(String($cax3)).style.setProperty("top", (parseInt('250')+'px'));
    document.getElementById(String($cax3)).style.setProperty("left", parseInt('85')+'px');
    document.getElementById($elemen3).style.setProperty("visibility","hidden");
}

function outterFunction6(identifi,caja) {

$elemen3=identifi;

$cax3=caja

console.log($elemen3.length);
document.getElementById(String($cax3)).style.setProperty("top", (parseInt('410')+'px'));
document.getElementById(String($cax3)).style.setProperty("left", parseInt('26')+'%');
document.getElementById($elemen3).style.setProperty("visibility","hidden");
}


function outterFunction7(identifi,caja) {

$elemen3=identifi;

$cax3=caja

console.log($elemen3.length);
document.getElementById(String($cax3)).style.setProperty("top", (parseInt('85')+'px'));
document.getElementById(String($cax3)).style.setProperty("left", parseInt('85')+'px');
document.getElementById($elemen3).style.setProperty("visibility","hidden");
}



</script>