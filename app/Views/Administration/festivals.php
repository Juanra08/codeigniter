<?= $this->extend('Administration/base_layout.php') ?>


<?= $this->section('css') ?>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script src="<?= base_url('assets/Administration/js/menu.js') ?>"></script>
    <script type='text/javascript'>

        $(document).ready(() => {
            var columnsDefinition = [
                {
                    "targets": 0,
                    "render": function (data, type, row, meta) {
                        return row["id"];
                    }
                },
                {
                    "targets": 1,
                    "render": function (data, type, row, meta) {
                        return row["name"];
                    }
                },
                {
                    "targets": 2,
                    "render": function (data, type, row, meta) {
                        return row["date"];
                    }
                },
                {
                    "targets": 3,
                    "render": function (data, type, row, meta) {
                        return '<span class="badge bg-primary">' + row["price"] + '€ </span>';
                    }
                },
                {
                    "targets": 4,
                    "render": function (data, type, row, meta) {
                        return '<button class="btn deleteBtn" type="button" data-toggle="tooltip" data-placement="top" title="Delete">Eliminar</button><button class="btn editBtn" type="button" data-toggle="tooltip" data-placement="top" title="Edit">Editar</button>';
                    }
                }
            ]

            let festivalsDatatable = $('#festivals_datatable').DataTable({
                "processing": true, 
                "responsive": true,
                "serverSide": true,
                "searching": false,
                "columnDefs": columnsDefinition,
                "fnDrawCallback": function (oSettings) {

                    if (oSettings._DisplayLength >= oSettings.fnRecordsTotal())
                        $(oSettings.nTableWrapper).find('.dataTables_paginated').hide();
                    else 
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                },
                "ajax": {
                    url: "<?= route_to('festivals_data') ?>",
                    type: "POST",
                    data: function () {},
                    error: function (data) {
                        console.log(data);
                    }
                }
            })
            $('#festivals_datatable tbody').on('click', '.deleteBtn', function () {

                var data = festivalsDatatable.row($(this).parents('tr')).data();
                console.log(data.id);

                let json = {
                    "id": data.id
                };

                $.ajax({
                    url: "<?= route_to('delete_festival') ?>",
                        type: 'DELETE',
                        data: JSON.stringify(json),
                        processData: false,
                        contentType: false,
                        async: true,
                        timeout: 10000,
                        dataType: 'json',
                        beforeSend: (xhr) => {},
                        success: (response) => {
                            if (response.status == 'OK') {
                                $("#festivals_datatable").DataTable().ajax.reload(null, false);
                            } else {
                                alert('Se ha producido un error');
                            }
                        },
                        error: (xhr, status, error) => {
                            alert('Se ha producido un error');
                        },
                })

            });

            //Nuevo festival

            $(".new-festival-btn").click(function() {
                window.location.href = "<?=route_to("festivals_view_edit")?>"
            });

            //Editar festival

            $('#festivals_datatable tbody').on('click', '.editBtn', function(){
                var data = festivalsDatatable.row($(this).parents('tr')).data();

                window.location.href = "<?= route_to('festivals_view_edit')?>/"+data.id;
            });

        });

        

    </script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!--Container Main start-->
        <h4>Festivals</h4>

        <button class="btn new-festival-btn" type="button" data-toggle="tooltip" data-placement="top" title="New">Nuevo Festival</button>

        <table id="festivals_datatable" class="display" style="width: 100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
<?= $this->endSection() ?>