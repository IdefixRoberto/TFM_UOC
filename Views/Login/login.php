
<!DOCTYPE html>
<html lang="ca">
    <head>
        <!-- descripció que apareixerà en la busqueda en google-->
        <meta name="description" content="TFM per al Máster universitario Online de Desarrollo de Sitios y Aplicaciones Web no es una tenda de jocs de taula real ">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" conent="Salvador Peiró">
        <meta name="theme-color" content="#009688">
        <!-- Introduim el favicon -->
        <link rel="icon" href="<?= media();?>/img/uploads/favicon/Sin_título-removebg-preview.png">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <title><?= $data['page_tag'] ?> </title>
        <!-- Main CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


        <link rel="stylesheet" type="text/css" href="<?= media();?>/css/bootstrap.min.css">

        <!-- Bootstrap Select CSS -->
        <link  type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet">

        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        
        <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-reboot.css">
        <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-select.min.css">
        <link rel="stylesheet" type="text/css" href="<?= media();?>/css/login.css">


    </head>
    <body>
        <header>
            <!-- Barra superior de contacte -->
            <div class="contact-bar bg-dark text-white py-2d ">
                <div class="container d-flex justify-content-between align-items-center flex-columnes ">
                    <div class="flex-columnes telefon">
                        <a target="_blank" href="https://web.whatsapp.com/" class="text-white mr-5 d-flex inici-center telgram"> <i class="fas fa-phone-alt me-2   mr-3"></i> <span>6xxxxxxxxx </span></a>

                    </div>
                    <div class="d-flex align-items-center flex-columnes ">
                        <a target="_blank" href="https://web.telegram.org/" class="text-white mr-5 d-flex inici-center telgram" >
                            <i class="fab fa-telegram me-1  mr-3"></i> <span>Telegram</span> 
                        </a>


                        <!-- Comprovaré si la sessió està iniciada -->
                        <?php if(isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
                            <?php if(isset($_SESSION['login']) && $_SESSION['userData']['rolid'] == 1): ?>
                                    
                                        <a class="link-apartats administrador mr-3" href="<?php echo base_url(); ?>dashboard">
                                        <i class="fa-solid fa-sitemap mr-2"></i>
                                        
                                            <span>Dashboard</span>
                                        </a>
                                    
                                <?php endif; ?>
                                <!-- Si el usuario está logueado -->
                                <i id="login-icon" class="fa-solid fa-user mr-3 fax"></i>
                                <span id="login-text">Hola, <?php echo $_SESSION['userData']['nom'] . ' ' . $_SESSION['userData']['cognoms']; ?></span>
                                <a class="app-menu__item ml-4" href="<?= base_url()?>logout" >
                                <i class="app-menu__icon mr-1" ><svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#bd0000" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg></i>
                                <span class="app-menu__label mr-4 ">Logout</span></a>
                                <?php else: ?>
                                <a target="_blank" href="" class="text-white d-flex align-items-center mr-5 inici-center">
                            <i class="fas fa-envelope me-1 mr-4"></i> <span class="newsleterinici">Newsletter</span>
                                </a>
                                <a target="_blank" href="<?php echo base_url(); ?>login" id="login-link" class="text-white d-flex align-items-center inici-center">
                                <!-- Si el usuario no está logueado -->
                                <i id="login-icon" class="fa-solid fa-user-lock me-1 mr-3 fax"></i>
                                <span id="login-text" class=" mr-4 ">Iniciar Sessió</span>
                            <?php endif; ?>
                        </a>
                        
                        <div class="cart-icon mt-2" >
                            <i class="fa fa-shopping-cart  mr-3"></i>
                            <span class="cart-count"></span>
                        </div>

                        <div class="cart-dropdown" style="display: none;">
                            <div class="cart-details">
                                <h2>El teu carret</h2>
                                <ul class="cart-items">
                                    <!-- Els elements del carret es carregaran aquí gràcies a JS-->
                                </ul>
                                <div class="total_Compra">Total: <span class="cart-total">0</span>€</p> </div><p >
                                <button disabled class="finalize-purchase-btn btn btn-primary">Finalitzar compra</button>

                            </div>
                        </div>

                                        
                    </div>
                </div> 
            </div>

            <!-- Barra de navegació -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <div class="container ">
                    <a class="navbar-brand" href="http://localhost/TFM/index"><img class="logoWebIdefix" src="<?= media();?>/img/uploads/favicon/Sin_título-removebg-preview.png" alt="logo web"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item mr-lg-3  mb-2"><a class="link-apartats" href="http://localhost/TFM/ameritrash">Ameritrash</a></li>
                                <li class="nav-item mr-lg-3 mb-2"><a class="link-apartats" href="http://localhost/TFM/filler">Filler</a></li>
                                <li class="nav-item mr-lg-3 mb-2"><a class="link-apartats" href="http://localhost/TFM/rol">Rol</a></li>
                                <li class="nav-item mr-lg-3 mb-2"><a class="link-apartats" href="http://localhost/TFM/cartes">Cartes</a></li>
                                <li class="nav-item mr-lg-3 mb-2"><a class="link-apartats" href="http://localhost/TFM/familiars">Familiars</a></li>
                                <li class="nav-item mr-lg-3 mb-2"><a class="link-apartats" href="http://localhost/TFM/accessoris">Accessoris</a></li>
                                <li class="nav-item mr-lg-3 mb-2"><a class="link-apartats" href="http://localhost/TFM/ofertes">Ofertes!</a></li>
                            </ul>
                            <form class="d-flex" method="GET" action="cercar">
                                <input class="form-control me-2 ml-4" type="search" name="query" placeholder="Cercar jocs" aria-label="Search">
                                <button class="btn btn-outline-success ml-2" type="submit">Cercar</button>
                            </form>
                        </div>
                </div>
            </nav>

        </header>
        <main>                           
            <!-- Contingut de la pàgina -->
            <div class="login-container" id="containerLogin">
                <h2>Iniciar Sessió</h2>
                <form id="loginForm" name="loginForm" class="loginForm">
                    <div class="input-group ">
                        
                            <i class="fas fa-user"></i>
                            <input type="email" autocomplete="current-email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email" required> </br>            

                    </div>
                    <div class="no-error" id="emailError">
                            <span >Introdueix un email vàlid</span>
                    </div>
                    <div class="input-group ">
                        <i class="fas fa-lock"></i>
                        <input type="password" autocomplete="current-password" name="txtpassword" id="txtpassword" class="form-control" placeholder="Contrasenya" required>
                        <i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                    </div>
                    <button class="buttonNoOK" type="submit" id="loginButton" disabled >Accedir</button>
                </form>
            </div>
        </main> 

        <!-- Peu de pàgina -->
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
        <!-- Essential javascripts for application to work -->
        <script src="<?= media(); ?>/js/jquery-3.7.0.min.js"></script>
        <script src="<?= media(); ?>/js/popper.min.js"></script>
        <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
        <script src="<?= media(); ?>/js/fontawesome.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- el següent arxiu es per a fer AJAX -->
        <script src="<?= media(); ?>/js/fontawesome.js"></script>
        <!-- The javascript plugin to display page loading on top -->
        <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>

        <!-- Page specific javascripts -->
        <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.min.css">
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Data table plugin -->
        <script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
        <script src="<?= media(); ?>/js/<?php echo $data['page_functions_js']; ?>"></script>
        <!-- DataTables Buttons -->
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    </body>
</html>