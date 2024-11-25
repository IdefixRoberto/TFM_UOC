<?php
      //spl_autoload_register és una funció de PHP que permet registrar una o diverses funcions d'autocarregament de classes. La seva finalitat és carregar automàticament les classes
      spl_autoload_register(function ($class) {
        //Ara busque si existeix la classe en la carpeta Libraires/Core i si existeix el requereix
        if (file_exists('Libraires/Core/'.$class.'.php')) {
          require_once('Libraires/Core/'.$class.'.php');
        }
      });

?>