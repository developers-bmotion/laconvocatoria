
/*=============================================
SELECT LINEA DE LA CONVOCATORIA
=============================================*/
var idSelectLineaConvocatoria;
var idSelectActuaraComo;
$('.selectLineaConvocatoriaFormRegisterAspirante').on('change', function() {
    var idSelectLineaConvocatoria = $(this).val();
    console.log(idSelectLineaConvocatoria);
    if (idSelectLineaConvocatoria == 1) {
        $(".show-select-form-actuara-como").show();
        $("#selectActuaraComoFormRepresentante option[value='1']").show();
        $("#selectActuaraComoFormRepresentante option[value='3']").hide();
    } else if (idSelectLineaConvocatoria == 2 || idSelectLineaConvocatoria == 3) {
        $(".show-select-form-actuara-como").show();
        $("#selectActuaraComoFormRepresentante option[value='3']").show();
    }
    if (idSelectLineaConvocatoria == 2){
        $("#selectActuaraComoFormRepresentante option[value='1']").hide();
        $('.content-informacion-grupo-musical').show();
    }else{
        $('.content-informacion-grupo-musical').hide();
    }
});

/*=============================================
SELECT ACTUARÁ COMO PARA MOSTRAR CONTENIDO
=============================================*/
$('#selectActuaraComoFormRepresentante').on('change', function() {
    var idSelectActuaraComo = $(this).val();

    if (idSelectActuaraComo == 1){

        /* CONTENIDO DEL ASPIRANTE*/
        $('.content-informacion-aspirante').show();
        /* BOTON PARA ENVIAR DATOS*/
        $('.btn-enviar-datos').show();
    }else{
        /* CONTENIDO DEL ASPIRANTE*/
        $('.content-informacion-aspirante').hide();
    }

    if (idSelectActuaraComo == 2){
        /* CONTENIDO DEL ASPIRANTE*/
        $('.content-informacion-aspirante').show();
        /* CONTENIDO DEL MENOR DE EDAD*/
        $('.content-informacion-menor-edad ').show();
        /* BOTON PARA ENVIAR DATOS*/
        $('.btn-enviar-datos').show();
    }else{
        /* CONTENIDO DEL MENOR DE EDAD*/
        $('.content-informacion-menor-edad').hide();
    }

    if( idSelectLineaConvocatoria == 2 && idSelectActuaraComo == 3){
        $('.content-informacion-grupo-musical').show();
    }
    if( idSelectLineaConvocatoria == 2 && idSelectActuaraComo == 2){
        $('.content-informacion-grupo-musical').show();
    }

});

