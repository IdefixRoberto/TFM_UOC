<footer class="footer bg-dark text-white py-4 d-flex flex-column ">
        <div class="row text-center text-md-start">
                <!-- Secció de newsletter -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <h3>Apunta't al nostre newsletter</h3>
                    <input type="email" class=" text-center block" placeholder="Introdueix el teu email">
                    <button class="btn btn-outline-light mt-2">Subscriu-te</button>
                </div>                

                <!-- Secció de formes de pagament -->
                <div class="col-md-4 mb-4 mb-md-0 align-items-center text-center justify-content-center ">
                    <h3>Formes de pagament</h3>
                    <ul class="list-unstyled ms-4">
                        <li class="d-flex align-items-center mb-3 margin-left">
                            <i class="fas fa-mobile-alt mr-3"></i>
                            <span>Bizum</span>
                        </li>
                        <li class="d-flex align-items-center mb-3 margin-left">
                            <i class="fas fa-credit-card mr-3"></i>
                            <span>Tarjeta</span>
                        </li>
                        <li class="d-flex align-items-center margin-left">
                            <i class="fab fa-paypal mr-3"></i>
                            <span>Paypal</span>
                        </li>
                    </ul>

                </div>

                <!-- Secció de contacte -->
                <div class="col-md-4">
                    <h3>Respecte a nosaltres</h3>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Contacte</a></li>
                        <li><a href="#" class="text-white">Condicions legals</a></li>
                        <li><a href="#" class="text-white">Política de privacitat</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <!-- Secció de copyright i icones socials -->
        <div class="container mt-4 d-flex flex-column flex-md-row justify-content-between align-items-center color_web_footer">
            <p class="mb-2 mb-md-0">&copy Salvador Peiró Palmer</p>
            <div class="d-flex">
                <a href="https://twitter.com" class="text-white mr-4" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://instagram.com" class="text-white" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Cree una funció per obtenir la funció en php de base_URL -->
    <script> const base_url = '<?= base_url(); ?>'</script>
    <!-- Els difernts codis Javascript que funcionen -->
    <script src="<?= media(); ?>/js/jquery-3.7.0.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <script src="<?= media(); ?>/js/fontawesome.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- el següent arxiu es per a fer icones -->
    <script src="<?= media(); ?>/js/fontawesome.js"></script>
    <!-- per a fer les alertes -->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.min.css">


    <!-- Data table plugin -->
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/<?php echo $data['page_functions_js']; ?>"></script>

        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    </body>
</html>