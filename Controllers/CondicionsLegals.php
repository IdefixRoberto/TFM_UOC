
<?php
class CondicionsLegals extends Controllers {

        public function __construct(){
            
            session_start();
    
        //utilitze parent per accedir i executar el mètode constructor de la nostra class
        parent::__construct();
        }

        public function condicionsLegals() {

            $data['page_tag'] = "Condicions Legals";
            $data['page_title'] = "Condicions Legals";
            $data['page_name'] = "Condicions Legals";
            $data['page_functions_js'] = "function_index.js";
            $this->views->getViews($this, "condicionsLegals", $data);
        }

    }
    
    ?>