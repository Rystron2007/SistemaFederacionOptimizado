<!-- Modal de Roles -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--Div que cambia de color segun la accion -->
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="tile">
                    <!-- Propiedades del Rol -->
                    <div class="tile-body">
                        <form id="formRol" name="formRol">
                            <input type="hidden" id="id_rol" name="id_rol" value="">
                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input class="form-control" id="txtNombre" name="txtNombre" type="text"
                                    placeholder="Nombre del Rol" required="" value="">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Descripción</label>
                                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="4"
                                    placeholder="Descripción del Rol" required="" value=""></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelect1">Estado</label>
                                <select class="form-control" id="listStatus" name="listStatus" required="">
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>

                                </select>
                            </div>

                            <div class="tile-footer">
                                <button id="btnActionForm" class="btn btn-success" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Registrar</span>
                                </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="#" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

// EOF
