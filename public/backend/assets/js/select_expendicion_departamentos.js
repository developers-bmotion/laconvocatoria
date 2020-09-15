$(function() {
    $('.expedi_departamentos').on('change', onSelectDepartamentosChange);
});

function onSelectDepartamentosChange() {
    var depart_id = $(this).val();
    // AJAX
    $.get('/dashboard/get-municipios/' + depart_id, function(data) {

        var html_select = '<option value="">Seleccione una opción</option>'
        for (var i = 0; i < data.length; i++)
            html_select += '<option value="' + data[i].id + '">' + data[i].descripcion + '</option>'

        console.log(html_select);
        $('.expid_municipios').html(html_select);
    });


}