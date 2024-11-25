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
    <title><?= $data['page_tag'] ?> </title>
    <!--  CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/bootstrap.min.css">
    <link rel="stylesheet"  type="text/html"  href="<?= media(); ?>/plugins/sweetalert/sweetalert.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Bootstrap Select CSS -->
    <link  type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">

      <!-- Google fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?= base_url()?>dashboard">Panell </a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?= base_url();?>opcions"><i class="bi bi-gear me-2 fs-5"></i> Opcions</a></li>
            <li><a class="dropdown-item" href="<?= base_url();?>perfil"><i class="bi bi-person me-2 fs-5"></i> Perfils</a></li>
            <li><a class="dropdown-item" href="<?= base_url();?>logout"><i class="bi bi-box-arrow-right me-2 fs-5"></i> Logout</a></li>
          </ul>
        </li>
      </ul>


    </header>
    <?php require_once("nav_admin.php"); ?>