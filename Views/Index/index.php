
    <!-- Pàgina Inici -->
    <?php headerInici($data); ?>
    <!-- Main del cos-->
    <main>
           
            <!-- Secció de jocs destacats -->

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <!-- Indicadors per passar d'una imatge a l'altra
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        -->

            <!-- Les imatges del carrusel -->
                <div class="carousel-inner  galeria-fons allcenter ">
                    <div class="carousel-item active">
            <h2 class="text-center carrouselText"> Circus Fun </h2>
            <img src="http://localhost/TFM/img/jocs/circusFun.webp" class="d-block imatgeMaxTamany  carouselImgatge " alt="Imatge 1">
            </div>
            <div class="carousel-item ">
                <h2 class="text-center  carrouselText"> Dixit </h2>
                <img src="http://localhost/TFM/img/jocs/dixit.webp" class="d-block imatgeMaxTamany  carouselImgatge " alt="Imatge 2">
            </div>
            <div class="carousel-item">
                <h2 class="text-center  carrouselText"> Descent Acte 2</h2>
                <img src="http://localhost/TFM/img/jocs/Descent-Leyendas-Tinieblas-La-Guerra-del-Traidor-removebg-preview.webp" class="  carouselImgatge  d-block imatgeMaxTamany" alt="Imatge 3">
            </div>
            
        </div>
        <!-- Botons de control per anar a la següent o anterior imatge 
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Següent</span>
        </button>
        -->
        </div>

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
                                <p class="card-text"><?= number_format($product['precio'], 2, ',', '.'); ?>€</p>
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