<?php
class Categoria extends Controllers {

    public function __construct(){
        //utilitze parent per accedir i executar el mètode constructor de la nostra class
       parent::__construct();
       session_start();
       if(empty($_SESSION['login'])){
        header('Location: '.base_url().'login');
        }
    }
    public function categoria() {
        $data['page_tag'] = "Categoria";
        $data['page_title'] = "Categorías";
        $data['page_name'] = "Categoria";
        $data['page_functions_js'] = "functions_categoria.js";
        $this->views->getViews($this, "categoria", $data);
    }

    public function setCategoria() {
        if ($_POST) {
            $idCategoria = intval($_POST['idCategoria']);
            $strNombre = strClean($_POST['txtNombre']);
            $strDescripcion = strClean($_POST['txtDescripcion']);
            $intStatus = intval($_POST['listStatus']);

            if ($idCategoria == 0) {
                // Crear Nova categoria
                $request_categoria = $this->model->insertCategoria($strNombre, $strDescripcion, $intStatus);
            } else {
                // Actualizar categoría existent
                $request_categoria = $this->model->updateCategoria($idCategoria, $strNombre, $strDescripcion, $intStatus);
            }

            if ($request_categoria > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Dades guardades correctament.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es possible emmagatzemar les dades.');
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getCategorias() {
        $arrData = $this->model->selectCategorias();
        
        for ($i = 0; $i < count($arrData); $i++) {
            // Estat
            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="badge badge-success">Actiu</span>';
            } else {
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inactiu</span>';
            }
    
            // Botons  opciones: vore, editar, eliminar
            $arrData[$i]['options'] = '
                <div class="text-center">
                    <button class="btn btn-secondary btn-sm btnViewCategoria" cat="' . $arrData[$i]['idcategoria'] . '" title="Ver"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-primary btn-sm btnEditCategoria" cat="' . $arrData[$i]['idcategoria'] . '" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm btnDelCategoria" cat="' . $arrData[$i]['idcategoria'] . '" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                </div>';
        }
    
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getCategoria($idCategoria) {
        $idCategoria = intval($idCategoria);
        if($idCategoria > 0) {
            $arrData = $this->model->selectCategoria($idCategoria); // Recupera les dades de la categoria
            if(empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => 'Dades no trobades.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE); 
        }
        die();
    }

    public function delCategoria() {
        if ($_POST) {
            // Convertir l'ID de la categoria a un sencer
            $intIdCategoria = intval($_POST['idCategoria']);
            
            // Cride el mètode del model per eliminar la categoria
            $requestDelete = $this->model->deleteCategoria($intIdCategoria);
            
            // Verifique el resultat de la eliminació
            if ($requestDelete == 'ok') {
                $arrayDades = array('status' => true, 'msg' => "S'ha eliminat la categoria correctament.");
            } else if ($requestDelete == 'exist') {
                $arrayDades = array('status' => false, 'msg' => 'No ha estat possible eliminar la categoria perquè té productes associats.');
            } else {
                $arrayDades = array('status' => false, 'msg' => 'Error al eliminar la categoria.');
            }
            
            echo json_encode($arrayDades, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    
    
}
?>
