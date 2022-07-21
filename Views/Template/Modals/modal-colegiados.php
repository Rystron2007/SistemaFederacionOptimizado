<!-- Modal de Colegiados -->
<div class="modal fade" id="modalFormColegiado" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <!--Div que cambia de color segun la accion -->
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Colegiado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="tile">
                    <!-- Propiedades del Colegiado -->
                    <div class="tile-body">
                        <form id="formColegiado" name="formColegiado" class="form-horizontal">
                            <input type="hidden" id="idColegiado" name="idColegiado" value="">
                            <p class="text-primary">Todos los campos son obligatorios.</p>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="txtFederacion">Federación</label>
                                <input type="text" class="form-control" id="txtFederacion" name="txtFederacion"
                                value="" required="">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="listUsuarios">Seleccione un usuario</label>
                                    <select class="form-control" data-live-search="true" id="listUsuarios" name="listUsuarios" required ="">
                                    </select>
                                </div>

                                <div class="form-group col-md-2">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="listStatus">Status</label>
                                    <select class="form-control" id="listStatus" name="listStatus" required="">
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>

                                    </select>
                                </div>
                            </div>



                            <div class="tile-footer">
                                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalViewColegiado" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del Colegiado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Cedula:</td>
              <td id="celCedula">654654654</td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre">Jacob</td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellido">Jacob</td>
            </tr>
            <tr>
              <td>Teléfono:</td>
              <td id="celTelefono">Larry</td>
            </tr>
            <tr>
              <td>Email (Usuario):</td>
              <td id="celEmail">Larry</td>
            </tr>
            <tr>
              <td>Federacion Asociada:</td>
              <td id="celFederacion">Larry</td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado">Larry</td>
            </tr>
            <tr>
              <td>Fecha registro:</td>
              <td id="celFechaRegistro">Larry</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

// EOF
