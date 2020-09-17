$(function() {
    $('.expedi_departamentos').on('change', onSelectDepartamentosChange);
    $('.expid_municipios').on('change', onSelectMunicipiosChange);
});

function onSelectDepartamentosChange() {
    var depart_id = $(this).val();
    // AJAX
    $.get('/dashboard/get-municipios/' + depart_id, function(data) {

        var html_select = '<option value="">Seleccione una opción</option>'
        for (var i = 0; i < data.length; i++)
            html_select += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>'


        $('.expid_municipios').html(html_select);
    });

    $.get('/dashboard/expedicion-departamento/' + depart_id, function(data) {

        $('.confirmTxtExpeDepartamentoAspirante').html(data.descripcion);
    });
}

function onSelectMunicipiosChange() {

    var municipio_id = $(this).val();
    $.get('/dashboard/expedicion-municipio/' + municipio_id, function(data) {

        $('.confirmTxtExpeMunicipioAspirante').html(data.descripcion);
    });
}



$(function() {
    $('.nacimiento_departamentos').on('change', onSelectDepartamentosNacimientoChange);
    $('.nacimiento_municipios').on('change', onSelectNacimientoMunicipiosChange);
});

function onSelectDepartamentosNacimientoChange() {
    var depart_id = $(this).val();
    // AJAX
    $.get('/dashboard/get-municipios/' + depart_id, function(data) {

        var html_select = '<option value="">Seleccione una opción</option>'
        for (var i = 0; i < data.length; i++)
            html_select += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>'
        $('.nacimiento_municipios').html(html_select);
    });

    $.get('/dashboard/expedicion-departamento/' + depart_id, function(data) {
        console.log(data.descripcion);
        $('.confirmTxtNacimiDepartamentoAspirante').html(data.descripcion);
    });
}

function onSelectNacimientoMunicipiosChange() {

    var municipio_id = $(this).val();
    $.get('/dashboard/expedicion-municipio/' + municipio_id, function(data) {

        $('.confirmTxtNacimiMunicipioAspirante').html(data.descripcion);
    });
}
