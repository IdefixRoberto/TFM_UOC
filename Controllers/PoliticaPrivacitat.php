



<?php
class PoliticaPrivacitat extends Controllers {

        public function __construct(){
            
            session_start();
    
        //utilitze parent per accedir i executar el mètode constructor de la nostra class
        parent::__construct();
        }

        public function politicaPrivacitat() {

            $data['page_tag'] = "Politica Privacitat ";
            $data['page_title'] = "Politica Privacitat ";
            $data['page_name'] = "Politica Privacitat ";
            $data['page_functions_js'] = "function_index.js";
            $this->views->getViews($this, "politicaPrivacitat", $data);
        }

    }
    
    ?>