<?php headerAdmin($data); ?>
<!-- <?php getModal('modalPedidos', $data) ?> -->
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-shopping-cart"></i> <?= $data['page_title'] ?>
            </h1>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tablePedidos">
                            <thead>
                                <tr>
                                    <th>Nº Comanda</th>
                                    <th>Nom</th>
                                    <th>Cognoms</th>
                                    <th>Data</th>
                                    <th>Import</th>
                                    <th>Forma de pagament</th>
                                    <th>Estat</th>
                                   
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


    <canvas class="mt-5" id="myLineChart"></canvas>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/date-fns@2.23.0/dist/date-fns.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@1.1.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@1.0.0"></script>

</main>
<?php footerAdmin($data); ?>
