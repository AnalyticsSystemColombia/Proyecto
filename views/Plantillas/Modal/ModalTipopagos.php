
<div class="modal fade" id="ModalTipopagos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Tipo de pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">
              <div class="tile-body">
                <form id="formTipopago" name="formTipopago">
                  <input type="hidden" id="idtipopago" name="idtipopago" value="">
                  <div class="form-group">
                    <label for="control-label">Tipo pago</label>
                    <input class="form-control" id="txtroleNomb" name="txtroleNomb" type="text"  placeholder="Nombre del rol" required=""/>
                  </div>
                  <div class="form-group">
                    <label for="eje">Estado</label>
                    <select class="form-control" id="listStatus" name="listStatus" required="">
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>
                    </select>
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
  </div>
</div>


