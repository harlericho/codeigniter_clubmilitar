<?php $this->load->view('templates/header'); ?>

<?php $this->load->view('templates/nav'); ?>

<div class="container">
    <div class="d-flex flex-row justify-content-center">
        <div class="col-md-6 mt-5">

            <h3><img src="<?php echo base_url('assets/icons/consumo.ico') ?>" width="30" height="30">
                Agregar consumo al socio
            </h3>
            <hr style="background-color: black; color:black; height: 1px;">
            <form method="POST" action="" id="formaddconsumo">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault04">Socio</label>
                        <div id="selectsocios">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault02">Concepto consumo</label>
                        <input type="text" class="form-control" id="txtnombreconsumo" name="txtnombreconsumo">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault03">Fecha</label>
                        <input type="date" class="form-control" id="fechaconusmo" name="fechaconusmo" >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="validationDefault05">Valor compra</label>
                        <input type="number" class="form-control decimales" id="txtvalorconsumo" name="txtvalorconsumo">
                    </div>
                </div>
                <button class="btn btn-primary btn-sm" type="submit" id="btnComprar">
                <i class="fa fa-money"></i> Comprar</button>
            </form>
            <hr style="background-color: black; color:black; height: 1px;">
        </div>
    </div>
</div>





<?php $this->load->view('templates/footer'); ?>
<script src="<?php echo base_url('assets/scripts/consumo.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    // Solo permite ingresar numeros.

    function soloNumeros(e) {

        var key = window.Event ? e.which : e.keyCode

        return (key >= 48 && key <= 57)

    }
</script>