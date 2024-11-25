<?php
class PagamentCompletat extends Controllers {

    public function __construct(){
        session_start();
        parent::__construct();
    
        if(empty($_SESSION['login'])){
            header('Location: '.base_url().'login');
        }
        
    }



    // Vista de compra finalitzada
    public function pagamentCompletat($paymentMethod) {
        // Pas de la informació del mètode de pagament a la vista
        $data['page_tag'] = "Compra finalitzada";
        $data['page_title'] = "Compra finalitzada";
        $data['page_name'] = "Compra finalitzada";
        $data['page_functions_js'] = "PagamentCompletat.js";
        $data['payment_method'] = $paymentMethod; 
        
        $this->views->getViews($this, "pagamentCompletat", $data);
    }



}
?>