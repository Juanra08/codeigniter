<?= $this->extend('Administration/base_layout.php') ?>


<?= $this->section('css') ?>
    <link rel="stylesheet" href="<?= base_url('assets/Administration/css/home.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/Administration/css/menu.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Categories</h4>
        <table id="categories_datatable" class="display" style="width: 100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>   
<?= $this->endSection() ?>