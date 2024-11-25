<?php

    class Mysql extends Conexion{

        private $arrayDades;
        private $strquery;
        private $strid;
        private $strnom;
        private $strCognoms;
        private $strEmail;
        private $strContrasenya;
        private $dateNaixement;
        private $boleanNewsletter;
        private $strSexe;
        private $conexion;

        public function __construct(){ 
            $this->conexion = new Conexion(); // crida al constructor de la clase pare (Conexion)
            $this->conexion = $this->conexion->conect(); // Inicialitza la propietat conexion utilitzada en el métode connect() de la clase pare
        }

        public function insert( string $query, array $arrayDades )
        { 

         $this->strquery = $query;
         $this->arrayDades = $arrayDades;

         //prepare el query (la instrucció SQL)
          $insert = $this-> conexion -> prepare($this->strquery);

         //Ara utilitze executar la consulta amb els valors incorporats al array
         $resInsert = $insert->execute($this->arrayDades);

         //Ara validem si s'ha incorporat a la base de dades la informació.

         if($resInsert){
         //ara si s'han capturat de forma correcta, insertem l'ultim idcapture l'ultim id amb lastInsertId() i aixina tinc totes les dades necesaries.
         $idInsert = $this-> conexion -> lastInsertId();
         
        }
        else{$idInsert = 0;}

        return $idInsert;
     
     }


     public function insert2(string $query, array $arrayDades)
{
    try {
        // Prepara la consulta SQL
        $stmt = $this->conexion->prepare($query);

        // Executa la consulta amb els valors passats a $arrayDades
        $resInsert = $stmt->execute($arrayDades);

        // Comprova si la inserció ha tingut èxit
        if ($resInsert) {
            // Retorna l'últim ID inserit si la inserció és correcta
            $idInsert = $this->conexion->lastInsertId();
        } else {
            // Si la inserció falla, retorna 0
            $idInsert = 0;
        }

        return $idInsert; // Retorna l'ID inserit o 0

    } catch (PDOException $e) {
        // En cas d'error, registra l'error en un fitxer de depuració
        file_put_contents('debug.log', "Error en la inserció: " . $e->getMessage(), FILE_APPEND);

        return 0; // Retorna 0 en cas d'error
    }
}






             
     function selectSQL(string $sql, array $arrData = [])
     {
         try {
             $this->pdo = new PDO("mysql:host=localhost;dbname=dB_tfm", "root", "");
             $stmt = $this->pdo->prepare($sql);
             $stmt->execute($arrData);
             return $stmt->fetch(PDO::FETCH_ASSOC);
         } catch (PDOException $e) {
             echo 'Error: ' . $e->getMessage();
         }
     }


        //Per a buscar un sol usuari
        public function select(string $strquery){
            // amb la variable sql seleccione tota la base de dades usuario i indique que id = ? ja que utilitzarem una consulta preparada;
           $this->strquery = $strquery;
           $result = $this->conexion->prepare($this -> strquery);
           $result -> execute();
           //Utilitze fetch i no fetchall ja que sols vull capturar un sol registre i amb fetchall es capturen tots
           $data = $result->fetch(PDO::FETCH_ASSOC);
           return  $data;
        }

        //Per obtenir tots els usuaris
        public function select_all(string $query){
           
           $this->strquery = $query;
           $result = $this->conexion->prepare($this -> strquery);
           $result -> execute();
           //Utilitze fetch i no fetchall ja que sols vull capturar un sol registre i amb fetchall es capturen tots
           $data = $result->fetchall(PDO::FETCH_ASSOC);
           return  $data;
        }

        public function update(string $query, array $arrayDades){
            $this->strquery = $query;
            $this->arrayDades = $arrayDades;
            $update = $this->conexion->prepare($this->strquery);
            $resExecute = $update->execute($this->arrayDades);
            return $resExecute;
        }



        public function delete(string $query){
            $this->strquery = $query;
            $result = $this->conexion->prepare($this -> strquery);
            $eliminar = $result -> execute();
               
            return $eliminar;
            }

    

    public function select_allCercador($query, $params = array())
    {
        $this->strquery = $query;
        $this->arrValues = $params;

        $stmt = $this->conexion->prepare($this->strquery);
        foreach ($this->arrValues as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>