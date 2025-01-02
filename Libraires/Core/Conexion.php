
<?php
class Conexion{
    private $host = DB_HOST; 
    private $user = DB_USER; 
    private $password = DB_PASSWORD; 
    private $db = DB_NAME; 
    private $conect;

//Inicie el meu métode constructor per operar amb el nosre SQL
    public function __construct(){

        $connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";.DB_CHARSET.";
       // $connectionString = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
        try{

            //PDO(conexio al servidor, usuari, password)
            $this->conect = new PDO($connectionString, DB_USER, DB_PASSWORD);
           // $this->conect = new PDO($connectionString, $this->user, $this->password);
            //a continuació intentem capturar els errors al conectar-me a la base de dades, aixina, detectaré més rapidament els problemes
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        catch(PDOException $e){
            $this->$conect = "Error de conexió";
            echo "Error". $e->getMessage();

        }
    }
        //creem un metode de tipo public per a retornar la propietat conect
        public function conect(){
            return $this ->conect;
    }

}


?>