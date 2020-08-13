<?php $this->load->view('templates/header'); ?>

<?php $this->load->view('templates/nav'); ?>

<div class="container">
    <div class="d-flex flex-row justify-content-center">
        <div class="col-md-10 mt-5">
            <div class="table-responsive">
                <h3><img src="<?php echo base_url('assets/icons/socios.ico') ?>" width="30" height="30"> Listado de los socios</h3>
                <div id=tablainicial>
                </div>
            </div>
        </div>
    </div>
</div>









<?php $this->load->view('templates/footer'); ?>

<!--cargamos el script de js para mostrar los datos -->
<script type="text/javascript">
    $(document).ready(function() {
        listado();
    });



    //listado socio
function listado() {
    $.ajax({
        type: "POST",
        url: "addsocio/listado",
        dataType: "json",
        success: function (data) {
            html = "<table class='table table-hover' id='tablafiltro'><thead>";
            html += "<tr><th scope='col'>Tipo Socio</th><th scope='col'>Cedula</th><th scope='col'>Nombres</th><th scope='col'>Fondos</th></tr></thead>";
            html += "<tbody>";
            //var tbody = "<tbody>";
            for (var key in data) {
                html += "<tr>";
                html += "<td>" + data[key]['tipo_socio'] + "</td>";
                html += "<td>" + data[key]['cedula_socio'] + "</td>";
                html += "<td>" + data[key]['nombres_socio'] + "</td>";
                html += "<td>" + "$ " + data[key]['fondos_socio'] + "</td>";
            }
            html += "</tr></tbody></table>"
            $("#tablainicial").html(html);
            //tabla filtro
            $('#tablafiltro').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });
        }
    });
}
</script>