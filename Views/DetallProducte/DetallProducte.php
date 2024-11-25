    <!-- Pàgina Inici -->
    <?php headerInici($data); ?>
    
    <main>


    <div class="container mt-5 m-b-5">
        <div class="row">
            <div class="col-md-6">
                <img src="http://localhost/TFM/img/jocs/<?= $data['product']['imagen']; ?>.webp" class="img-fluid" alt="<?= $data['product']['nomproducte']; ?>">
            </div>
            <div class="col-md-6">
                <h1 class="text-center mt-5"><?= $data['product']['nomproducte']; ?></h1>
                <p class="precio text-center mb-3"><?= number_format($data['product']['precio'], 2, ',', '.'); ?>€</p>
                <div class="mt-5 d-flex align-items-center m-auto justify-content-center text-center">
                    <div class="text-center mx-3">
                        <i class="fa-solid fa-users"></i>
                        <p><?= $data['product']['jugadores']; ?></p>
                    </div>
                    <div class="text-center mx-3">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <p><?= $data['product']['tempsDeJoc']; ?> min</p>
                    </div>
                    <div class="text-center mx-3">
                        <i class="fa-solid fa-cake-candles"></i>
                        <p><?= $data['product']['edat']; ?>+</p>
                    </div>
                    <div class="text-center mx-3">
                        <i class="fa-solid fa-brain"></i>
                        <p><?= $data['product']['dificultat']; ?></p>
                    </div>
                </div>
                <h2 class="text-center mb-3">Descripció</h2>
                <div class="detallDrescripcio">
                    <p class="paddingDetalls"><?= $data['product']['descripcion']; ?></p>
                </div>
                
                <div class="align-items-center m-auto justify-content-center text-center">
                <button  class="p-2 mt-2 add-to-cart btn btn-danger" data-producte="<?= $data['product']['idproducto']; ?>">Comprar</button>                </div>
            </div>
        </div>
    </div>

    </main>
    <!-- Peu de pàgina -->
    <?php footerInici($data); ?>