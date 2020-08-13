<?php $this->load->view('templates/header'); ?>

<div class="container">
    <div class="d-flex flex-row justify-content-center">
        <div class="col-md-6 mt-5">
            <h3><img src="<?php echo base_url('assets/icons/users.ico') ?>" width="30" height="30"> Registro usuario</h3>
            <form action="" method="POST" id="formregistro">
                <div class="form-group">
                    <label for="">Nombres:</label>
                    <input type="text" class="form-control" id="txtnombresr" name="txtnombresr" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" class="form-control" id="txtemailr" name="txtemailr" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="">Contraseña:</label>
                    <input type="password" class="form-control" id="txtpassr" name="txtpassr">
                </div>
                <div class="form-group">
                    <label for="">Repetir contraseña:</label>
                    <input type="password" class="form-control" id="txtrepassr" name="txtrepassr">
                </div>
                <button type="submit" class="btn btn-primary btn-sm" id=btnRegistro>
                    <i class="fa fa-save"></i>
                    Registrar</button>
                <a href="<?php echo base_url('/') ?>" class="btn btn-dark btn-sm">
                    <i class="fa fa-sign-in"></i>
                    Inicio</a>
            </form>
            <!-- Copyright -->
            <div class="footer-copyright text-center py-5">© 2020 Copyright:<br>
                <a href="https://twitter.com/CarlChokSanc"> CarlChoSanc</a>
            </div>
            <!-- Copyright -->
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>

<script src="<?php echo base_url('assets/scripts/registro.js'); ?>" type="text/javascript"></script>