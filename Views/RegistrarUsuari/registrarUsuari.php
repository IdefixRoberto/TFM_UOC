 <!-- Pàgina Inici -->
 <?php headerInici($data); ?>
    <!-- Main del cos-->
    <main>
           <!-- Modal -->
<div >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class=" headerRegister">
        <h5 class="titolNouUsuari" id="titolNouUsuari">Nou Usuari</h5>

      </div>
      <div class="modal-body gris">
        <form id="formUsuario" name="formUsuario" class="form-horizontal">
          <input type="hidden" id="idUsuario" name="idUsuario" value="">
          <p class="white">Tots els camps són obligatoris.</p>

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
              <label for="txtPassword">Password</label>
              <input type="password" class="form-control" id="txtPassword" name="txtPassword">
              <small class="none" id="passwordError"></small>
            </div>
          </div>
          </div>
          <div class="tile-footer gris">
            <button id="btnActionForm" class="btn btn-light" type="submit" disabled>
              <i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span>
            </button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>


    </main>

    <!-- Peu de pàgina -->
<?php footerInici($data); ?>