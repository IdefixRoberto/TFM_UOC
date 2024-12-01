<?php
require_once('config.php'); // Importem el fitxer de configuració

try {
    // Cadena de connexió (DSN)
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";" . DB_CHARSET;
    
    // Creació de l'objecte PDO
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: Missatge de connexió correcta (elimina-ho en producció)
    // echo "Connexió correcta!";
} catch (PDOException $e) {
    // En cas d'error, mostrem el missatge d'excepció
    die("Error de connexió: " . $e->getMessage());
}

// Retornem l'objecte PDO per utilitzar-lo en altres llocs
return $pdo;
?>
