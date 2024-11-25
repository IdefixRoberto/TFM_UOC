<?php
class Productos extends Controllers {

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

    public function Productos()
    {
       //data va a ser un array que continga tota la informació de la pàgina web.
       $data['page_tag'] = 'Gestio productes'; //es el nom que apareixerà al costat del favicon
       $data['page_title'] = 'Gestio productes'; //es el titol del meta que tindrà aquesta url
       $data['page_name'] = 'Productos';//nom de la seccio
       $data['page_functions_js'] = 'functions_productos.js'; //funcions que s'executaran en aquesta pàgina
       // cridem per a la pàgina principal la vista home;
        // cridem per a la pàgina principal la vista home;
       
       $this->views ->getViews($this,'productos',$data);

    }

    // Funció per obtenir els productes i enviar-los a la vista amb JSON
    public function getProductos() {
        $arrData = $this->model->selectProductos(); // Crida al model per obtenir els productes

        for ($i = 0; $i < count($arrData); $i++) {
            // Crea el botó per veure els detalls del producte


            $arrData[$i]['options'] = '<div class="text-center">
                <button class="btn btn-secondary btn-sm btnProductes" id="btnProductes" onClick="fntViewProducte()" pr='.$arrData[$i]['idproducto'].' title="Veure"><i class="fas fa-eye"></i></button>
                <button class="btn btn-primary btn-sm btnEditProductes"  id="btnEditProductes"  onClick="fntEditProducte()" pr='.$arrData[$i]['idproducto'].' title="Editar"><i class="fas fa-pencil-alt"></i></button>
               

                </div>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE); // Retorna els productes en format JSON
        die();
    }

    public function delProdcute()
    {
        
        if ($_POST) {
            $intIdrol = intval($_POST['idproducto']);
            $requestDelete = $this->model->deleteProducte($intIdrol);
        
            if ($requestDelete == 'ok') {
                $arrayDades = array('status' => true, 'msg' => "S'ha eliminat el producte");
            } else if ($requestDelete == 'exist') {
                $arrayDades = array('status' => false, 'msg' => 'No ha estat possible eliminar el producte');
            } else {
                $arrayDades = array('status' => false, 'msg' => 'Error al eliminar el producte.');
            }
        
            // Depurar salida
            header('Content-Type: application/json');
            echo json_encode($arrayDades, JSON_UNESCAPED_UNICODE);
            die();
        }
            
            
    
    }

