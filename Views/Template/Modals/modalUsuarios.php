
<!-- Modal -->
<div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nou Usuari</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUsuario" name="formUsuario" class="form-horizontal">
          <input type="hidden" id="idUsuario" name="idUsuario" value="">
          <p class="text-primary">Tots els camps són obligatoris.</p>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtIdentificacion">Identificació</label>
              <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" required="" placeholder="Introduisca el seu NIF, NIE o DNI">
              <small class="" id="identificacionError"></small>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtNombre">Nom</label>
              <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="" placeholder="Ex: John">
              <small class="" id="nombreError"></small>
            </div>
            <div class="form-group col-md-6">
              <label for="txtApellido">Cognom</label>
              <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" required="" placeholder="Ex: Doe">
              <small class="none" id="apellidoError"></small>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtTelefono">Telèfon</label>
              <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" required="" placeholder="Ex: 612345678">
              <small class="none" id="telefonoError"></small>
            </div>
            <div class="form-group col-md-6">
              <label for="txtEmail">Email</label>
              <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" required="" placeholder="Ex: correu@example.com">
              <small class="none" id="emailError"></small>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="listRolid">Tipus usuari</label>
              <select class="form-control" id="listRolid" name="listRolid" required>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="listStatus">Estat</label>
              <select class="form-control" id="listStatus" name="listStatus" required>
                <option value="1">Actiu</option>
                <option value="2">Inactiu</option>
              </select>
              <small class="none" id="statusError"></small>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtPassword">Password</label>
              <input type="password" class="form-control" id="txtPassword" name="txtPassword">
            </div>
          </div>
          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-light" type="submit" disabled>
              <i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span>
            </button>
            &nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
              <i class="fa fa-fw fa-lg fa-times-circle"></i>Tancar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Modal per a visualitzar les dades en format tabla -->
<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Dades dels usuaris</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td><strong>Identificació</strong></td>
                  <td id="celIdentificacion"></td>
                </tr>
                <tr>
                  <td><strong>Nom</strong></td>
                  <td id="celNombre"></td>
                </tr>
                <tr>
                  <td><strong>Cognom</strong></td>
                  <td id="celApellido"></td>
                </tr>
                <tr>
                  <td><strong>Telèfon</strong></td>
                  <td id="celTelefono"></td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td id="celEmail"></td>
                </tr>
                <tr>
                  <td><strong>Tipus usuari</strong></td>
                  <td id="celRol"></td>
                </tr>
                <tr>
                  <td><strong>Estat</strong></td>
                  <td id="celStatus"></td>
                </tr>
              </tbody>
              
            </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Tancar</button>
      </div>
    </div>
  </div>
</div>
