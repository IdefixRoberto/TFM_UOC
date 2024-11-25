<?php
    class HomeModel extends Mysql 
    {
        public function __construct(){
            //Cridare al constructor de Mysql, que ens conecta a la base de dades dels usuaris
           
           parent::__construct();
            
        }

         
    }
?>