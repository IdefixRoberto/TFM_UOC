<?php
// Direccions del projecte
define('BASE_URL', getenv('BASE_URL') ?: 'http://localhost/TFM/'); 
define('base_url', getenv('BASE_URL') ?: 'http://localhost/TFM/');
define('LIBS', 'Libraires/');
define('VIEWS', 'Views/');

// Conexió a la base de dades (amb suport per variables d'entorn)
define('DB_HOST', getenv('DB_HOST') ?: "localhost"); // Usa la variable d'entorn o localhost per defecte
define('DB_USER', getenv('DB_USER') ?: "root");      // Usa la variable d'entorn o root per defecte
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: ""); // Usa la variable d'entorn o una cadena buida
define('DB_NAME', getenv('DB_NAME') ?: "db_TFM");    // Usa la variable d'entorn o db_TFM per defecte
define('DB_CHARSET', "charset=utf8");               // Per al conjunt de caràcters

// Separadors per als decimals
define('SPD', ',');
define('SPM', '.');

// Símbol de la moneda
define('SMONEY', "€");

// Zona horària
date_default_timezone_set('Europe/Madrid');
?>
