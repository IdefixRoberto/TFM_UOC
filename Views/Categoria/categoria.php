<?php headerAdmin($data);?>
<?php getModal('modalCategoria', $data); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title']; ?>
                <button class="btn btn-primary" type="button" onclick="obrimodal();"><i class="fas fa-plus-circle"></i> Nova categoria</button>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6 fa-solid fa-users-gear"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url();?>/categoria"><?= $data['page_name']; ?></a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableCategoria">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Descripció</th>
                                    <th>Data creació</th>
                                    <th>Estat</th>
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
<script src="<?= media(); ?>/js/functions_categoria.js"></script>