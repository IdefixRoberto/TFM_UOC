<div class="modal fade" id="modalFormCategoria" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nova categoria</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCategoria" name="formCategoria">
                    <input type="hidden" id="idCategoria" name="idCategoria" value="">
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre de la categoría" required="">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descripció</label>
                        <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="3" placeholder="Descripción"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Estat</label>
                        <select class="form-control" id="listStatus" name="listStatus" required="">
                            <option value="1">Actiu</option>
                            <option value="2">Inactiu</option>
                        </select>
                    </div>
                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-primary" type="submit"><span id="btnText">Guardar</span></button>
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal per afegir/editar categories -->
<div class="modal fade" id="modalFormCategoria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nova Categoria</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCategoria" name="formCategoria" class="form-horizontal">
          <input type="hidden" id="idCategoria" name="idCategoria" value="">
          <p class="text-primary">Tots els camps són obligatoris.</p>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtNombre">Nom de la Categoria</label>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" required="">
              <small class="text-danger" id="nombreError"></small>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="txtDescripcion">Descripció</label>
              <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="3" required=""></textarea>
              <small class="text-danger" id="descripcionError"></small>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="listStatus">Estat</label>
              <select class="form-control" id="listStatus" name="listStatus" required>
                <option value="1">Actiu</option>
                <option value="2">Inactiu</option>
              </select>
              <small class="text-danger" id="statusError">Es necessari seleccionar un dels dos estats</small>
            </div>
          </div>

          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" type="submit" disabled>
              <i class="fa fa-fw fa-lg fa-check-circle"></i>
              <span id="btnText">Guardar</span>
            </button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
              <i class="fa fa-fw fa-lg fa-times-circle"></i>Tancar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal per a visualitzar les dades de la categoria en format taula -->
<div class="modal fade" id="modalViewCategoria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Detall de la Categoria</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td><strong>Nom</strong></td>
              <td id="celNombre"></td>
            </tr>
            <tr>
              <td><strong>Descripció</strong></td>
              <td id="celDescripcion"></td>
            </tr>
            <tr>
              <td><strong>Estat</strong></td>
              <td id="celStatus"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
          <i class="fa fa-fw fa-lg fa-times-circle"></i>Tancar
        </button>
      </div>
    </div>
  </div>
</div>

