
<?php
class detallComanda extends Controllers {
    
    
    public function __construct(){
        //utilitze parent per accedir i executar el mètode constructor de la nostra class
       parent::__construct();
       session_start();
       if(empty($_SESSION['login'])){
        header('Location: '.base_url().'login');
        }
    }

    public function detallComanda() {
        
        $data['page_tag'] = "Detall Comandes";
        $data['page_title'] = "Detall Comandes";
        $data['page_name'] = "Detall Comandes";
        $data['page_functions_js'] = "funtion_detallComanda.js";
        $this->views->getViews($this, "detallComanda", $data);
    }

    public function selectDetallComanda()
    {
        $arrData = $this->model->selectDetallComandaModel();
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getDadesGraficUnitatsVenudes()
    {
        $arrData = $this->model->selectUnitatsVenudes();
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }


}

?>