/* SELECT LINEA DE LA CONVOCATORIA */
var lineaConvocatoria = 0;

$('#select-linea-convocatoria').on('change', function() {
    lineaConvocatoria = $(this).val()
    $("#select-actuara-como").prop('disabled', false);
    hideContentInfo();

    switch ( lineaConvocatoria ) {
        case '-1': $("#content-select-form-actuara-como").hide(); 
                $("#select-actuara-como").val("-1");    
            break;
        case '1': $("#content-select-form-actuara-como").show();
                $("#select-actuara-como option[value='1']").show();
                $("#select-actuara-como option[value='3']").hide(); 
                $("#select-actuara-como").val("-1");    
            break;
        case '2': $("#content-select-form-actuara-como").show();
                /* $("#select-actuara-como option[value='1']").hide();
                $("#select-actuara-como option[value='2']").hide();
                $("#select-actuara-como option[value='3']").show(); */ 
                showInfoGroup()
                $("#select-actuara-como").val("3");    
                $("#select-actuara-como").prop('disabled', true);
            break;
    }   
});

/* funcion para ocultar elementos de la vista */
function hideContentInfo() {
    $('#content-informacion-aspirante').hide();
    $('#content-informacion-menor-edad').hide();
    $('#content-informacion-grupo-musical').hide();
    $('#btn-enviar-datos').hide();
}

/* SELECT ACTUARÁ COMO PARA MOSTRAR CONTENIDO */
$('#select-actuara-como').on('change', function() {
    switch ( $(this).val() ) {
        case '-1': hideContentInfo()
            break;
        case '1': $('#title-info-aspirante').html('Información del aspirante');
                $('#content-informacion-aspirante').show();
                $('#content-informacion-menor-edad').hide();
                $('#content-informacion-grupo-musical').hide();
                $('#btn-enviar-datos').show();
            break;
        case '2': $('#title-info-aspirante').html('Información del representante para el menor de edad');
                $('#content-informacion-aspirante').show();
                $('#content-informacion-menor-edad').show();
                $('#content-informacion-grupo-musical').hide();
                $('#btn-enviar-datos').show();
            break;
        /* case '3': $('#title-info-aspirante').html('Información del representante para el grupo');
                $('#content-informacion-aspirante').show();
                $('#content-informacion-menor-edad').hide();
                $('#content-informacion-grupo-musical').show();
                $('#btn-enviar-datos').show(); 
            break;*/
    }
});

/* funcion para mostrar los datos del grupo */
function showInfoGroup() {
    $('#title-info-aspirante').html('Información del representante para el grupo');
    $('#content-informacion-aspirante').show();
    $('#content-informacion-menor-edad').hide();
    $('#content-informacion-grupo-musical').show();
    $('#btn-enviar-datos').show();
}

/* funcion para mostrar las vistas dependiendo de la opcion elegida: solista o grupo */
/* function showContentInfo() {
    console.log('lineaConvocatoria:: ', lineaConvocatoria);
    if (lineaConvocatoria === '1') {
        $('#content-informacion-aspirante').show();
        $('#content-informacion-menor-edad').show();
        $('#content-informacion-grupo-musical').hide();
        return
    } 

    if (lineaConvocatoria === '2') {
        $('#content-informacion-aspirante').show();
        $('#content-informacion-menor-edad').hide();
        $('#content-informacion-grupo-musical').show();
    }     
} */



/* $("#input-max-members").keypress( function(){
    console.log('es to es key press');
}); */

/*  funciones para agragar un nuevo integrante  */
var maxMember = 12;

$("#event-add-max-members").click( function() {
    $("#m_section_1_content").empty(); // vaciar la vista
    let members = parseInt( $("#input-max-members").val() )
    
    if (members > maxMember) { // validar el numero de integrantes maximo 12
        $("#help-max-members").show();
        return;
    } else {
        $("#help-max-members").hide();
    }

    for(let i = 0; i < members; i++){
        addViewMembers(i);
    }
});

