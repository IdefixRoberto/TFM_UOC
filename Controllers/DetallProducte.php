<?php

class DetallProducte extends Controllers {
    
    public function __construct(){
           
        session_start();
   
       parent::__construct();
    }



    public function detallProducte($idproducto) {
        // Verificar si l'ID és vàlid convertint-lo a un enter i després analitzant si es major a 0
        $intIdProducto = intval($idproducto); 
        if ($intIdProducto > 0) {
            // Obtenir les dades del producte pel seu ID
            $data['product'] = $this->model->selectProducto($intIdProducto);

            if (empty($data['product'])) {
                $data['noResultsMessage'] = "No s'ha trobat cap producte.";
            }

            $data['page_tag'] = 'Detall del Producte';
            $data['page_title'] = 'Detall del Producte';
            $data['page_name'] = 'Detall del Producte';
            $data['page_functions_js'] = 'function_index.js';//

            // Carregar la vista
            $this->views->getViews($this, 'detallproducte', $data);
        } else {
            // Redirigir a una pàgina d'error si no és vàlid
            header('Location: ' . base_url());
        }
    }
}
 

?>