<?php
class Conexion {
    private $host = "localhost"; // Nom del nostre servidor
    private $user = "root"; // Nom del nostre usuari
    private $password = ""; // Contrasenya per conectar
    private $db = "db_TFM"; // Nom de la base de dades
    private $conect; // S'utilitza per a les instruccions de SQL

    // Mètode constructor
    public function __construct() {
        $connectionString = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
        try {
            // Crear la connexió amb PDO
            $this->conect = new PDO($connectionString, $this->user, $this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->conect = null;
            echo "Error de connexió: " . $e->getMessage();
        }
    }

    // Mètode públic per retornar la connexió
    public function connect() {
        return $this->conect;
    }
}
?>
