    <!-- Pàgina Inici -->
    <?php headerInici($data); ?>

    <main>
                           
        <!-- Secció de jocs destacats -->

                <div class="container my-5">
                    <!-- Mostrem el missatge de la cerca -->
                    <h1 class="text-center"><?php if (!empty($data['noResultsMessage'])): ?>
                            <p><?= $data['noResultsMessage']; ?></p>
                        <?php endif; ?>
                    </h1>
                    <div class="row">
                        

                        <!-- Mostrem els productes (ja siguin resultats de la cerca o aleatoris) -->
                        <?php if (!empty($data['products'])): ?>
                            <?php  foreach ($data['products'] as $product): ?>
                                <div class="col-md-4">
                                    <div class="card mb-5">
                                        <!-- Imatge del producte, assumint que totes les imatges són .webp -->
                                        <img src="http://localhost/TFM/img/jocs/<?= $product['imagen']; ?>.webp" class="card-img-top w-100 h-100" alt="<?= $product['nomproducte']; ?>">
                                        <div class="card-body text-center">
                                            <!-- Nom del producte -->
                                            <h5 class="card-title"><?= $product['nomproducte']; ?></h5>
                                            <!-- Preu del producte -->
                                            <p class="card-text"><?= number_format($product['precio'], 2, ',', '.'); ?>€</p>
                                            <button  class=" mt-2 add-to-cart btn btn-danger" data-producte="<?= $product['idproducto']; ?>">Afegir</button>
                                            <button class="btn mt-2 btn-yellow" data-producte="<?= $product['idproducto']; ?>">Més informació</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No s’han trobat productes que coincideixin amb la cerca.</p>
                        <?php endif; ?>
                    </div>
                </div>


    </main>
    <!-- Peu de pàgina -->
    <?php footerInici($data); ?>