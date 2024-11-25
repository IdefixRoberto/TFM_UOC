    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
<<<<<<< HEAD
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="http://localhost/TFM/img/usuaris/<?=  $_SESSION['userData']['imatgeUsuari']; ?>.webp" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"></span> <?= $_SESSION['userData']['nom']; ?> </span> <?= $_SESSION['userData']['cognoms']; ?> </p>
=======
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo media()?>/img/usuaris/<?= $_SESSION['userData']['imatgeUsuari']; ?>.webp" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nom']; ?>  <?= $_SESSION['userData']['cognoms']; ?> </p>
>>>>>>> 6ba31bd6b6aff5048acb845e0e6f7f0ac953efeb
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombre_rol']; ?></p>
        </div>
      </div>
      <ul class="app-menu ">
        <li><a class="app-menu__item" href="<?= base_url()?>dashboard"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">Dashboard</span></a></li>
 
         <!-- Navegador part dels rols dels usuaris de la web-->
         <li class="nav-item dropdown">
         <a class="app-menu__item dropdown-toggle" href="#" id="usuarisDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="app-menu__icon bi bi-laptop"></i>
        <span class="app-menu__label">Usuaris</span>
      </a>
        <ul class="dropdown-menu" aria-labelledby="usuarisDropdown">
          <li><a class="dropdown-item" href="<?= base_url()?>usuarios"><i class="bi bi-circle-fill"></i> Usuaris</a></li>
          <li><a class="dropdown-item" href="<?= base_url()?>roles" target="_blank" rel="noopener"><i class="bi bi-circle-fill"></i> Rols</a></li>
          <li><a class="dropdown-item" href="<?= base_url()?>permisos"><i class="bi bi-circle-fill"></i> Permisos</a></li>
        </ul>
        </li>



        <!-- Navegador part dels clients-->
        <li >
          <a class="app-menu__item" href="<?= base_url()?>clients" >
          <i class="app-menu__icon "><svg xmlns="http://www.w3.org/2000/svg" height="12" width="15" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#B197FC" d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg></i>
          <span class="app-menu__label">Clients</span></a>       
        </li>

        <!-- Navegador part dels Productes-->
        <li >
          <a class="app-menu__item" href="<?= base_url()?>productos" >
          
          <i class="app-menu__icon "><svg xmlns="http://www.w3.org/2000/svg" height="12" width="15" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ff0a0a" d="M274.9 34.3c-28.1-28.1-73.7-28.1-101.8 0L34.3 173.1c-28.1 28.1-28.1 73.7 0 101.8L173.1 413.7c28.1 28.1 73.7 28.1 101.8 0L413.7 274.9c28.1-28.1 28.1-73.7 0-101.8L274.9 34.3zM200 224a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM96 200a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM224 376a24 24 0 1 1 0-48 24 24 0 1 1 0 48zM352 200a24 24 0 1 1 0 48 24 24 0 1 1 0-48zM224 120a24 24 0 1 1 0-48 24 24 0 1 1 0 48zm96 328c0 35.3 28.7 64 64 64H576c35.3 0 64-28.7 64-64V256c0-35.3-28.7-64-64-64H461.7c11.6 36 3.1 77-25.4 105.5L320 413.8V448zM480 328a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></i>
          <span class="app-menu__label">Productes</span></a>       
        </li>

        <!-- Navegador part dels comandes-->
        <li >
              <li class="nav-item dropdown">
              <a class="app-menu__item dropdown-toggle" href="#" id="usuarisDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="app-menu__icon  "><svg xmlns="http://www.w3.org/2000/svg" height="12" width="15" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#1eb300" d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg></i>
              <span class="app-menu__label">Comandes</span>
            </a>
              <ul class="dropdown-menu" aria-labelledby="usuarisDropdown">
                <li><a class="dropdown-item" href="<?= base_url()?>pedido"><i class="bi bi-circle-fill"></i> Resumen Comandes</a></li>
                <li><a class="dropdown-item" href="<?= base_url()?>detallComanda" target="_blank" rel="noopener"><i class="bi bi-circle-fill"></i> Detall</a></li>

              </ul>
          </li>

     
        </li>

                <!-- Navegador retornar a casa-->
        <li >
            <a class="app-menu__item" href="<?= base_url()?>index" >
            <i class="app-menu__icon">
    <svg xmlns="http://www.w3.org/2000/svg" height="12" width="15" viewBox="0 0 576 512">
        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
        <path fill="#ffffff" d="M541 229.2L512 204.3V56c0-13.3-10.7-24-24-24h-72c-13.3 0-24 10.7-24 24v72L314.6 43c-13.5-12.7-34.6-12.7-48.1 0L35 229.2c-15.6 14.7-16.4 39.8-1.7 55.4s39.8 16.4 55.4 1.7L64 280.1V456c0 30.9 25.1 56 56 56H456c30.9 0 56-25.1 56-56V280.1l-24.7 5.5c-15.6 14.7-40.7 13.9-55.4-1.7s-13.9-40.7 1.7-55.4L541 229.2z"/>
    </svg>
</i>
            <span class="app-menu__label">Home</span></a>       
        </li>

                <!-- logout-->
                <li >
                  <a class="app-menu__item" href="<?= base_url()?>logout" >
                  <i class="app-menu__icon " ><svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#bd0000" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg></i>
                  <span class="app-menu__label">Logout</span></a>       
        </li>



      </ul>
    </aside>