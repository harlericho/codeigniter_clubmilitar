<?php $this->load->view('templates/header'); ?>

<div class="container">
    <div class="d-flex flex-row justify-content-center">
        <div class="col-md-6 mt-5">
            <h3><img src="<?php echo base_url('assets/icons/login.ico')?>" width="30" height="30"> Iniciar Seccion</h3>
            <form action="" method="POST" id="formlogin">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email:</label>
                    <input type="email" class="form-control" autofocus id="txtemail" name="txtemail" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña:</label>
                    <input type="password" class="form-control" id="txtpass" name="txtpass">
                </div>
                <button type="submit" class="btn btn-primary btn-sm" id="btnIniciar">
                <i class="fa fa-sign-in"></i>
                Iniciar</button>
                <a href="<?php echo base_url('registro')?>" class="btn btn-dark btn-sm">
                <i class="fa fa-user"></i>
                Registro</a>
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
<script src="<?php echo base_url('assets/scripts/login.js'); ?>" type="text/javascript"></script>