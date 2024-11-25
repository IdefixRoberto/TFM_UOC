<?php
class Pedido extends Controllers {

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

    public function pedido() {
        $data['page_tag'] = "Comandes";
        $data['page_title'] = "Comandes realitzades";
        $data['page_name'] = "Comandes";
        $data['page_functions_js'] = "functions_pedido.js";
        $this->views->getViews($this, "pedido", $data);
    }

    public function getPedidos() {
        $arrData = $this->model->selectPedidos();
        for ($i = 0; $i < count($arrData); $i++) {
            // Estat
            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="badge badge-danger">Registrada</span>';
            } else {
                $arrData[$i]['status'] = '<span class="badge badge-success">Processada</span>';
            }

            // Botons de vore i eliminar
            $arrData[$i]['options'] = '
                <div class="text-center">
                    <button class="btn btn-secondary btn-sm btnViewPedido" ped="' . $arrData[$i]['idpedido'] . '" title="Ver"><i class="fas fa-eye"></i></button>
                </div>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getselectPedidosIVendes()
    {
        $arrData = $this->model->selectPedidosIVendes();
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    



    public function getPedido(int $idPedido) {
        $arrData = $this->model->selectPedido($idPedido);
        if (empty($arrData)) {
            $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
        } else {
            $arrResponse = array('status' => true, 'data' => $arrData);
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>
