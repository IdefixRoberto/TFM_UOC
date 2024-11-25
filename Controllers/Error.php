<?php
/********************************  Per a controlar els errors    ******************************************* */
    // aquí va a fer referencia a l'arxiu index.php al mètode spl_autoload_register(function ($class)
    //aixina quan anem a fer la instancia farà referencia a Controllers i $class serà Controllers i aixina fa l'herencia
    class Errors extends Controllers {
        public function __construct(){
            //utilitze parent per accedir i executar el mètode constructor de la nostra class
           parent::__construct();
           //Redirigir a la pàgina d'inici si no hi ha cap error
           header('Location: http://localhost/TFM/index');
           exit;
        }

        public function notFound()
        {
          //No cal cridar a la vista perquè ja s'ha redirigit a la pàgina d'inici

        }


    }

    $notFound = new Errors();
    $notFound ->notFound();

?>