    public function getRoles(){
            
        $arrayDades = $this -> model -> selectRoles();

        //Ara per a manipular els estatus cree un bucle for 
        for($i=0;$i<count($arrayDades); $i++){
           
            //ara creem els botos per modificar o eliminar els elements
            $arrayDades[$i]['options'] = '<div class="text-center">
            <button class="btn btn-secondary btn-sm btnProductes" id="btnProductes" ;" pr="'.$arrayDades[$i]['idrol'].'" title="Permisos"><i class="fas fa-key"></i></button>
            <button class="btn btn-primary btn-sm btnEditProductes" id="btnEditProductes" onclick= "fntEditRol();" rl="'.$arrayDades[$i]['idrol'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
            </div>';

        }



        

        //ara el que fem es convertir el array en format JSON amb la funció json_encode
        echo json_encode($arrayDades, JSON_UNESCAPED_UNICODE);
        //die el que fa es finalitzar el proces
        die();


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




   public function setProducto() {

    // Capture variables enviades via POST
    $intIdProducto = intval($_POST['idProducte']);
    $strNomProducto = strClean($_POST['txtnomproducte']);
    $strDescripcion = strClean($_POST['txtdescripcion']);
    $fltPrecio = floatval($_POST['numpreu']);
    $intStock = intval($_POST['numstock']);
    $strImagen = strClean($_POST['txtimatge']);
    $intCategoria = intval($_POST['listcategory']);
    
    $intStatus = intval($_POST['listStatus']);
    $strIdioma = strClean($_POST['txtidioma']);
    $strEditorial = strClean($_POST['txteditorial']);
    $intReserva = intval($_POST['listreserva']);
    $strFechaLanzamiento = strClean($_POST['dateLlancament']);
    $intOulet = intval($_POST['listOulet']);
    $intTempsDeJoc = intval($_POST['numtempsDeJoc']);
    $intJugadors = intval($_POST['numjugadors']);
    
    // Validació de camps obligatoris
    if (empty($strNomProducto) || empty($strDescripcion) || $fltPrecio <= 0 || $intStock < 0) {
        $arrResponse = array('status' => false, 'msg' => 'Tots els camps obligatoris han de ser omplerts.');
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    echo $intIdProducto;
    echo $strDescripcion;
    print_r(strClean($_POST['txtdescripcion']));
   
    // Decisió entre crear o actualitzar
    if ($intIdProducto == 0) {
        
        // Crear producte nou
        $request_producto = $this->model->insertProducte(
               
         $intCategoria, 
        $strNomProducto, 
        $strDescripcion, 
        $fltPrecio, 
        $intStock, 
        $strImagen, 
        $intStatus, 
        $intReserva, 
        $strFechaLanzamiento, 
        $intOulet, 
        $intTempsDeJoc, 
        $intJugadors, 
        $strIdioma, 
        $strEditorial
        );
        $option = 1; // Crear
    } 
    
    
    else {
        // Actualitzar producte existent
        $request_producto = $this->model->updateProducto(
            $intIdProducto,
            $intCategoria,
            $strNomProducto,
            $strDescripcion,
            $fltPrecio,
            $intStock,
            $strImagen,
            
            $intStatus,
            $intReserva,
            $strFechaLanzamiento,
            $intOulet,
            $intTempsDeJoc,
            $intJugadors,
            $strIdioma,
            $strEditorial
        );
        $option = 2; // Actualitzar
    }

    // Comprovació del resultat
    if ($request_producto > 0) {
        if ($option == 1) {
            $arrResponse = array('status' => true, 'msg' => 'Producte creat correctament.');
        } else {
            $arrResponse = array('status' => true, 'msg' => 'Producte actualitzat correctament.');
        }
    } else if ($request_producto == -7) {
        $arrResponse = array('status' => false, 'msg' => '¡Atenció! El producte ja existeix.');
    } else {
        $arrResponse = array("status" => false, "msg" => 'No es possible desar les dades.');
    }

    // Retorn de la resposta en format JSON
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
}


public function setProducto2() {

    // Capturar variables enviades via POST
    $intIdProducto = intval($_POST['idProducte']);
    $strNomProducto = strClean($_POST['txtnomproducte']);
    $strDescripcion = strClean($_POST['txtdescripcion']);
    $fltPrecio = floatval($_POST['numpreu']);
    $intStock = intval($_POST['numstock']);
    $strImagen = strClean($_POST['txtimatge']);
    $intCategoria = intval($_POST['listcategory']);
    
    $intStatus = intval($_POST['listStatus']);
    $strIdioma = strClean($_POST['txtidioma']);
    $strEditorial = strClean($_POST['txteditorial']);
    $intReserva = intval($_POST['listreserva']);
    $strFechaLanzamiento = strClean($_POST['dateLlancament']);
    $intOulet = intval($_POST['listOulet']);
    $intTempsDeJoc = intval($_POST['numtempsDeJoc']);
    $intJugadors = intval($_POST['numjugadors']);
    
    // Validació de camps obligatoris
    if (empty($strNomProducto) || empty($strDescripcion) || $fltPrecio <= 0 || $intStock < 0) {
        $arrResponse = array('status' => false, 'msg' => 'Tots els camps obligatoris han de ser omplerts.');
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    echo $intIdProducto;
    echo $strNomProducto;
    print_r(strClean($_POST['txtdescripcion']));
    print_r($_POST['txtdescripcion']);
    // Decisió entre crear o actualitzar

        // Actualitzar producte existent
        $request_producto = $this->model->updateProducto(
            $intIdProducto,
            $intCategoria,
            $strNomProducto,
            $strDescripcion,
            $fltPrecio,
            $intStock,
            $strImagen,
            
            $intStatus,
            $intReserva,
            $strFechaLanzamiento,
            $intOulet,
            $intTempsDeJoc,
            $intJugadors,
            $strIdioma,
            $strEditorial
        );
        $option = 2; // Actualitzar
    

    // Comprovació del resultat
    if ($request_producto > 0) {
        if ($option == 1) {
            $arrResponse = array('status' => true, 'msg' => 'Producte creat correctament.');
        } else {
            $arrResponse = array('status' => true, 'msg' => 'Producte actualitzat correctament.');
        }
    } else if ($request_producto == -7) {
        $arrResponse = array('status' => false, 'msg' => '¡Atenció! El producte ja existeix.');
    } else {
        $arrResponse = array("status" => false, "msg" => 'No es possible desar les dades.');
    }

    // Retorn de la resposta en format JSON
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
}


}
?>
