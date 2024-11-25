<?php
    // aquí va a fer referencia a l'arxiu index.php al mètode spl_autoload_register(function ($class)
    //aixina quan anem a fer la instancia farà referencia a Controllers i $class serà Controllers i aixina fa l'herencia
    class index extends Controllers {
        public function __construct(){
        
            
            session_start();

            
        //utilitze parent per accedir i executar el mètode constructor de la nostra class
           parent::__construct();
        }

        public function index()
        {
                            // Obtenir tots els productes
                            $data['products'] = $this->model->selectProductos(); 

           //data va a ser un array que continga tota la informació de la pàgina web.
           $data['page_tag']='Tenda Virual TFM'; //es el nom que apareixerà al costat del favicon
           $data['page_title'] = 'Tenda Virual TFM'; //es el titol del meta que tindrà aquesta url
           $data['page_name'] = 'Tenda Virual TFM';//nom de la seccio
           $data['page_functions_js'] = 'function_index.js';//
            
           $this->views ->getViews($this,'index',$data);
                
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
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE); 
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