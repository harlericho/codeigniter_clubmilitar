<?php $this->load->view('templates/header'); ?>

<?php $this->load->view('templates/nav'); ?>

<div class="container">
    <div class="d-flex flex-row justify-content-center">
        <div class="col-md-6 mt-5">
            <img src="<?php echo base_url('assets/images/logo.png') ?>">
            <div class="d-flex flex-row justify-content-center">
                <h1 class="display-4">TIPOS DE SOCIOS</h1>
            </div>
            <div class="d-flex flex-row justify-content-center">
                <table>
                    <tr>
                        <td> <img src="<?php echo base_url('assets/images/star.png') ?>" width="200"></td>
                        <td>
                            <h3>
                                VIP:
                                <small class="text-muted">Aportación máxima: $5.000.000.00</small>
                            </h3>
                            <h4>
                                REGULAR:
                                <small class="text-muted">Aportación máxima: $1.000.000.00</small>
                            </h4>
                        </td>
                    </tr>
                </table>
            </div>
            <blockquote class="blockquote text-center">
                <p class="mb-0">Club militar exclusivo para nuestro personal de la fuerzas armadas y clientes particulares.</p>
                <footer class="blockquote-footer">Sistema realizado por: <cite title="Source Title">Carlos Choca Sánchez</cite></footer>
            </blockquote>


        </div>
    </div>
</div>









<?php $this->load->view('templates/footer'); ?>