<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <?php
        if (in_array('perfiles', $this->session->userdata('permisos')) == true) {
            ?>
            <li class="active">
                <a href="<?= base_url() ?>perfiles">Perfiles</a>
            </li>
            <?php
        }
        ?>
        <?php
        if (in_array('usuarios', $this->session->userdata('permisos')) == true) {
            ?>
            <li class="active">
                <a href="<?= base_url() ?>usuarios">Usuarios</a>
            </li>
    <?php
}
?>
        <?php
        if (in_array('ideas', $this->session->userdata('permisos')) == true) {
            ?>
            <li class="active">
                <a href="<?= base_url() ?>ideas">Ideas</a>
            </li>
    <?php
}
?>
        <?php
        if (in_array('reportes', $this->session->userdata('permisos')) == true) {
            ?>
            <li class="active">
                <a href="<?= base_url() ?>reportes">Reportes</a>
            </li>
            <?php
        }
        ?>
        <?php
        if (in_array('parametrizacion', $this->session->userdata('permisos')) == true) {
            ?>
            <li class="active">
                <a href="<?= base_url() ?>parametrizacion">Parametrización</a>
            </li>
            <?php
        }
        ?>
        <?php
        if (in_array('revision', $this->session->userdata('permisos')) == true) {
            ?>
            <li class="active">
                <a href="<?= base_url() ?>revision">Revision de Entregable</a>
            </li>
            <?php
        }
        ?>    
            


        <li>
            <a href="#">Link</a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">asdsa<strong class="caret"></strong></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#">Action</a>
                </li>
                <li>
                    <a href="#">Another action</a>
                </li>
                <li>
                    <a href="#">Something else here</a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="#">Separated link</a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="#">One more separated link</a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="#">Link</a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('nombre_perfil') ?><strong class="caret"></strong></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#">Action</a>
                </li>
                <li>
                    <a href="#">Another action</a>
                </li>
                <li>
                    <a href="#">Something else here</a>
                </li>
                <li class="divider">
                </li>
                <li>
                    <a href="<?= base_url() ?>login/logout">Cerrar Sesion</a>
                </li>
            </ul>
        </li>
    </ul>
</div>

</nav>
<div class="jumbotron">