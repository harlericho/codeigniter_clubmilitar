<?php $this->load->view('templates/header'); ?>

<?php $this->load->view('templates/nav'); ?>
<div class="container">
    <div class="d-flex flex-row justify-content-center">
        <div class="col-md-10 mt-5">
            <div class="table-responsive">
                <h3><img src="<?php echo base_url('assets/icons/ventas.ico') ?>" width="30" height="30">
                    Listado de la facturas de cada socio
                </h3>
                <hr style="background-color: black; color:black; height: 1px;">
                <!-- tabla de datos -->
                <div id="tablafacturas">
                </div>
            </div>
            <hr style="background-color: black; color:black; height: 1px;">
        </div>
    </div>
</div>



<?php $this->load->view('templates/footer'); ?>
<script src="<?php echo base_url('assets/scripts/facturas.js'); ?>" type="text/javascript"></script>