/* funcion para agregar nuevos items */
function addViewMembers(members) {    
    var newItem = `<div id="member-${members}" class="m-accordion__item">
                        <div class="m-accordion__item-head collapsed" role="tab" id="section_members_head_${members}" data-toggle="collapse" href="#section_members_body_${members}">
                            <span class="m-accordion__item-title">Datos del Integrante No. ${(members + 1)}</span>
                            <span class="m-accordion__item-mode"></span>
                        </div>
                        <div class="m-accordion__item-body collapse" id="section_members_body_${members}" role="tabpanel" aria-labelledby="section_members_head_${members}" data-parent="#m_section_1_content">
                            <div class="m-accordion__item-content">
                                ${ addViewFormMembers() }                             
                            </div>                                                      
                        </div>                        
                    </div>`;

    $("#m_section_1_content").append(newItem);  
}

function addViewFormMembers() {
    return `<div class="m-form__section m-form__section--first">
                <div class="m-form__heading">
                    <h3 class="m-form__heading-title">Información personal</h3>
                </div>

                <!-- NOMBRES Y APELLIDOS -->
                ${ addViewNameMembers() }                

                <!-- SEGUNDO APELLIDO Y TÉLEFONO -->
                ${ addViewPhoneMembers() }

                <!-- TIPO DE DOCUMENTO Y Nº IDENTIFICACIÓN -->
                ${ addViewIdentificationMembers() }

                <!-- DEPARTAMENTO EXPED Y MUNICIPIO DE EXPEDI -->
                ${ addViewLocationMembers() }

                <!-- CARGAR DOCUMENTO -->
                ${ addViewUploadArchiveMember() }

                <div class="m-separator m-separator--dashed m-separator--lg"></div>

                <div class="m-form__section">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Información de nacimiento y residencia
                            <i data-toggle="m-tooltip" data-width="auto" class="m-form__heading-help-icon flaticon-info"
                                title="Ingrese los datos de nacimiento y residencia"></i>
                        </h3>
                    </div>

                    ${ addViewLocationMembers() }

                    <div class="form-group m-form__group row">
                        <div class="col-lg-6 m-form__group-sub">
                            <label class="form-control-label">Dirección de residencia *</label>
                            <input type="text" name="adress" class="form-control m-input" placeholder="" value="">
                            <span class="m-form__help">Por favor ingrese dirección de residencia</span>
                        </div>
                    </div>
                </div>

            </div>`;
}

function addViewNameMembers() {  /* NOMBRES Y APELLIDOS */
    return `<div class="form-group m-form__group row">
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
            </div>`;
}
// @json() para traer variables del blade a javascript
function addViewPhoneMembers() { /* SEGUNDO APELLIDO Y TÉLEFONO */
    return `<div class="form-group m-form__group row">
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
            </div>`;
}

function addViewIdentificationMembers() { /* TIPO DE DOCUMENTO Y Nº IDENTIFICACIÓN */
    return `<div class="form-group m-form__group row">
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
            </div> `;
}

function addViewLocationMembers() { /* DEPARTAMENTO EXPED Y MUNICIPIO DE EXPEDI */
    return `<div class="form-group m-form__group row">
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
            </div> `;
}

function addViewUploadArchiveMember() {
    return `<div class="form-group m-form__group row">
                <div class="col-lg-6 m-form__group-sub">
                    <label for="">Pdf Cédula</label>
                    <div class="m-dropzone pdf_cedula_dropzone m-dropzone--success"
                        action="inc/api/dropzone/upload.php" id="m-dropzone-three">
                        <div class="m-dropzone__msg dz-message needsclick">
                            <h3 class="m-dropzone__msg-title">Subir documento de identificación</h3>
                            <span class="m-dropzone__msg-desc">Arrastra, o has click aqui para subir</span>
                        </div>
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