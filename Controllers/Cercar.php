<?php
    // aquí va a fer referencia a l'arxiu index.php al mètode spl_autoload_register(function ($class)
    //aixina quan anem a fer la instancia farà referencia a Controllers i $class serà Controllers i aixina fa l'herencia
    class cercar extends Controllers {
        public function __construct(){
        
            
            session_start();

            
        //utilitze parent per accedir i executar el mètode constructor de la nostra class
           parent::__construct();
        }

        public function cercar() {
            // Caputre el resultat de la consulta del buscador
            $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
        
            if (!empty($searchQuery)) {
                // Faig la cerca de productes amb el mètode de cerca
                $data['products'] = $this->model->searchProductos($searchQuery);
            }
        
            // Si no es troben resultats, seleccione 6 productes aleatoris
            if (empty($data['products'])) {
                $data['products'] = $this->model->getRandomProducts(6); // Obtenir 6 productes aleatoris
                $data['noResultsMessage'] = "No hem trobat cap resultat, però et podria interessar...";
            } else {
                $data['noResultsMessage'] = "El resultat de la teua cerca ha estat:";
            }
        
            $data['page_tag'] = 'Cerca de jocs';
            $data['page_title'] = 'Cerca de jocs';
            $data['page_name'] = 'Cerca de jocs';
            $data['page_functions_js'] = 'function_index.js';
        
            // Carreguem la vista amb els resultats obtinguts
            $this->views->getViews($this, 'cercar', $data);
        }
        

            // Funció per obtenir un producte específic per a visualitzar els seus detalls
    public function getProducto($idproducto) {
        $intIdProducto = intval($idproducto); // Assegura que el valor és un enter
        if ($intIdProducto > 0) {
            $arrData = $this->model->selectProducto($intIdProducto); // Obté les dades del producte
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Producte no trobat.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE); // Envia la resposta com JSON
        }
        die();
    }

    public function selectCategoriesController()
    {
        $arrData = $this->model->selectCategories();
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE); // Retorna els productes en format JSON
        die();
    }

    }
?>