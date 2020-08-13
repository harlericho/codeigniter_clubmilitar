$(document).ready(function () {

    $('#btnIniciar').click(function (e) {
        e.preventDefault();
        if (validaciones() == true) {
            let data = $("#formlogin").serialize();
            login(data);
        }
    });
});



//iniciar login
function login(data) {
    $.ajax({
        type: "POST",
        url: "login/ingresar",
        data: data,
        success: function (r) {
            if (r == 0) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Usuario no existe, revise email o contraseña!!');
                $('#txtemail').focus();
            } else if (r == 1) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Bienvenido al sistema');
                setTimeout("redirectMain()", 1000);            
            }
        }
    });
}

//enviar a vista principal
function redirectMain() {
    window.location.href = "principal";
}





//validaciones de los campos
function validaciones() {
    let email = $('#txtemail').val();
    let pass = $('#txtpass').val();
    if ($.trim(email) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba su email');
        $('#txtemail').focus();
    } else if ($.trim(pass) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba su contraseña');
        $('#txtpass').focus();
    } else if ($.trim(email) != "") {
        if (validacionEmail(email) == true) {
            return true;
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
        $('#txtemail').focus();
        return false;
    }
}