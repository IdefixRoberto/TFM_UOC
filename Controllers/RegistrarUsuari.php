<?php
    // aquí va a fer referencia a l'arxiu index.php al mètode spl_autoload_register(function ($class)
    //aixina quan anem a fer la instancia farà referencia a Controllers i $class serà Controllers i aixina fa l'herencia
    class RegistrarUsuari extends Controllers {

        public function __construct(){
            //utilitze parent per accedir i executar el mètode constructor de la nostra class
           
            session_start();
            if(!empty($_SESSION['login'])){
                header('Location: '.base_url().'index');
            }
        //utilitze parent per accedir i executar el mètode constructor de la nostra class
           parent::__construct();
        

        }

        public function RegistrarUsuari()
        {
           //data va a ser un array que continga tota la informació de la pàgina web.
           $data['page_tag']='Registre Usuaris'; //es el nom que apareixerà al costat del favicon
           $data['page_title'] = 'Registrar Usuaris'; //es el titol del meta que tindrà aquesta url
           $data['page_name'] = 'Registrar Usuari';//nom de la seccio
           $data['page_functions_js'] = 'functions_registreUsuaris.js'; //funcions que s'executaran en aquesta pàgina
            // cridem per a la pàgina principal la vista home;
           
           $this->views ->getViews($this,'registrarUsuari',$data);

        }

        public function setUsuario() {
            if ($_POST) {
                try {
                    // Validació en el back-end
                    if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) 
                        || empty($_POST['txtEmail']) || empty($_POST['txtTelefono']) || empty($_POST['txtPassword'])) {
                        throw new Exception('Faltan campos obligatorios');
                    }
        

                    $strIdentificacion = strClean($_POST['txtIdentificacion']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $strApellido = ucwords(strClean($_POST['txtApellido']));
                    $intTelefono = intval(strClean($_POST['txtTelefono']));
                    $strEmail = strtolower(strClean($_POST['txtEmail']));
                    $intTipoId = intval(6);
                    $intStatus = intval(1);
                    $strPassword = strClean($_POST['txtPassword']);
        
                    
                        // Comprovar si l'usuari ja existeix
                        $request_user = $this->model->insertUsuario(
                            $strIdentificacion,
                            $strNombre,
                            $strApellido,
                            $intTelefono,
                            $strEmail,
                            $intTipoId,
                            $intStatus,
                            hash("SHA256",$strPassword)
                        );
                    
                    
        
                    if ($request_user === 'exist') {
                        $arrResponse = array('status' => false, 'msg' => 'El correu electrònic o la identificació ja existeixen!');
                    } else if ($request_user > 0) {
                        $arrResponse = array("status" => true, 'msg' => 'Dades guardades correctament');
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'No ha estat possible emmagatzemar les dades!');
                    }
        
                } catch (Exception $e) {
                    $arrResponse = array('status' => false, 'msg' => $e->getMessage());
                }
        
                // Retornar les dades en format JSON
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }
   
    }

    ?>
