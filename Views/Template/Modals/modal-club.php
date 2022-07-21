<!-- Modal de Colegiados -->
<div class="modal fade" id="modalFormClub" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <form id="formClub" name="formClub" class="form-horizontal">
                            <input type="hidden" id="idClub" name="idClub" value="">
                            <p class="text-primary">Todos los campos son obligatorios.</p>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="txtCodigoClub">Codigo Club</label>
                                    <input type="text" class="form-control" id="txtCodigoClub" name="txtCodigoClub"
                                           value="" required="">
                                </div>
                                <div class="form-group col-md-1"></div>
                                <div class="form-group col-md-7">
                                    <label for="txtNombre">Nombre Club</label>
                                    <input type="text" class="form-control" id="txtNombre" name="txtNombre"
                                           value="" required="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="txtFederacion">Asociación De Futbol</label>
                                    <input type="text" class="form-control" id="txtFederacion" name="txtFederacion"
                                           value="" required="">
                                </div>
                                <div class="form-group col-md-1"></div>
                                <div class="form-group col-md-6">
                                    <label for="txtEmail">Correo Institucional</label>
                                    <input type="text" class="form-control" id="txtEmail" name="txtEmail"
                                           value="" required="">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <label for="txtDireccion">Dirección Institucional Club</label>
                                    <input type="text" class="form-control" id="txtDireccion" name="txtDireccion"
                                           value="" required="">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="selectDate">Fecha de Fundación:</label>
                                    <input type="date" id="selectDate" name="selectDate"
                                           value="1990-01-01"
                                           min="1900-01-01" max="2020-12-31">
                                </div>
                                <div class="form-group col-md-1"></div>
                                <div class="form-group col-md-7">
                                    <label for="txtPresidente">Presidente del Club</label>
                                    <input type="text" class="form-control" id="txtPresidente" name="txtPresidente"
                                           value="" required="">
                                </div>
                            </div>

                            <div class="form-row">

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
<div class="modal fade" id="modalViewClub" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Datos del Club</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>Código Club:</td>
                        <td id="celCodigo">654654654</td>
                    </tr>
                    <tr>
                        <td>Nombre del Club:</td>
                        <td id="celNombre">Jacob</td>
                    </tr>
                    <tr>
                        <td>Federación:</td>
                        <td id="celFederacion">Jacob</td>
                    </tr>
                    <tr>
                        <td>Email Institucional:</td>
                        <td id="celEmail">Larry</td>
                    </tr>
                    <tr>
                        <td>Dirección Institucional:</td>
                        <td id="celDireccion">Larry</td>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td id="celEstado">Larry</td>
                    </tr>
                    <tr>
                        <td>Fecha Fundación:</td>
                        <td id="celFechaFundacion">Larry</td>
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

