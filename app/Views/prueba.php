<?= $this->extend('base')?>

<?= $this->section('css')?>

<?= $this->endSection()?>

<?= $this->section('javascript')?>

<?= $this->endSection()?>


<?= $this->section('content')?>

<?php foreach($numeros as $n): ?>
        <p><?= $n?></p>
    <?php endforeach?>
    
<a href="<?= route_to("contacto_page")?>">Ir a contacto</a>

<?= $this->include("mensaje_error")?>

<?= $this->endSection()?>