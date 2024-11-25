<?php
    // aquí va a fer referencia a l'arxiu index.php al mètode spl_autoload_register(function ($class)
    //aixina quan anem a fer la instancia farà referencia a Controllers i $class serà Controllers i aixina fa l'herencia
    class Usuarios extends Controllers {

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

        public function Usuarios()
        {
           //data va a ser un array que continga tota la informació de la pàgina web.
           $data['page_tag']='Usuarios'; //es el nom que apareixerà al costat del favicon
           $data['page_title'] = 'Usuaris <small> Tenda Virtual</small>'; //es el titol del meta que tindrà aquesta url
           $data['page_name'] = 'usuarios';//nom de la seccio
           $data['page_functions_js'] = 'funtions_usarios.js'; //funcions que s'executaran en aquesta pàgina
            // cridem per a la pàgina principal la vista home;
           
           $this->views ->getViews($this,'usuarios',$data);

        }

        public function setUsuario() {
            if ($_POST) {
                try {
                    // Validació en el back-end
                    if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) 
                        || empty($_POST['txtEmail']) || empty($_POST['txtTelefono']) || empty($_POST['listRolid'])) {
                        throw new Exception('Faltan campos obligatorios');
                    }
        
                    // Capturar les dades
                    $idUsuario = intval(strClean($_POST['idUsuario']));
                    $strIdentificacion = strClean($_POST['txtIdentificacion']);
                    $strNombre = ucwords(strClean($_POST['txtNombre']));
                    $strApellido = ucwords(strClean($_POST['txtApellido']));
                    $intTelefono = intval(strClean($_POST['txtTelefono']));
                    $strEmail = strtolower(strClean($_POST['txtEmail']));
                    $intTipoId = intval(strClean($_POST['listRolid']));
                    $intStatus = intval(strClean($_POST['listStatus']));
                    $strPassword = strClean($_POST['txtPassword']);
        
                    if($idUsuario == 0) {
                        $opcio = 1;
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
                    } else {
                        $opcio = 2;
                        if(empty($strPassword)) {
                            // Actualització sense contrasenya
                            $request_user = $this->model->updateUsuario(
                                $idUsuario,  // id passa com primer parametre
                                $strIdentificacion,
                                $strNombre,
                                $strApellido,
                                $intTelefono,
                                $strEmail,
                                $intTipoId,
                                $intStatus
                            );
                        } else {
                            // Actualització amb contrasenya
                            $request_user = $this->model->updateUsuario(
                                $idUsuario,
                                $strIdentificacion,
                                $strNombre,
                                $strApellido,
                                $intTelefono,
                                $strEmail,
                                $intTipoId,
                                $intStatus,
                                hash("SHA256",$strPassword) // Passar la contrasenya xifrada
                            );
                        }
                    }
        
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
        
        

        public function getUsuario(int $idUsuario) {

            $id = intval(strClean($idUsuario));
            if($id > 0) {
                $arrData = $this->model->selectUsuario($id);
                if(empty($arrData)) {
                    $arrResponse = array('status' => false, 'msg' => 'Dades no trobades.');
                } else {
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();


        }
        public function getUsuarios() {
            $arrData = $this->model->selectUsuarios();
            for($i=0; $i<count($arrData); $i++) {
                if($arrData[$i]['status'] == 1) {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Actiu</span>';
                } else {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactiu</span>';
                }
        
                // Genera els botons d'acció en una sola línia sense salts de línia ni caràcters d'escape
                $arrData[$i]['options'] = '<div class="text-center">' .
                    '<button class="btn btn-secondary btn-sm btnViewUsuario" us="'.$arrData[$i]['id'].'" title="Permisos" type="button" ><i class="fas fa-eye"></i></button>' .
                    '<button class="btn btn-primary btn-sm btnEditUsuario" us="'.$arrData[$i]['id'].'" title="Editar" type="button"><i class="fas fa-pencil-alt"></i></button>' .
                    '<button class="btn btn-danger btn-sm btnDelUsuario" us="'.$arrData[$i]['id'].'" title="Eliminar" type="button"><i class="fas fa-trash-alt"></i></button>' .
                    '</div>';
            }
        
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function delUSuario() {

            
            if ($_POST) {
                if(empty($_POST['idUsuario'])) {
                    $arrResponse = array('status' => false, 'msg' => 'Dades buides');
                } else {
                    
                   
                    $intUsuario = intval($_POST['idUsuario']);
                    $requestDelete = $this->model->deleteUsuario($intUsuario);

                    
                    if($requestDelete === 'ok') {
                        $arrResponse = array('status' => true, 'msg' => 'S\'ha eliminat l\'usuari');
                    } else {
                        $arrResponse = array('status' => false, 'msg' => 'Error en les dades');
                    }
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }  
   
   
   
    }





    ?>
