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
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/home.css">


   </head>
<body>
    <header>
        <!-- Barra superior de contacte -->
        <div class="contact-bar bg-dark text-white py-2d ">
            <div class="container d-flex justify-content-between align-items-center flex-columnes ">
                <div class="flex-columnes telefon">
                    <a target="_blank" href="https://web.whatsapp.com/" class="text-white mr-5 d-flex inici-center telgram"> <i class=" fa-brands fa-whatsapp me-2   mr-3"></i> <span>6xxxxxxxxx </span></a>

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

        <!-- Banner de promoció -->
        <div class="banner bg-secondary text-white text-center mb-3 opacity-75 py-2 d-flex justify-content-center text-center">
            <i class="fa-solid fa-truck-fast mr-4 banerindex"></i> 
            <p class="banerindex">Entrega gratuïta en enviaments superiors a 35€</p>
        </div>
    </header>