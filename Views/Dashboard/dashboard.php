<!-- Cridem a la funció Helper que controla la capçalera per reduir tot el que hi ha de codi repetit -->

<?php headerAdmin($data);?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-speedometer"></i> <?= $data['page_title']; ?></h1>
          
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="#"><?= $data['page_name']; ?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">

            <h3 class="tile-title">Benvingut al teu panell de control</h3>
  <div class="user-container justify-content-center align-items-center">
    <h2>Dades de l'Usuari</h2>
<<<<<<< HEAD
    <div class="arreglo ">
      <img class="arreglo_imatge d-flex justify-content-center align-items-center" src="http://localhost/TFM/img/usuaris/<?=  $_SESSION['userData']['imatgeUsuari']; ?>.webp" alt="User Image">
    <div></div>
=======

    <div class="div_Imatge"> 
      <img class="div_Imatge_Usuari" src="<?php echo media()?>/img/usuaris/<?= $_SESSION['userData']['imatgeUsuari']; ?>.webp" alt="User Image">
    </div>
    
>>>>>>> 6ba31bd6b6aff5048acb845e0e6f7f0ac953efeb
    <div class="user-info">
        <span>ID Usuari: </span> <?= $_SESSION['userData']['id']; ?>
    </div>
    <div class="user-info">
        <span>Nom: </span> <?= $_SESSION['userData']['nom']; ?>
    </div>
    <div class="user-info">
        <span>Cognoms: </span> <?= $_SESSION['userData']['cognoms']; ?>
    </div>
    <div class="user-info">
        <span>Estat: </span> 
        <span class="status ml-2 <?= $_SESSION['userData']['status'] == 1 ? 'actiu' : 'inactiu'; ?>">
            <?= $_SESSION['userData']['status'] == 1 ? 'Actiu' : 'Inactiu'; ?>
        </span>
    </div>
    <div class="user-info">
        <span>Email: </span> <?= $_SESSION['userData']['email']; ?>
    </div>
    <div class="user-info">
        <span>Telèfon: </span> <?= $_SESSION['userData']['telefono']; ?>
    </div>
    <div class="user-info">
        <span>Rol: </span> <?= $_SESSION['userData']['nombre_rol']; ?>
    </div>
</div>
          
          </div>
        </div>
      </div>
    </main>

    <!-- Cridem a la funció Helper que controla la capçalera per reduir tot el que hi ha de codi repetit -->

    <?php footerAdmin($data); ?>
    
