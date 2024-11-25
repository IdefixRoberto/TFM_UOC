<?php

class Roles extends Controllers {
    // aquí va a fer referencia a l'arxiu index.php al mètode spl_autoload_register(function ($class)
    //aixina quan anem a fer la instancia farà referencia a Controllers i $class serà Controllers i aixina fa l'herencia
    public function __construct(){
        //utilitze parent per accedir i executar el mètode constructor de la nostra class
       parent::__construct();
       session_start();
       if(empty($_SESSION['login'])){
        header('Location: '.base_url().'login');
        }

        // Comprobar el rol de usuario (1 para administrador)
        if($_SESSION['userData']['rolid'] != 1) {
            // Si no es administrador, redirigir al login o una página de error
            header('Location: ' . base_url() . 'login');
            die();
        }
    }

        public function Roles()
        {
           //data va a ser un array que continga tota la informació de la pàgina web.
           $data['page_id'] = 3;//nom de la seccio
           $data['page_tag'] = 'Rols'; //es el nom que apareixerà al costat del favicon
           $data['page_title'] = 'Rols'; //es el titol del meta que tindrà aquesta url
           $data['page_name'] = 'Rols';//nom de la seccio
           $data['page_functions_js'] = 'funtions_roles.js'; //funcions que s'executaran en aquesta pàgina
           // cridem per a la pàgina principal la vista home;
            // cridem per a la pàgina principal la vista home;
           
           $this->views ->getViews($this,'roles',$data);

        }

        //Com va a capturar dades, li fique de nom getRoles()

        public function getRoles(){
            
            $arrayDades = $this -> model -> selectRoles();

            //Ara per a manipular els estatus cree un bucle for 
            for($i=0;$i<count($arrayDades); $i++){
                //ara cree una validació de si es 1 done un valor i si es 2 un altre
                if($arrayDades[$i]['status'] == 1)
                {
                    //Si es 1 esta actiu i per tant, li donem el format verd
                    $arrayDades[$i]['status'] = '<button class="btn btn-success">Actiu</button>';
                }

                else{
                    //Si no es 1 esta inactiu i per tant, li donem el format roig
                    $arrayDades[$i]['status'] = '<button class="btn btn-danger">Inactiu</button>';

                }
                //ara creem els botos per modificar o eliminar els elements
                $arrayDades[$i]['options'] = '<div class="text-center" style="white-space: nowrap;">
				<button class="btn btn-secondary btn-sm btnPermisosRol" id="btnPermisosRol" ;" rl="'.$arrayDades[$i]['idrol'].'" title="Permisos"><i class="fas fa-key"></i></button>
				<button class="btn btn-primary btn-sm btnEditRol" id="btnEditRol" onclick= "fntEditRol();" rl="'.$arrayDades[$i]['idrol'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelRol" id="btnDelRol" onclick= "fntDelRol();" rl="'.$arrayDades[$i]['idrol'].'" title="Eliminar"><i class="far fa-trash-alt"></i></button>
				</div>';

            }



            

            //ara el que fem es convertir el array en format JSON amb la funció json_encode
            echo json_encode($arrayDades, JSON_UNESCAPED_UNICODE);
            //die el que fa es finalitzar el proces
            die();


        }



        public function setRol() {
            // Capturem les variables quan son eviades al mètode POST
            $intIdrol = intval($_POST['idRol']);
            $strRol = strClean($_POST['txtNombre']);
            $strDescipcion = strClean($_POST['txtDescripcion']);
            $intStatus = intval($_POST['listStatus']);
        
            // En acabant si el id==0 vol dir que estem creant el rol, i per tant el insertem
            if ($intIdrol == 0) {
                // Crear
                $request_rol = $this->model->insertRol($strRol, $strDescipcion, $intStatus);
                $option = 1;
            } else {
                // Actualizar
                $request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescipcion, $intStatus);
                $option = 2;
            }
        
        
            // Ara analitze que faig amb request_rol, si es major a 0 es que o s'ha actualitzat o insertat el rol
            if ($request_rol > 0) {
                // Del if anterior se que option 1 es guardar nou rol i option 2 es actualitzar rol
                if ($option == 1) {
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                } else {
                    $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                }
            }
            // Si en el moment de guardar  diu que ja existeix aquest rol, ensretornara exist, i per tant toranarà el missatge de que ja existeix
            else if ($request_rol == -7) {
                $arrResponse = array('status' => false, 'msg' => '¡Atenció! El Rol ja existe.');
            }
            // Sino, voldrà dir que ens ha donat un error
            else {
                $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }
        

        
  

    //Métode per extraure un Rol
    //Aquesta funció captura el id de la base de dades
    public function getRol (int $idrol){
        //netege  per si rep alguna cosa rara de sql o script
        $intIdrol = intval(strClean($idrol));
        //valide que el id es major a 0 i per tant es vàlid
        if($intIdrol>0){
            $arrayDades = $this->model ->selectRol($intIdrol);
            if(empty($arrayDades))
            {
                $arrResponse = array ('status' => false, 'msg' => 'Dades no encontrades.'   );
            }
            else{
                $arrResponse = array ('status' => true, 'data' => $arrayDades   );
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            die();
        }
        

    }

    public function delRol()
    {

    if ($_POST) {
        
        
    
    // intval converteix a un sencer seria com un parseInt
    $intIdrol = intval($_POST['idrol']);
    
    $requestDelete = $this->model->deleteRol($intIdrol);
    print_r( $requestDelete) ;
    if ($requestDelete == 'ok') {
    $arrayDades = array('status' => true, 'msg' => "S'ha eliminat el rol");
    } else if ($requestDelete == 'exist') {
    $arrayDades = array('status' => false, 'msg' => 'No ha estat possible eliminar el Rol');
    } else {
    $arrayDades = array('status' => false, 'msg' => 'Error al eliminar el Rol.');
    }
    die();
    echo json_encode($arrayDades, JSON_UNESCAPED_UNICODE);
    
    }
    
    die();
    
    }


    public function getSelectRoles(){
        $htmlOptions = "";
        $arrData = $this->model->selectRoles();

        if(count($arrData) >0){
            for($i =0; $i< count($arrData); $i++){
                $htmlOptions .= '<option value= "'.$arrData[$i]['idrol'].'">'.$arrData[$i]['nombre_rol'].'</option>';
            }
        }

        echo $htmlOptions;
        die();
    }

    





           
        }






?>