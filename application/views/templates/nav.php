<nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo base_url('principal') ?>"><img src="assets/icons/icono.ico" width="30" height="30"> Club Militar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('socio') ?>">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('addsocio') ?>">Socio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('addautorizado') ?>" tabindex="-1" aria-disabled="true">Autorizados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('consumo') ?>" tabindex="-1" aria-disabled="true">Consumo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('facturas') ?>" tabindex="-1" aria-disabled="true">Facturas</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Admin</button>
            <a href="<?php echo base_url('login/salir') ?>" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Salir</a>
        </form>
    </div>
</nav>