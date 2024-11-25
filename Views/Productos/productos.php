<?php headerAdmin($data); ?> <!-- Capçalera comuna -->
<?php getModal('modalProducto', $data) ?>
<!-- ara incorpore el div id="contentAjax" per a la funció fntPermisos() ja que el  document.querySelector('#contentAjax').innerHTML = request.responseText ; buscarà aquest apartat -->
<div id="contentAjax"></div> 
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fas fa-box"></i> <?= $data['page_title']; ?>
        <button class="btn btn-primary" type="button" onclick="obrimodal();">
          <i class="fas fa-plus-circle"></i> Nou Producte
        </button>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fas fa-box"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/productos"><?= $data['page_title']; ?></a></li>
    </ul>
  </div>

  <!-- Aquí col·loquem la taula de productes -->
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableProductos">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Categoria</th>
                  <th>Imatge</th>
                  <th>Stock</th>
                  <th>Ampliar dades</th>
                </tr>
              </thead>
              <tbody>
                <!-- Les dades es carreguen mitjançant AJAX -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?> <!-- Peu de pàgina comú -->
