<?php headerAdmin($data); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-lock"></i> <?= $data['page_title']; ?></h1>
        </div>
    </div>

    <!-- Taula de permisos -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tablePermisos">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Cognoms</th>
                                    <th>Rol</th>
                                    <th>Lectura</th>
                                    <th>Escriptura</th>
                                    <th>Esborrar</th>
                                    <th>Actualitzar</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>
