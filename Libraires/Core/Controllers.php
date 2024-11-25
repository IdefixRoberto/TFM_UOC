<?php

    class Controllers
    {
        public function __construct(){
            //Hem de cridar en el mètode constructor el que volem que es carregue com en ANGULAR
            //Aixina s'executa quan carrega la pàgina
            $this->loadModel();

            //Cridem la vista de la pàgina web el HTML
            $this->views = new Views();
        }

        public function loadModel(){
            //La funció get_class en PHP s'utilitza per a obtenir el nom de la classe d'un objecte
            $model = get_class($this).'Model';
            $routClass = 'Models/'.$model.'.php';
            if(file_exists($routClass)){
                //si existeix la classe la requerim
                require_once($routClass);
                $this-> model = new $model();
            }
        }

    }


?>

