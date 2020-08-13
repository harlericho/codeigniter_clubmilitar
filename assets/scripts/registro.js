$(document).ready(function () {

    $('#btnRegistro').click(function (e) {
        e.preventDefault();
        if (validaciones() == true) {
            let data = $("#formregistro").serialize();
            registro(data);
        }
    });




});


//guardar registro
function registro(data) {
    $.ajax({
        type: "POST",
        url: "registro/insertar",
        data: data,
        success: function (r) {
            if (r == 1) {
                $("#formregistro")[0].reset();
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Usuario administrador guardado');
                $('#txtnombresr').focus();
            }
        }
    });
}


//validaciones de los campos
function validaciones() {
    let nombre = $('#txtnombresr').val();
    let email = $('#txtemailr').val();
    let pass = $('#txtpassr').val();
    let repass = $('#txtrepassr').val();
    if ($.trim(nombre) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba sus nombres');
        $('#txtnombresr').focus();
    } else if ($.trim(email) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba su email');
        $('#txtemailr').focus();
    } else if ($.trim(pass) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba su contraseña');
        $('#txtpassr').focus();
    } else if ($.trim(repass) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Repetir su contraseña');
        $('#txtrepassr').focus();
    } else if ($.trim(email) != "") {
        if (validacionEmail(email) == true) {
            if ($.trim(pass) == $.trim(repass)) {
                return true;
            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Contraseñas no son iguales');
                $('#txtrepassr').focus();
            }

        } else {
            return false;
        }
    }
}

//validacion del email
function validacionEmail(valor) {
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(valor)) {
        return true;
    } else {
        alertify.set('notifier', 'position', 'top-right');
        alertify.error('Formato de email es erroneo');
        $('#txtemailr').focus();
        return false;
    }
}