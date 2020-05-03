$(document).ready(function(){
    
    $(".draggable").draggable();
    $(".draggable2").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    
    $(".draggable4").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    
    $(".draggable6").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable7").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable8").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable9").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable10").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable11").draggable({snap:true,snapTolerance:5,snapMode: "outer"});

    $(".draggable13").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable14").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable15").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
    $(".draggable16").draggable({snap:true,snapTolerance:5,snapMode: "outer"});
	$(".droppable").droppable({
		drop: function(e, ui){
            $elemento=ui.draggable.attr('id');
            $id_s=ui.draggable.attr('name1');
            $id_ss=ui.draggable.attr('name2');
            
            
            console.log("seccion",$id_s);
            console.log("subseccion",$id_ss);
            console.log("objeto",$elemento);
            $equal='';
            for ($i=500; $i>=1; $i--){
                if ($elemento==$i){
                    $equal='a';
                }
            }
            for ($i=100; $i>=1; $i--){
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
                if ($elemento=="elemh"+$i){

                    $equal='h';
                }
                if ($elemento=="elemi"+$i){

                    $equal='i';
                }
                if ($elemento=="elemj"+$i){

                    $equal='j';
                }
                if ($elemento=="elemk"+$i){

                    $equal='k';
                }
                if ($elemento=="eleml"+$i){

                    $equal='l';
                }
                if ($elemento=="elemm"+$i){

                    $equal='m';
                }
                if ($elemento=="elemn"+$i){

                    $equal='n';
                }
                if ($elemento=="elemo"+$i){

                    $equal='o';
                }
                
            }
            if ($elemento=="elemp"){
                    $equal="p"
                }
            if ($equal=='a'){
                $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
                $( ".draggable" ).draggable({ containment: "#droppable"});
                $tama=$elemento.length;
                
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
            $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                
                var el = document.getElementById(String($elemento));
                var st = window.getComputedStyle(el, null);
                $grad=st.getPropertyValue("rotate");
                console.log($grad);
            $( ".draggable2" ).draggable({ containment: "#droppable"});
            
            ubica2($id_s,$id_ss,$elemento,$grad)
            $equal='';

        }
        if($equal=='d'){
            $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
            $( ".draggable4" ).draggable({ containment: "#droppable"});
            var el = document.getElementById(String($elemento));
                var st = window.getComputedStyle(el, null);
                $grad=st.getPropertyValue("rotate");
                console.log($grad);
            ubica2($id_s,$id_ss,$elemento,$grad)
            $equal='';
        }
        

        if($equal=='f'){
            $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
            $( ".draggable6" ).draggable({ containment: "#droppable"});
            var el = document.getElementById(String($elemento));
                var st = window.getComputedStyle(el, null);
                $grad=st.getPropertyValue("rotate");
                console.log($grad);
            ubica2($id_s,$id_ss,$elemento,$grad)
            $equal='';
        }
        if($equal=='g'){
            $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
            $( ".draggable7" ).draggable({ containment: "#droppable"});
            var el = document.getElementById(String($elemento));
                var st = window.getComputedStyle(el, null);
                $grad=st.getPropertyValue("rotate");
                console.log($grad);
            ubica2($id_s,$id_ss,$elemento,$grad)
            $equal='';
        }
        if($equal=='h'){
            $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
            $( ".draggable8" ).draggable({ containment: "#droppable"});
            var el = document.getElementById(String($elemento));
                var st = window.getComputedStyle(el, null);
                $grad=st.getPropertyValue("rotate");
                console.log($grad);
            ubica2($id_s,$id_ss,$elemento,$grad)
            $equal='';
        }
        if($equal=='i'){
            $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
            $( ".draggable9" ).draggable({ containment: "#droppable"});
            var el = document.getElementById(String($elemento));
                var st = window.getComputedStyle(el, null);
                $grad=st.getPropertyValue("rotate");
                console.log($grad);
            ubica2($id_s,$id_ss,$elemento,$grad)
            $equal='';
        }
        if($equal=='j'){
            $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
            $( ".draggable10" ).draggable({ containment: "#droppable"});
            var el = document.getElementById(String($elemento));
                var st = window.getComputedStyle(el, null);
                $grad=st.getPropertyValue("rotate");
                console.log($grad);
            ubica2($id_s,$id_ss,$elemento,$grad)
            $equal='';
        }
        if($equal=='k'){
            $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
            $( ".draggable11" ).draggable({ containment: "#droppable"});
            var el = document.getElementById(String($elemento));
                var st = window.getComputedStyle(el, null);
                $grad=st.getPropertyValue("rotate");
                console.log($grad);
            ubica2($id_s,$id_ss,$elemento,$grad)
            $equal='';
        }
        if($equal=='m'){
            $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
            $( ".draggable13" ).draggable({ containment: "#droppable"});
            var el = document.getElementById(String($elemento));
                var st = window.getComputedStyle(el, null);
                $grad=st.getPropertyValue("rotate");
                console.log($grad);
            ubica2($id_s,$id_ss,$elemento,$grad)
            $equal='';
        }
        if($equal=='n'){
            $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
            $( ".draggable14" ).draggable({ containment: "#droppable"});
            var el = document.getElementById(String($elemento));
                var st = window.getComputedStyle(el, null);
                $grad=st.getPropertyValue("rotate");
                console.log($grad);
            ubica2($id_s,$id_ss,$elemento,$grad)
            $equal='';
        }
        if($equal=='o'){
            $elemento=ui.draggable.attr('id');
                $x=document.getElementById(String($elemento)).style.left;
                $y=document.getElementById(String($elemento)).style.top;
                console.log($x);
                console.log($y);
            $( ".draggable15" ).draggable({ containment: "#droppable"});
            var el = document.getElementById(String($elemento));
                var st = window.getComputedStyle(el, null);
                $grad=st.getPropertyValue("rotate");
                console.log($grad);
            ubica2($id_s,$id_ss,$elemento,$grad)
            $equal='';
        }  
        
        if ($equal=="p"){
            $elemento=ui.draggable.attr('id');
            $( ".draggable15" ).draggable({ containment: "#droppable"});
            var confirm= alertify.confirm('ELIMINAR','Confirmas eliminar tu espacio de trabajo?',null,null).set('labels', {ok:'Eliminar', cancel:'No, conserva todo'}); 	
 
                confirm.set({transition:'slide'});   	
                
                confirm.set('onok', function(){ //callbak al pulsar botón positivo
                        eliminatodo($id_s,$id_ss,$elemento);
                        alertify.success('Se ha eliminado tu espacio de trabajo');
                        setTimeout(recarga,2000);
                        
                });
                
                confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
                    alertify.error('Has manetenido tu espacio de trabajo');
                    recarga()
                });

            $equal='';


        }
            
        }
        
	
    });
    
    
    
        
 
    
    
    
	
});
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


        $("#"+num).load('js/SST.php',{valor:valor,x3:x3,y3:y3,ele:ele});
    });
}
function ubica2(id_s,id_ss,ele,grad){   
    //alert("Esta es la tumba "+num+" de la sección "+id_s+" subsección "+id_ss);
    var ubicacion=id_s+"-"+id_ss;
    //alert($valor);
    var x2=$x.substr('x',($x.length -1));
    var x3=x2.substr('p',(x2.length -1));
    var y2=$y.substr('x',($y.length -1));
    var y3=y2.substr('p',(y2.length -1));
    var grado=grad;
    var tama=document.getElementById(String(ele)).clientWidth;
    var tama2=document.getElementById(String(ele)).clientHeight;
    console.log(ubicacion,x3,y3,grado);
    $(document).ready(function(){
        $("#"+ele).load('js/SSO.php',{ele:ele,ubicacion:ubicacion,x3:x3,y3:y3,grado:grado,tama:tama,tama2:tama2});
    });
}
function eliminatodo(id_s,id_ss,num){
    var ubicacion=id_s+"-"+id_ss;
    $(document).ready(function(){
        $("#"+num).load('js/SSALL.php',{ubicacion:ubicacion});
    });
}
function recarga(){
    location.reload();
}