
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


/* $("#input-max-members").keypress( function(){
    console.log('es to es key press');
}); */


/*  funcion para agragar un nuevo integrante  */
var maxMember = 5;

$("#event-add-max-members").click( function() {
    $("#m_section_1_content").empty(); // vaciar la vista
    let members = parseInt( $("#input-max-members").val() )

    // validar el numero de integrantes maximo 12
    if (members > maxMember) {
        $("#help-max-members").show();
        return;
    } else {
        $("#help-max-members").hide();
    }

    for(let i = 0; i < members; i++){
        addMembers(i);
    }
});

/* funcion para agregar nuevos items */
function addMembers(members) {    
    var newItem = `<div id="member-${members}" class="m-accordion__item">
                        <div class="m-accordion__item-head collapsed" role="tab" id="section_members_head_${members}" data-toggle="collapse" href="#section_members_body_${members}">
                            <span class="m-accordion__item-title">Datos del Integrante No. ${(members + 1)}</span>
                            <span class="m-accordion__item-mode"></span>
                        </div>
                        <div class="m-accordion__item-body collapse" id="section_members_body_${members}" role="tabpanel" aria-labelledby="section_members_head_${members}" data-parent="#m_section_1_content">
                            <div class="m-accordion__item-content">
                                ${ addFormMembers() }                             
                            </div>                                                      
                        </div>                        
                    </div>`;

    $("#m_section_1_content").append(newItem);  
}

function addFormMembers() {
    return `<div class="m-form__section m-form__section--first">
                <div class="m-form__heading">
                    <h3 class="m-form__heading-title">Información personal</h3>
                </div>

                <!--=====================================
                    NOMBRES Y APELLIDOS
                ======================================-->
                <div class="form-group m-form__group row">
                    <div class="col-lg-6 m-form__group-sub">
                        <label class="form-control-label">Nombre *</label>
                        <input type="text" name="name"class="form-control m-input" placeholder="" value="">
                        <span class="m-form__help">Por favor ingrese su nombre completo</span>
                    </div>

                    <div class="col-lg-6 m-form__group-sub">
                        <label class="form-control-label">Primer apellido *</label>
                        <input type="text" name="lastname" class="form-control m-input" placeholder="" value="">
                        <span class="m-form__help">Por favor ingrese su primer apellido</span>
                    </div>
                </div>

                <!--=====================================
                    SEGUNDO APELLIDO Y TÉLEFONO
                ======================================-->
                <div class="form-group m-form__group row">
                    <div class="col-lg-6 m-form__group-sub">
                        <label class="form-control-label">Segundo apellido *</label>
                        <input type="text" name="second_last_name" class="form-control m-input" placeholder="" value="">
                        <span class="m-form__help">Por favor ingrese su segundo apellido</span>
                    </div>

                    <div class="col-lg-6 m-form__group-sub">
                        <label class="form-control-label">Teléfono celular *</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="la la-phone"></i></span>
                            </div>
                            <input type="text" name="phone_1" class="form-control m-input" placeholder="" value="">
                        </div>
                        <span class="m-form__help">Por favor ingrese su número de teléfono</span>
                    </div>
                </div>

                <!--=====================================
                    TIPO DE DOCUMENTO Y Nº IDENTIFICACIÓN
                ======================================-->
                <div class="form-group m-form__group row">
                    <div class="col-lg-6 m-form__group-sub">
                        <label class="form-control-label">Tipo de documento *</label>                        
                        <select name="document_type" class="form-control m-input">
                            <option value="">Select</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                        <span class="m-form__help">Por favor seleccione una opción.</span>
                    </div>

                    <div class="col-lg-6 m-form__group-sub">
                        <label class="form-control-label">Nº de indentificación *</label>
                        <input type="num" name="identificacion" class="form-control m-input" placeholder="" value="">                        
                        <span class="m-form__help">Por favor ingrese el número de indentificación</span>
                    </div>
                </div> 

                <!--=====================================
                    DEPARTAMENTO EXPED Y MUNICIPIO DE EXPEDI
                ======================================-->
                <div class="form-group m-form__group row">
                    <div class="col-lg-6 m-form__group-sub">
                        <label class="form-control-label">Departamento de expedición *</label>
                        <select name="document_type" class="form-control m-input">
                            <option value="">Select</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                        <span class="m-form__help">Por favor seleccione una opción.</span>
                    </div>

                    <div class="col-lg-6 m-form__group-sub">
                        <label class="form-control-label">Municipio de expedición *</label>
                        <select name="document_type" class="form-control m-input">
                            <option value="">Select</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                        <span class="m-form__help">Por favor seleccione una opción.</span>
                    </div>
                </div>

            </div>`;
}





/*  funcion para agragar un nuevo integrante  */
/* var listElementMembers = []; 
var numberMember = 0;

$("#add-new-member").click( function(){
    numberMember++
    // validar el numero de integrantes maximo 12
    if (numberMember > (maxMember - 1)) {
        $("#limit-members").show();
        numberMember--;
        return;
    }
    
    var newItem = `<div id="member-${numberMember}" class="m-accordion__item">
                        <div class="m-accordion__item-head collapsed" role="tab" id="section_members_head_${numberMember}" data-toggle="collapse" href="#section_members_body_${numberMember}">
                            <span class="m-accordion__item-title" style="width: 90%;">Datos de la Persona</span>
                            <span class="m-accordion__item-mode"></span>
                        </div>
                        <div class="m-accordion__item-body collapse" id="section_members_body_${numberMember}" role="tabpanel" aria-labelledby="section_members_head_${numberMember}" data-parent="#m_section_1_content">
                            <div class="m-accordion__item-content">
                                <p>
                                parte dos
                                </p>                                                
                            </div>                                                      
                        </div>                        
                    </div>`;

    $("#m_section_1_content").append(newItem);    
    listElementMembers.push($(`#member-${numberMember}`));
}); */

/* metodo para eliminar miembros del grupo */
/* function deleteMember(index) {
    if (listElementMembers.length === 0) return

    let elementDelete;
    let pos = (index - 1)
    let posDelete = -1; 

    for (i = 0; i < listElementMembers.length; i++){
        if (i === pos){
            elementDelete = listElementMembers[i]
            posDelete = i
            break
        }
    }

    listElementMembers.splice(posDelete, 1)
    elementDelete.remove();  
    numberMember = numberMember - 1

    if (numberMember < maxMember) $("#limit-members").hide();  
} */