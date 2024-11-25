<?php
    //Busquem amb aquest arxiu el controlador que es troba a la carpeta Controllers
    $controlerFile = "Controllers/".$controlador.".php";
        if(file_exists($controlerFile)){
            //require_once('Libraires/Core/Controllers.php');
            //Si existeix el controlador el requerim;
            
            require_once($controlerFile);
            //Ara instem el controlador
            $controlador = new $controlador();
            //method_exist te dos camps, el primer fa referencia al controlador i el segon al mètode
            if(method_exists($controlador, $metode)){
                $controlador->{$metode}($parametre);
                
            }

            else{
                require_once('Controllers/Error.php');

            }
        }
        else{
            require_once('Controllers/Error.php');
        }
?>