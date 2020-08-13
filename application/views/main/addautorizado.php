<?php $this->load->view('templates/header'); ?>

<?php $this->load->view('templates/nav'); ?>
<div class="container">
    <div class="d-flex flex-row justify-content-center">
        <div class="col-md-10 mt-5">
            <!-- boton de modal -->
            <button type="button" title="Socio" class="btn btn-primary btn-sm pull-right" 
            data-toggle="modal" data-target="#exampleModal" onclick="limpiar()">
                <i class="fa fa-plus-square"> Agregar</i>
            </button>
            <div class="table-responsive">
                <h3><img src="<?php echo base_url('assets/icons/autorizado.ico') ?>" width="30" height="30">
                    Listado de personas autorizados por los socios
                </h3>
                <hr style="background-color: black; color:black; height: 1px;">
                <!-- tabla de datos -->
                <div id="tablaautorizada">
                </div>
            </div>
            <hr style="background-color: black; color:black; height: 1px;">
            <!-- modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                <i class="fa fa-users"></i> Personas autorizadas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form id="formaddautorizado" method="POST" action="">
                                <input type="hidden" id="id" name="id">
                                <div class="form-group">
                                    <label for="validationDefault04">Socios:</label>
                                    <div id="selectsocios">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombres autorizados:</label>
                                    <input type="text" class="form-control" id="txtsocioa" name="txtsocioa">
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                <i class="fa fa-mail-reply"></i> Cerrar</button>
                            <button type="button" class="btn btn-primary btn-sm" id="btnAgregar">
                                <i class="fa fa-user-md"></i> Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cierre modal -->
        </div>
    </div>
</div>



<?php $this->load->view('templates/footer'); ?>
<script src="<?php echo base_url('assets/scripts/autorizado.js'); ?>" type="text/javascript"></script>