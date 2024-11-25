<?php headerAdmin($data); ?>
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
                                    <th>Nom del Producte</th>
                                    <th>Quantitat</th>
                                    <th>Preu Unitari</th>
                                    <th>Subtotal</th>

                                   
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


    <canvas id="myPieChart"></canvas>

</main>




<script type="text/javascript" src="<?= media(); ?>/js/plugins/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<?php footerAdmin($data); ?>
