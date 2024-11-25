<?php
    //cridem al arxiu Autoload.php per a tenir les classes i instancies
    require_once("Autoload.php");

    //Creem un objecte per a crear usuaris i utilitzem la class Usuario
    $objUsuari = new Usuario();
    //Insertem usuari cridem a insertarUsuari de la classe Usuario
   // $insert = $objUsuari -> instertarUsuari('Idefix','Roberto Sanchez', 'idefix@hola.com','x', '2023/05/12', true, 'Gos' );
   // echo $insert;
      
   //Eliminar registres
   $eliminarID = $objUsuari-> deluser(2);


    //per a modificar les dades d'un usuari
    $updateUsert = $objUsuari-> updateUsert(1,'Salvatore','Peiró', 'peipal@uoc.edu','x', '1982/05/1982', true, 'Home' );
    print_r($updateUsert);

    
    // Extraure tots els registres
     $userts = $objUsuari-> getUsuarios();
     print_r($userts);

    // Extraure les dades d'un id concret
    $buscarID = $objUsuari-> getUsert(1);
    print_r($buscarID);


?>