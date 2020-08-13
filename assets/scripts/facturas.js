$(document).ready(function () {
    //mostramo la funcion del listado de los datos
    listado();

});

//listado facturas
function listado() {
    $.ajax({
        type: "POST",
        url: "facturas/listado",
        dataType: "json",
        success: function (data) {
            html = "<table class='table table-hover' id='tablafiltro'><thead>";
            html += "<tr><th scope='col'>Concepto compra</th><th scope='col'>Fecha compra</th><th scope='col'>Valor compra</th><th scope='col'>Nombre socio</th><th scope='col'>Tipo socio</th><th scope='col'>Fondo socio</th><th scope='col'>Acciones</th></tr></thead>";
            html += "<tbody>";
            //var tbody = "<tbody>";
            for (var key in data) {
                html += "<tr>";
                html += "<td>" + data[key]['concepto_factura'] + "</td>";
                html += "<td>" + data[key]['fec_factura'] + "</td>";
                html += "<td>" + data[key]['valor'] + "</td>";
                html += "<td>" + data[key]['nombres_socio'] + "</td>";
                html += "<td>" + data[key]['tipo_socio'] + "</td>";
                html += "<td>" + data[key]['fondos_socio'] + "</td>";
                html += `<td>
               <a href="#" id="del" value="${data[key]['id_factura']}" class="btn btn-sm btn-danger" title="Eliminar">
               <i class="fa fa-trash"></i>
               </a>
               </td>`;
            }
            html += "</tr></tbody></table>"
            $("#tablafacturas").html(html);
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
                    url: "facturas/eliminar",
                    data: { idEliminar: idEliminar },
                    success: function (r) {
                        if (r == 1) {
                            listado();
                            swal("Factura eliminada!", {
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