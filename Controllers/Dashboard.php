<?php
    // aquí va a fer referencia a l'arxiu index.php al mètode spl_autoload_register(function ($class)
    //aixina quan anem a fer la instancia farà referencia a Controllers i $class serà Controllers i aixina fa l'herencia
    class Dashboard extends Controllers {
        public function __construct(){
            //utilitze parent per accedir i executar el mètode constructor de la nostra class
           parent::__construct();
           session_start();
           if(empty($_SESSION['login'])){
            header('Location: '.base_url().'login');
            }

                    // Comprova el rol de l'usuari
        if($_SESSION['userData']['rolid'] != 1) {
            // Si no és administrador, redirigeix a una altra pàgina o mostra un missatge d'error
            header('Location: '.base_url().'login');
            die();
        }
        }

        public function dashboard($parametre)
        {
           //data va a ser un array que continga tota la informació de la pàgina web.
           $data['page_id'] = 2;//nom de la seccio
           $data['page_tag'] = 'Dashboard - Tenda Virtual'; //es el nom que apareixerà al costat del favicon
           $data['page_title'] = 'Dashboard - Tenda Virtual'; //es el titol del meta que tindrà aquesta url
           $data['page_name'] = 'Dashboard';//nom de la seccio
           $data['page_functions_js'] = "functions_dasboard.js";
            
          
            // Assegura't que les dades de sessió existeixen
            if (isset($_SESSION['userData'])) {
                // Accedeix a les dades de l'usuari emmagatzemades en la sessió
                $userData = $_SESSION['userData'];
                

            } else {
                echo 'No s\'han trobat dades de l\'usuari.';
            }
    
            // Ara, passa aquestes dades a la vista si vols mostrar informació de l'usuari
            $data['page_id'] = 2;
            $data['page_tag'] = 'Dashboard - Tenda Virtual';
            $data['page_title'] = 'Dashboard - Tenda Virtual';
            $data['page_name'] = 'Dashboard';
            
            
            // Carrega la vista
            $this->views->getViews($this, 'dashboard', $data);

            
        }


        
    }

?>