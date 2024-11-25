<!-- Cridem a la funció Helper que controla la capçalera per reduir tot el que hi ha de codi repetit -->

<?php headerAdmin($data);?>
<!-- Ara cride a la funcio getModal que està en la carpeta js de Assets-->
<!-- <?php getModal('modalClients', $data) ?> -->

<!-- ara incorpore el div id="contentAjax" per a la funció fntPermisos() ja que el  document.querySelector('#contentAjax').innerHTML = request.responseText ; buscarà aquest apartat -->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fas fa-user-tag" > </i> <?= $data['page_title']; ?>
          <!-- Cree el boto per agregar cli-->
          <button class="btn btn-primary" type="button" onclick="obrimodal();" ><i class="fas fa-plus-circle"></i> Nou</button>
        </h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6 fa-solid fa-users-gear"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url();?>/roles"><?= $data['page_name']; ?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
         
        </div>
      </div>

<!-- Tabla per als tipos de rol-->
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableClients">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Cognoms</th>
                      <th>Email</th>
                      <th>Telèfon</th>
                      <th>Rol</th>
                      <th>Status</th>
                      <th>Accions</th>
                    </tr>
                  </thead>
                  <tbody>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>


    <?php footerAdmin($data); ?>