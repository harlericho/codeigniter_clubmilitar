$(document).ready(function () {

    //mostramo la funcion del listado de los datos
    listado();
    //modal se queda estatico y no se cierra
    $('#exampleModal').modal({
        backdrop: 'static',
        keyboard: false,
        focus: false,
        show: false
    });

    //accion del boton agregar
    $('#btnAgregar').click(function (e) {
        e.preventDefault();
        if (validaciones() == true) {
            let id = $("#id").val();
            let data = $("#formaddsocio").serialize();
            if ($.trim(id) == "") {
                guardar(data);
                //alert("1");
            } else {
                //alert("2");
                modificar(data);
            }
        }
    });


});



//guardar socio
function guardar(data) {
    $.ajax({
        type: "POST",
        url: "addsocio/insertar",
        data: data,
        success: function (r) {
            if (r == 0) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Monto es superior a lo permitido');
                $("#txtfondsocio").focus();
            } else if (r == 1) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Cedula ya existe');
                $("#txtcedsocio").focus();
            } else if (r == 2) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Solo debe existir 3 socios VIP');
                $("#txttiposocio").focus();
            } else if (r == 3) {
                $("#exampleModal").modal("hide");
                $("#formaddsocio")[0].reset();
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Socio guardado');
                $("#txttiposocio").focus();
                listado();
            }

        }
    });
}

//modificar socio
function modificar(data) {
    $.ajax({
        type: "POST",
        url: "addsocio/modificar",
        data: data,
        success: function (r) {
            if (r == 0) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Monto es superior a lo permitido');
                $("#txtfondsocio").focus();
            } else if (r == 1) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error('Solo debe existir 3 socios VIP');
                $("#txttiposocio").focus();
            } else if (r == 2) {
                $("#exampleModal").modal("hide");
                $("#formaddsocio")[0].reset();
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Socio modificado');
                listado();
            }
        }
    });
}

//eliminar socio
$(document).on("click", "#del", function (e) {
    let idEliminar = $(this).attr("value");
    swal({
        title: "¿ Desea eliminar este registro ?",
        text: "! Se elimina el registro en la base de datos ¡",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "addsocio/eliminar",
                    data: { idEliminar: idEliminar },
                    success: function (r) {
                        if (r == 1) {
                            listado();
                            swal("Socio eliminado!", {
                                icon: "success",
                            });
                        }

                    }
                });

            } else {
                swal("Usted cancelo la eliminacion!");
            }
        });
    e.preventDefault();
});



//listado socio
function listado() {
    $.ajax({
        type: "POST",
        url: "addsocio/listado",
        dataType: "json",
        success: function (data) {
            html = "<table class='table table-hover' id='tablafiltro'><thead>";
            html += "<tr><th scope='col'>Tipo Socio</th><th scope='col'>Cedula</th><th scope='col'>Nombres</th><th scope='col'>Fondos</th><th scope='col'>Acciones</th></tr></thead>";
            html += "<tbody>";
            //var tbody = "<tbody>";
            for (var key in data) {
                html += "<tr>";
                html += "<td>" + data[key]['tipo_socio'] + "</td>";
                html += "<td>" + data[key]['cedula_socio'] + "</td>";
                html += "<td>" + data[key]['nombres_socio'] + "</td>";
                html += "<td>" + "$ " + data[key]['fondos_socio'] + "</td>";
                html += `<td>
               <a href="#" id="del" value="${data[key]['id_socio']}" class="btn btn-sm btn-danger" title="Eliminar">
               <i class="fa fa-trash"></i>
               </a>
               <a href="#" id="edit" value="${data[key]['id_socio']}" class="btn btn-sm btn-success" title="Editar">
               <i class="fa fa-pencil"></i>
               </a>
               </td>`;
            }
            html += "</tr></tbody></table>"
            $("#tablasocio").html(html);
            //tabla filtro
            $('#tablafiltro').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });
        }
    });
}








//obtener el id del socio
$(document).on("click", "#edit", function (e) {
    let idEditar = $(this).attr("value");
    $.ajax({
        type: "POST",
        url: "addsocio/idsocio",
        dataType: "json",
        data: { idEditar: idEditar },
        success: function (data) {
            if (data.res == "suc") {
                $("#exampleModal").modal("show");//abro el modal
                $("#id").val(data.post.id_socio);
                $("#txttiposocio").val(data.post.tipo_socio);
                $("#txtcedsocio").val(data.post.cedula_socio);
                $("#txtnomsocio").val(data.post.nombres_socio);
                $("#txtfondsocio").val(data.post.fondos_socio);
                document.getElementById("txtcedsocio").readOnly = true;
            }

        }
    });

    e.preventDefault();
});





//limpiar las cajas de los input
function limpiar() {
    document.getElementById("id").value = '';
    document.getElementById("txttiposocio").value = '';
    document.getElementById("txtcedsocio").value = '';
    document.getElementById("txtnomsocio").value = '';
    document.getElementById("txtfondsocio").value = '';
    document.getElementById("txtcedsocio").readOnly = false;
    //$("#modaladd")[0].reset();
}

//validaciones
function validaciones() {
    let tipo = $("#txttiposocio").val();
    let cedula = $("#txtcedsocio").val();
    let nombres = $("#txtnomsocio").val();
    let fondo = $("#txtfondsocio").val();
    if ($.trim(tipo) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba su tipo socio');
        $("#txttiposocio").focus();
    } else if ($.trim(cedula) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba su cedula');
        $("#txtcedsocio").focus();
    } else if ($.trim(nombres) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba sus nombres');
        $("#txtnomsocio").focus();
    } else if ($.trim(fondo) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba su fondo inicial');
        $("#txtfondsocio").focus();
    } else {
        return true;
    }
}

// numeros decimales
function decimales() {
    // Solo permite ingresar numeros con punto o coma
    $(".decimales").on("input", function () {
        this.value = this.value.replace(/[^0-9,.]/g, "").replace(/,/g, ".");
    });

}

//hacer que empiece el autofocus en el modal
$(function () {
    $('#exampleModal').on('shown.bs.modal', function (e) {
        $('#txttiposocio').focus();
    })
});