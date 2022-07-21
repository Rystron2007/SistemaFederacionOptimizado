<div class="modal fade modalPermisos" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title h4">Permisos Roles de Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
            <?php 
            //dep($data);
            ?>
                <div class="col-md-12">
                    <div class="tile">

                        <form action="" id="formPermisos" name="formPermisos">
                        <input type="hidden" id="id_rol" name="id_rol" value="<?= $data['id_rol'];?>" required="">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Módulo</th>
                                        <th>Leer</th>
                                        <th>Escribir</th>
                                        <th>Actualizar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $no=1;
                                    $modulos = $data['modulos'];
                                    for ($i=0; $i <count($modulos) ; $i++) { 
                                        $permisos = $modulos[$i]['permisos'];
                                        $readCheck = $permisos['read'] == 1 ? " checked " : "";
                                        $writeCheck = $permisos['write'] == 1 ? " checked " : "";
                                        $updateCheck = $permisos['update'] == 1 ? " checked " : "";
                                        $deleteCheck = $permisos['delete'] == 1 ? " checked " : "";

                                        $idmodulo = $modulos[$i]['id_modulo'];
                                    
                                ?>
                                    <tr>
                                        <td>
                                        <?= $no;?>
                                        <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmodulo ?>" required="">
                                        </td>
                                        <td>
                                            <?= $modulos[$i]['titulo_modulo']?>
                                        </td>
                                        <td>
                                        <div class="toggle-flip">
                                                <label>
                                                    <input type="checkbox" name="modulos[<?= $i;?>][read]" <?= $readCheck;?>><span class="flip-indecator"
                                                        data-toggle-on="ON" data-toggle-off="OFF"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="toggle-flip">
                                                <label>
                                                    <input type="checkbox" name="modulos[<?= $i;?>][write]" <?= $writeCheck;?> ><span class="flip-indecator"
                                                        data-toggle-on="ON" data-toggle-off="OFF"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="toggle-flip">
                                                <label>
                                                    <input type="checkbox" name="modulos[<?= $i;?>][update]"<?= $updateCheck;?>><span class="flip-indecator"
                                                        data-toggle-on="ON" data-toggle-off="OFF"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="toggle-flip">
                                                <label>
                                                    <input type="checkbox" name="modulos[<?= $i;?>][delete]" <?= $deleteCheck?>><span class="flip-indecator"
                                                        data-toggle-on="ON" data-toggle-off="OFF"></span>
                                                </label>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <?php 
                                        $no++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                                <button class="btn btn-success" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">
                                <i class="app-menu__icon fas fa-sign-out-alt" aria-hidden="true"></i>
                                Salir </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

// EOF