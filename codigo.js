//  Inicializa un menú contextual para toda la página
//2do menu
    // Función de ejemplo para cambiar el color de fondo de un elemento
    function ChangeElementColor(element){
        var color = [
            Math.random() * 255,
            Math.random() * 255,
            Math.random() * 255
        ];
        element.style.background = "rgb(" + color + ")"
    }

    // Inicialice un menú personalizado especial para el div "CustomContextMenu"
    
    for (var i = 0; i < 1000; i++) {
        var identi= "#"+i;
    var contextMenuTwo = CtxMenu(identi);

    contextMenuTwo.addItem("Cambiar Color del  DIV", ChangeElementColor,Icon = "info.svg");
    function holaMundo(){
        alert("¡Nuevo menu contextual!");
    }
    contextMenuTwo.addSeperator();
    // Añade una función personalizada al menú
    contextMenuTwo.addItem("Hola Mundo", holaMundo, Icon = "info.svg");
    // Añade un seperador
    contextMenuTwo.addSeperator();
    // Añade un segundo elemento al menú, esta vez con un ícono
    contextMenuTwo.addItem("Recargar Página",
        function(){
            location.reload();
        },
        Icon = "info.svg"
    );
    contextMenuTwo.addSeperator();    
    //Para añadir mas items de menu
    contextMenuTwo.addItem("Aquí pueden ir más items",
        function(){
            //código aqui
        },
        Icon = "info.svg"
    );
}