
<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nou Rol</h5>
        <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tile">
            <div class="tile-body">
              <form id="formRol" name="formRol">
                <input type="hidden" id="idRol" name="idRol" value="">
                <div class="form-group">
                  <label class="control-label">Nom</label>
                  <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nom del rol" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Descripció</label>
                  <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripció del rol" required=""></textarea>
                </div>
                <div class="form-group">
                    <label >Estat</label>
                    <select class="form-control" id="listStatus" name="listStatus" required="">
                      <option value="1">Actiu</option>
                      <option value="2">Inactiu</option>
                    </select>
                </div>
                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-secondary" disabled = true type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="#" data-bs-dismiss="modal" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel·lar</a>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

