<?= $this->extend('base')?>

<?= $this->section('css')?>

<?= $this->endSection()?>

<?= $this->section('javascript')?>
    <script>
        $(document).ready(function() {

            $('#ajax').click(function(){
                $.ajax({
                    url: "<?= route_to('prueba_ajax')?>",
                    type: "GET",
                    async: true,
                    timeout: 5000,
                    beforeSend:(xhr) => {},
                    success: (response) => {
                        console.log(response)
                    },
                    error: (xhr,status,erro) => {
                        alert("Ha fallado")
                    },
                    complete: () => {

                    }
                });
            });
        });
        

    </script>
<?= $this->endSection()?>


<?= $this->section('content')?>

    <button id="ajax">Enviar</button>
    
<?= $this->endSection()?>