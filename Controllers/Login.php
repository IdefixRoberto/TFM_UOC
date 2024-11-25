<?php
    // aquí va a fer referencia a l'arxiu index.php al mètode spl_autoload_register(function ($class)
    //aixina quan anem a fer la instancia farà referencia a Controllers i $class serà Controllers i aixina fa l'herencia
    class login extends Controllers {
        public function __construct(){
        
            
            session_start();
            if(!empty($_SESSION['login'])){
                header('Location: '.base_url().'index');
            }
        //utilitze parent per accedir i executar el mètode constructor de la nostra class
           parent::__construct();
        }

        public function login()
        {
           //data va a ser un array que continga tota la informació de la pàgina web.
           $data['page_tag']='Login - Tenda Virual'; //es el nom que apareixerà al costat del favicon
           $data['page_title'] = 'Login'; //es el titol del meta que tindrà aquesta url
           $data['page_name'] = 'login';//nom de la seccio
           $data['page_functions_js'] = 'funcio_login.js';//
            // cridem per a la pàgina principal la vista home;
            
           $this->views ->getViews($this,'login',$data);
                
        }
        
        public function loginUser(){
            if($_POST){
                if(empty($_POST['txtEmail']) || empty($_POST['txtpassword']))
                {
                    //Si el camp email o password està buit retornarà un error
                    $arrResponse = array('status' => false, 'msg' => 'Error de dades');
                }
                
                else{
                    // usuari el que fem es pasar a minuscula el que ens arriba per a que no hi haja problemes amb les mayusculas
                    $strUsuario = strtolower(strClean($_POST['txtEmail']));
                    //Encripte la contrasenya amb SHA256 igual que en la base de dades
                    $strPassword = hash("SHA256", $_POST['txtpassword']);
                    //Cride al mètode loginUser de la nostra class model
                    $request_user = $this->model->ModalloginUser($strUsuario, $strPassword);
                    if(empty($request_user)){
                        $arrResponse = array('status' => false, 'msg' => 'El usuari o la contrasenya son incorrectes');
                    }

                    else if($request_user['status'] == 0){
                        $arrResponse = array('status' => false, 'msg' => 'Aquest usuari està donat de baixa');
                    }

                    else if($request_user['status'] == 2){
                        $arrResponse = array('status' => false, 'msg' => 'Aquest usuari està inactiu');
                    }

                    else{
                        $arrData = $request_user;
                        if($arrData['status'] == 1){
                            $_SESSION['idUser'] = $arrData['id'];
                            $_SESSION['page'] = 'Index';
                            $_SESSION['login'] = true;
                            $arrData = $this->model->ModalsessionLogin($_SESSION['idUser']);
                            $_SESSION['userData'] = $arrData;
                           
                            
                            $arrResponse = array('status' => true, 'msg' => 'ok');
                    }
                    
                    
            }
            
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
        }

        public function sessionLogin(int $intIdUsuario){
            $arrData = $this->model->ModalsessionLogin($intIdUsuario);
            if(empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Dades no trobades.');
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }
}
?>