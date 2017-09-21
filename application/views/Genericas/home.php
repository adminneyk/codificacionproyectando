<h2>PROYECTANDO</h2>
<?php
$this->load->view('Genericas/mensajes');
?>

<?php
if (!empty($listanotificaciones)) {
    ?>
    <div class="panel panel-primary"> 
        <div class="panel-heading"> 
            <h3 class="panel-title">Notificaciones</h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <?php
                foreach ($listanotificaciones->result() as $notificacion) {
                    ?>
                    <button type="button" class="list-group-item"><?= $notificacion->mensaje; ?></button>
                    <?php
                }
                ?>
            </div>
        </div> 
    </div>
    <?php
}
?>

<?php
if (!empty($listarevision)) {
    ?>
    <div class="panel panel-primary"> 
        <div class="panel-heading"> 
            <h3 class="panel-title">Revisiones Pendientes</h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
                <?php
                foreach ($listarevision->result() as $revision) {
                    ?>
                    <a href="<?= base_url() ?>banco/bancoIdeas/<?= $revision->id_grupo; ?>" class="list-group-item">Tiene Ideas Para Validar del Grupo <strong><?= $revision->id_grupo; ?></strong></a>
                    <?php
                }
                ?>
            </div>
        </div> 
    </div>
    <?php
}
?>
<?php
if (!empty($devueltos)) {
    ?>
    <div class="panel panel-primary"> 
        <div class="panel-heading"> 
            <h3 class="panel-title">Devoluciones</h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
    <?php
    foreach ($devueltos->result() as $notificacion) {
        ?>
                    <a href="<?= base_url() ?>ideas/gestionVersion/<?= $notificacion->id_idea; ?>/<?= $notificacion->id_entregable; ?>/<?= $notificacion->id_version; ?>" class="list-group-item">Fue Devuelta una Version Generada </a>
                    <?php
                }
                ?>
            </div>
        </div> 
    </div>
    <?php
}
if (!empty($pendientesrevision)) {
    ?>
    <div class="panel panel-primary"> 
        <div class="panel-heading"> 
            <h3 class="panel-title">Notificaciones</h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
    <?php
    foreach ($pendientesrevision->result() as $pendiente) {
        ?>
                <a href="<?= base_url() ?>revision/misPendientes/<?= $pendiente->grupo; ?>" class="list-group-item">Tiene Versiones Pendientes por Revisar en el Grupo <strong><?= $pendiente->grupo; ?></strong> </a>
                    <?php
                }
                ?>
            </div>
        </div> 
    </div>
                <?php
            }
            ?>
<hr>
<fieldset>
    <legend>¿Tiene una Idea ?</legend>
    Si usted tiene una idea para ser utilizada le recomendamos  agregar una nueva idea a nuestro banco de ideas <br><br>
<a href="<?= base_url() ?>ideas/registrobanco" class="btn btn-warning">REGISTRAR UNA IDEA PARA EL BANCO</a>
</fieldset>

<hr>
  