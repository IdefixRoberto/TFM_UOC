<?php
class Contacte extends Controllers {

        public function __construct(){
            
            session_start();
    
        //utilitze parent per accedir i executar el mètode constructor de la nostra class
        parent::__construct();
        }

        public function contacte() {

            $data['page_tag'] = "Contacte";
            $data['page_title'] = "Contacte";
            $data['page_name'] = "Contacte";
            $data['page_functions_js'] = "function_index.js";
            $this->views->getViews($this, "contacte", $data);
        }

    }
    
    ?>