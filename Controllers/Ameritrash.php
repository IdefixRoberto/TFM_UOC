<?php
class Ameritrash extends Controllers {

    public function __construct(){
           
        session_start();
   
    //utilitze parent per accedir i executar el mètode constructor de la nostra class
       parent::__construct();
    }

    public function ameritrash() {
        // Per a obtenir tots els productes
        $data['products'] = $this->model->selectProductos(); 
        $data['page_tag'] = "Ameritrash";
        $data['page_title'] = "Ameritrash";
        $data['page_name'] = "Ameritrash";
        $data['page_functions_js'] = "function_index.js";
        $this->views->getViews($this, "ameritrash", $data);
    }

        // Per a obtenir tots els productes amb el nom de la categoria
        public function selectProductos()
        {
            $sql = "SELECT p.idproducto, p.oferta,  p.categoriaid,  p.nomproducte, p.descripcion,  p.precio, p.stock, p.imagen,  p.status, p.reserva, p.fechaLanzamiento, p.outlet,  p.tempsDeJoc, p.jugadores, p.idioma, p.editorial, c.idcategoria, c.nombre, c.descripcion 
                    FROM productes p
                    INNER JOIN categoria c ON p.categoriaid = c.idcategoria";
            $request = $this->select_all($sql);
            return $request;
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