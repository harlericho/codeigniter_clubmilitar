$(document).ready(function () {
    //mostramo la funcion cargar socios
    cargarSocio();


    //accion del boton agregar
    $('#btnComprar').click(function (e) {
        e.preventDefault();
        if (validaciones() == true) {
            let data = $("#formaddconsumo").serialize();
            guardar(data);
        }
    });
});


//guardar autorizado
function guardar(data) {
    $.ajax({
        type: "POST",
        url: "consumo/insertar",
        data: data,
        success: function (r) {
            if (r == 0) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Valor compra supera al fondo del socio');
                $("#txtvalorconsumo").focus();
            } else if (r == 1) {
                $("#formaddconsumo")[0].reset();
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Consumo del socio guardado');
                $("#selecsocioa").focus();
            }
        }
    });
}


//cargar los socios
function cargarSocio() {
    $.ajax({
        type: "POST",
        url: "consumo/cargar",
        dataType: "json",
        success: function (data) {
            html = "<select class='custom-select' id='selecsocioa' name='selecsocioa' autofocus>";
            html += "<option selected disabled >--Seleccione--</option>";
            for (var key in data) {
                html += `<option value="${data[key]['id_socio']}"> ${data[key]['nombres_socio']} ${data[key]['tipo_socio']}</option>`;
            }
            html += "</select>";
            $("#selectsocios").html(html);
        }
    });
}




//validaciones
function validaciones() {
    let socio = $("#selecsocioa").val();
    let nombres = $("#txtnombreconsumo").val();
    let fecha = $("#fechaconusmo").val();
    let valor = $("#txtvalorconsumo").val();
    if ($.trim(socio) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Elegir un socio');
        $("#selecsocioa").focus();
    } else if ($.trim(nombres) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba el concepto de compra');
        $("#txtnombreconsumo").focus();
    } else if ($.trim(fecha) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Elegir una fecha');
        $("#fechaconusmo").focus();
    } else if ($.trim(valor) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba su un valor de compra');
        $("#txtvalorconsumo").focus();
    } else {
        return true;
    }
}

