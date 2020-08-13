$(document).ready(function () {
    //mostramo la funcion del listado de los datos
    listado();
    cargarSocio();
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
            let data = $("#formaddautorizado").serialize();
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

//guardar autorizado
function guardar(data) {
    $.ajax({
        type: "POST",
        url: "addautorizado/insertar",
        data: data,
        success: function (r) {
            if (r == 1) {
                $("#exampleModal").modal("hide");
                $("#formaddautorizado")[0].reset();
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Persona autorizada guardado');
                $("#selecsocioa").focus();
                listado();
            }

        }
    });
}

//modificar autorizada
function modificar(data) {
    $.ajax({
        type: "POST",
        url: "addautorizado/modificar",
        data: data,
        success: function (r) {
            if (r == 1) {
                $("#exampleModal").modal("hide");
                $("#formaddautorizado")[0].reset();
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Persona autorizada modificado');
                listado();
            }
        }
    });
}



//listado autorizado
function listado() {
    $.ajax({
        type: "POST",
        url: "addautorizado/listado",
        dataType: "json",
        success: function (data) {
            html = "<table class='table table-hover' id='tablafiltro'><thead>";
            html += "<tr><th scope='col'>Tipo Socio</th><th scope='col'>Socio</th><th scope='col'>Nombre autorizado</th><th scope='col'>Acciones</th></tr></thead>";
            html += "<tbody>";
            //var tbody = "<tbody>";
            for (var key in data) {
                html += "<tr>";
                html += "<td>" + data[key]['tipo_socio'] + "</td>";
                html += "<td>" + data[key]['nombres_socio'] + "</td>";
                html += "<td>" + data[key]['nombres_autorizada'] + "</td>";
                html += `<td>
               <a href="#" id="del" value="${data[key]['id_autorizada']}" class="btn btn-sm btn-danger" title="Eliminar">
               <i class="fa fa-trash"></i>
               </a>
               <a href="#" id="edit" value="${data[key]['id_autorizada']}" class="btn btn-sm btn-success" title="Editar">
               <i class="fa fa-pencil"></i>
               </a>
               </td>`;
            }
            html += "</tr></tbody></table>"
            $("#tablaautorizada").html(html);
            //tabla filtro
            $('#tablafiltro').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });
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
                    url: "addautorizado/eliminar",
                    data: { idEliminar: idEliminar },
                    success: function (r) {
                        if (r == 1) {
                            listado();
                            swal("Persona autorizada eliminada!", {
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


//obtener el id del socio
$(document).on("click", "#edit", function (e) {
    let idEditar = $(this).attr("value");
    $.ajax({
        type: "POST",
        url: "addautorizado/idautorizada",
        dataType: "json",
        data: { idEditar: idEditar },
        success: function (data) {
            if (data.res == "suc") {
                $("#exampleModal").modal("show");//abro el modal
                $("#id").val(data.post.id_autorizada);
                $("#selecsocioa").val(data.post.id_socio);
                $("#txtsocioa").val(data.post.nombres_autorizada);
            }

        }
    });

    e.preventDefault();
});



//limpiar las cajas de los input
function limpiar() {
    document.getElementById("id").value = '';
    document.getElementById("selecsocioa").value = '--Seleccione--';
    document.getElementById("txtsocioa").value = '';
    //$("#modaladd")[0].reset();
}

//cargar los socios
function cargarSocio() {
    $.ajax({
        type: "POST",
        url: "addautorizado/cargar",
        dataType: "json",
        success: function (data) {
            html = "<select class='custom-select' id='selecsocioa' name='selecsocioa'>";
            html += "<option selected disabled >--Seleccione--</option>";
            for (var key in data) {
                html += `<option value="${data[key]['id_socio']}"> ${data[key]['nombres_socio']} ${data[key]['tipo_socio']}</option>`;
            }
            html+="</select>";
            $("#selectsocios").html(html);
        }
    });
}

//validaciones
function validaciones() {
    let socio = $("#selecsocioa").val();
    let nombres = $("#txtsocioa").val();
    if ($.trim(socio) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Elegir un socio');
        $("#selecsocioa").focus();
    } else if ($.trim(nombres) == "") {
        alertify.set('notifier', 'position', 'top-right');
        alertify.warning('Escriba sus nombres');
        $("#txtsocioa").focus();
    } else {
        return true;
    }
}

//hacer que empiece el autofocus en el modal
$(function () {
    $('#exampleModal').on('shown.bs.modal', function (e) {
        $('#selecsocioa').focus();
    })
});