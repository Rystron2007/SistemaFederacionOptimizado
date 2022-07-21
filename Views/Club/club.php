<?php

header_admin($data);
get_modal('modalClub', $data);

?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-user-tag"></i> <?=$data['page_title']?>
                    <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo Club </button>
                </h1>
                <p>Administración del Modulo de Club para poder conocer la funcionabilidad de los componentes
                    ubique el mouse sobre cada uno.
                </p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="<?=base_url()?>club"><?=$data['page_title']?></a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="tableClub">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Asociación</th>
                                    <th>Teléfono</th>
                                    <th>Presidente</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

<?php 

footer_admin($data);

// EOF