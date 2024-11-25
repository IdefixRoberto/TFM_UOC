<?php
    class Views{
        //Data s'iguala a '' per si no s'envia eixa informació no ens done un error.
        function getViews($controlador,$view,$data=''){
            //Capturem la classe del controlador
            $controlador = get_class($controlador);
            //Fem la validació 
            if($controlador == "Home"){
               // $view = 'Views/'.$view.'.php';
               $view = 'Views/home.php';
            }

            else{
                $view = 'Views/'.$controlador.'/'.$view.'.php';
            }

            require_once($view);
        }
    }

?>