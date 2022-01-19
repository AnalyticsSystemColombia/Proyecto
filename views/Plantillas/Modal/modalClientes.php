

<div class="modal fade" id="modalClientes" name="modalClientes" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <form id="formCliente" name="formCliente">
            <input type="hidden" id="idUsuario" name="idUsuario" class="form-horizontal" value="">
            <p class="text-primary">Los campos con asterisco <span class="required">(*<span>)son obligatorios.</p>
             <div class="form-row">
                 <div class="form-group col-md-4">
                     <label for="txtIdentificacion">Identificación<span class="required">*<span></label>
                     <input type="text" class="form-control valid validNumber" id="txtIdentificacion" name="txtIdentificacion" required="">
                 </div>
                 <div class="form-group col-md-4">
                     <label for="txtNombre">Nombre<span class="required">*<span></label>
                     <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
                 </div>
                 <div class="form-group col-md-4">
                     <label for="txtApellido">Apellidos<span class="required">*<span></label>
                     <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" required="">
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-4">
                     <label for="txtTelefono">Teléfono<span class="required">*<span></label>
                     <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
                 </div>
                 <div class="form-group col-md-4">
                     <label for="txtEmail">Email<span class="required">*<span></label>
                     <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" required="">
                 </div>
                 <div class="form-group col-md-4">
                     <label for="txtPassword">Password</label>
                     <input type="password" class="form-control" id="txtPassword" name="txtPassword">
                 </div>
             </div>
             <hr>
             <p class="text-primary">Datos fiscales.</p>
             <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Identificación Tributaria<span class="required">*<span></label>
                  <input class="form-control" type="text" id="txtNit" name="txtNit" required="">
                </div>
                <div class="form-group col-md-6">
                  <label>Nombre fiscal<span class="required">*<span></label>
                  <input class="form-control" type="text" id="txtNombreFiscal" name="txtNombreFiscal" required="">
                </div>
                <div class="form-group col-md-12">
                  <label>Dirección fiscal<span class="required">*<span></label>
                  <input class="form-control" type="text" id="txtDirFiscal" name="txtDirFiscal" required="">
                </div>
             </div>
            <div class="tile-footer">
            <button class="btn btn-primary" id="btnActionForm" type="submit">
                <span id="btnText">Guardar</span>
            </button>
            <button class="btn btn-secondary" data-dismiss="modal" type="submit">Cancelar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalViewCliente" name="modalViewCliente"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
              <h5 class="modal-title" id="titleModal">Datos del cliente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">  
              <table class="table table-bordered">
                <tbody class="table-responsive-x">
                    <tr>
                        <td>Identificacion</td>
                        <td id=celIdentificacion></td>
                    </tr>
                    <tr>
                      <td>Nombres</td>
                        <td id=celNombre></td>
                    </tr>
                    <tr>
                        <td>Apellidos</td>
                        <td id=celApellido></td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td id=celTelefono></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td id=celEmail></td>
                    </tr>
                    <tr>
                        <td>Identificacion tributaria</td>
                        <td id=celIdent></td>
                    </tr>
                    <tr>
                        <td>Nombre fiscal</td>
                        <td id=celNombreFiscal></td>
                    </tr>
                    <tr>
                        <td>Dirección fiscal</td>
                        <td id=celDirfiscal></td>
                    </tr>
                    <tr>
                        <td>Fech registro</td>
                        <td id=celFechaRegistro></td>
                    </tr>
                </tbody>
              </table>
            </div>
        <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal" type="button">Cerrar</button>
      </div>
      </div>
    </div>
</div>
