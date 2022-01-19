
<div class="modal fade" id="modalUsuarios" name="modalUsuarios" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <form id="formUsuarios" name="formUsuarios">
            <input type="hidden" id="idUsuario" name="idUsuario" class="form-horizontal" value="">
            <p class="text-primary">Todos los campos son obligatorios.</p>
             
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtIdentificacion">Identificación</label>
                     <input type="text" class="form-control valid validNumber" id="txtIdentificacion" name="txtIdentificacion" required="">
                 </div>
             </div>

             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtNombre">Nombre</label>
                     <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="txtApellido">Apellidos</label>
                     <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" required="">
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtTelefono">Teléfono</label>
                     <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
                 </div>
                 <div class="form-group col-md-6">
                     <label for="txtEmail">Email</label>
                     <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" required="">
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="listRolid">Tipo usuarios</label>
                     <select class="form-control" data-live-search="true"  id="listRolid"  name="listRolid"  required> 
                     </select>
                 </div>
                 <div class="form-group col-md-6">
                     <label for="listStatus">Status</label>
                     <select class="form-control" class="selectpicker" data-style="btn-success"  id="listStatus" name="listStatus" required>
                         <option value="1">Activo</option>
                         <option value="2">Inactivo</option>
                     </select>
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                     <label for="txtPassword">Password</label>
                     <input type="password" class="form-control" id="txtPassword" name="txtPassword">
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



<div class="modal fade" id="modalViewUser"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Datos del usuario</h5>
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
                <td>Tipo usuario</td>
                <td id=celTipoUsuario></td>
            </tr>
            <tr>
                <td>Estado</td>
                <td id=celEstado></td>
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