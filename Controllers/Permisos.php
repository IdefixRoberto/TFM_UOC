<?php
    // aquí va a fer referencia a l'arxiu index.php al mètode spl_autoload_register(function ($class)
    //aixina quan anem a fer la instancia farà referencia a Controllers i $class serà Controllers i aixina fa l'herencia
    class Permisos extends Controllers {
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

        public function getPermisosRol(int $idrol){

            $rolid = intval($idrol);
            
            //Si el id es major a 0 vol dir que el id es vàlit
            if($rolid > 0)
            {
                $arrModuls = $this->model->selectModulos();
                
                $arrPermisosRol = $this->model->selectPermisosRol($rolid);

                // Inicialitze el valor dels permisos per a cada usuari, per a poder actualitzar-los
                // r = Llegir 
                // w = escriure
                // u = Actualitzar
                // d = Eliminar
               
                $arrPermisos = array ('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);
                $arrPermisoRol = array('idrol' => $rolid);
               
                 if(empty($arrPermisosRol))
                {
                    //Si esta buit recorre tots els Rols de permisos
                    for($i=0; $i < count($arrModuls); $i++)
                    {
                        $arrModuls[$i]['permisos'] = $arrPermisos;
                    }

                    
                }
                           

                //else per a actualitzar el valor dels permisos
                else{
                    for($i = 0; $i < count($arrModuls); $i++)
                    {
                        $arrPermisos = array
                        //Ara capturem per a cada posició de l'array el valor que porte 
                                    ('r' => $arrPermisosRol[$i]['r'], 
                                    'w' => $arrPermisosRol[$i]['w'], 
                                    'u' => $arrPermisosRol[$i]['u'], 
                                    'd' => $arrPermisosRol[$i]['d']
                                    );

                        //Aquesta validació servix per a validar que coincideix el id de la taula permisos amb la de modul
                        if($arrModuls[$i]['idmodulo'] == $arrPermisosRol[$i]['moduloid'])
                        {
                            $arrModuls[$i]['permisos'] = $arrPermisos;
                        }
                        

                        
                    }
                    
                }
                
              
                
               $arrPermisoRol['modulos'] = $arrModuls;
               
                // aço el que indica que seria la resposta que tornarà al AJAX
                //El que fa amb getModal es anar a C:\xampp\htdocs\TFM\Models i capturar o agafar l'arxiu Models/Permisos.php

                $html = getModal("modalPermisos",$arrPermisoRol);
               
               
            }

            die();



        
         }
        
         public function permisos() {
            $data['page_tag'] = 'Permisos';
            $data['page_title'] = 'Permisos <small> Administració</small>';
            $data['page_name'] = 'permisos';
            $data['page_functions_js'] = 'functions_permisos.js';
            $this->views->getViews($this, "permisos", $data);
        }

        public function getPermisosRoliUsuaris() {
            $arrData = $this->model->selectPermisosRoliUsuaris();
           
        
            for ($i = 0; $i < count($arrData); $i++) {
                $arrData[$i]['r'] = $arrData[$i]['r'] ? 'Lectura' : '';
                $arrData[$i]['w'] = $arrData[$i]['w'] ? 'Escriptura' : '';
                $arrData[$i]['d'] = $arrData[$i]['d'] ? 'Esborrar' : '';
                $arrData[$i]['u'] = $arrData[$i]['u'] ? 'Actualitzar' : '';
            }
        
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            die();
        }
        

   
        
        
        
         public function setPermisos()
         {
            //Cree un if per verificar que realment s'ha enviat per post la informació
             if($_POST)
             {
                    //M'assegure que siga un ParseInt el valor de idrol
                 $intIdrol = intval($_POST['idrol']);
                 //capture del array del post el subarray que conte modulos
                 $modulos = $_POST['modulos'];
                 // de \Models\PermisosModel.php prove deletePermisos
                 $this->model->deletePermisos($intIdrol);

                 //Cree un for per recorrer tot el array com si fos un for in per donar-li valor 0 o 1 a cada camp
                 foreach ($modulos as $modulo) {
                     $idModulo = $modulo['idmodulo'];
                     $r = empty($modulo['r']) ? 0 : 1;
                     $w = empty($modulo['w']) ? 0 : 1;
                     $u = empty($modulo['u']) ? 0 : 1;
                     $d = empty($modulo['d']) ? 0 : 1;

                     //Retorne els valors a una variable amb la funcio que trobem a \Models\PermisosModel.php
                     $requestPermiso = $this->model->insertPermisos($intIdrol, $idModulo, $r, $w, $u, $d);
                 }
                 //Ara, si el valor de request es major de 0 vol dir que te alguna cosa, i per tant, s'ha capturat de forma correcta el valor
                 if($requestPermiso > 0)
                 {
                     $arrResponse = array('status' => true, 'msg' => 'Permisos assignats correctament.');
                 }
                 //Pel contrari vol dir que hi ha un error
                 else{
                     $arrResponse = array("status" => false, "msg" => 'No ha estat possible assignar els permisos, torne ha intentar-ho');
                 }

                 //Capture les dades en format JSON;
                 echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
             }
             die();
         }
 
 
     }

			

?>

