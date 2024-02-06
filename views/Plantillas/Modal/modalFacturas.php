
<div class="modal fade" id="modalFacturas" name="modalFacturas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Factura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <form id="formFacturas" name="formFacturas">
            <input type="hidden" id="idfactura" name="idfactura" class="form-horizontal" value="">
            <p class="text-primary">Todos los campos son obligatorios.</p>
             
            <div class="form-row">
            <div class="form-group col-md-6">
                     <label for="provCodi">Empresa</label>
                     <select class="form-control" data-live-search="true"  id="provCodi"  name="provCodi"  required> 
                     </select>
                 </div>
                 <div class="form-group col-md-6">
                     <label for="txtprovNombEmpr">Número Factura</label>
                     <input type="text" class="form-control" id="txtprovNumeFact" name="txtprovNumeFact" required="">
                 </div>
             </div>
             
             <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="txtprovValoFact">Valor Factura</label>
                        <input type="text" class="form-control" id="txtprovValoFact" name="txtprovValoFact" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="listStatus">Status</label>
                        <select class="form-control" class="selectpicker" data-style="btn-success"  id="listStatus" name="listStatus" required>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
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



<div class="modal fade" id="ModalViewFacturas"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header primary" style="background-color:#009688">
        <h5 class="modal-title" id="titleModal">Datos de la Factura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
       <table class="table table-bordered">
        <tbody>
            <tr>
                <td>N Proveedor</td>
                <td id=provNombre></td>
            </tr>
            <tr>
               <td>Código</td>
                <td id=provCodigo></td>
            </tr>
            <tr>
                <td>Número</td>
                <td id=provNumero></td>
            </tr>
            <tr>
                <td>Valor</td>
                <td id=provValor></td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td id=provFecha></td>
            </tr>
            <tr>
                <td>Estado</td>
                <td id=provEstado></td>
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