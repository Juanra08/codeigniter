<?= $this->extend('Administration/base_layout.php') ?>


<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $('#new').on("submit",function(event){

    event.preventDefault();

    let data = new FormData(this);

    $.ajax({
        url: "<?= route_to('festivals_save') ?>",
            type: "POST",
            data: data,
            processData: false,
            contentType: false, 
            async: true,
            timeout: 100000,
            dataType: 'json',
            beforeSend: (xhr) => {},
            success: (response) => {

            $(this).trigger("reset");
            
            if (response.status == 'OK') {
                window.history.back();
            } else if (response.status == 'KO') {
                alert("Se ha producido un error")
            }

            },
            error:(xhr,status,error) => {
            alert("No va");
            },
            complete: () => {}
    });

})

</script>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!--Container Main start-->
    <div >
        <h4><?= $title ?></h4>        
    </div>

    <form id="new">
        <div class="row">
            <div class="col">
                <label for="formGroupExampleInput">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" value="<?= $festival->name?>">
            </div>
            <div class="col">
                <label for="formGroupExampleInput">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="<?= $festival->email?>">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="formGroupExampleInput">Fecha</label>
                <input type="date" id="date" name="date" class="form-control" placeholder="Fecha" value="<?= $festival->date?>">
            </div>
            <div class="col">
                <label for="formGroupExampleInput">Precio</label>
                <input type="text" id="price" name="price" class="form-control" placeholder="Precio" value="<?= $festival->price?>">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="formGroupExampleInput">Dirección</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Dirección" value="<?= $festival->address?>">
            </div>
            <div class="col">
                <label for="formGroupExampleInput">Imagen</label>
                <input type="text" id="image_url" name="image_url" class="form-control" placeholder="Imagen" value="<?= $festival->image_url?>">
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <select class="from-select" name="categori_id">
                    <?php foreach($categories as $cat): ?>
                        <option value="<?= $cat->id ?>" <?php if($cat->id == $festival->category_id):?> selected <?php endif?> >
                            <?= $cat->name ?>
                        </option>
                    <?php endforeach ?>
                </select>    
            </div>
        </div>

        <input style="display:none" id="id" name="id" type="text" class="form-control" value="<?= $festival->id?>">

        <button type="submit" class="fadeIn fourth" >Guardar</button>

    </form>
<?= $this->endSection() ?>