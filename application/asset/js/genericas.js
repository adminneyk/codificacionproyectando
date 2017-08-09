function validarVolver(url,mensaje){
    var mens;
    if(mensaje){
        mens=mensaje;
    } else {
        mens="Seguro que Desea Salir sin Guardar";
    }
    ;
var r = confirm("¿"+mens+"?");
if (r == true) {
    window.location=url;
}   
}