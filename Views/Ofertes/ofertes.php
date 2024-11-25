    <!-- Pàgina Inici -->
    <?php headerInici($data); ?>

    <main>

        <!-- Secció de jocs  -->
        <div class="container my-5">
            <div class="row">
                <?php  foreach ($data['products'] as $product): ?>
                    <div class="col-md-4">
                    
                        <div class="card mb-5 position-relative">
                            <?php if ($product['oferta'] == 1): ?>
                                <div class="alert alert-success oferta-label position-absolute">Oferta</div>
                            <?php endif; ?>
                            <!-- Imatge del producte, assumint que totes les imatges són .webp -->
                            <img src="http://localhost/TFM/img/jocs/<?= $product['imagen']; ?>.webp" class="card-img-top w-100 h-100" alt="<?= $product['nomproducte']; ?>">
                            <div class="card-body text-center">
                                <!-- Nom del producte -->
                                <h5 class="card-title "><?= $product['nomproducte']; ?></h5>
                                <!-- Categoria amb color personalitzat -->
                                <p class="card-text ">Categoria: <span  class="card-text category-<?= strtolower($product['nombre']); ?>"><?= $product['nombre']; ?></span> </p>
                                <!-- Preu del producte -->
                                <p class="card-text"><?=  number_format($product['precio'], 2, ',', '.'); ?>€</p>
                                <button class="mt-2 add-to-cart btn btn-danger" data-producte="<?= $product['idproducto']; ?>">Afegir</button>
                                <button class="btn mt-2 btn-yellow" data-producte="<?= $product['idproducto']; ?>">Més informació</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


    </main>
    <!-- Peu de pàgina -->
    <?php footerInici($data); ?>