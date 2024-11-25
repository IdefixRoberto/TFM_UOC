<?php

function autoloadSQL($clase){
    //require_once serveix per verificar si l'arxiu ha estat inclos ja o no la classe, si ja ho esta no la torna a incloure, a diferencia com require
    require_once($clase.".php");
}

//implementa la funcio de carrega 
spl_autoload_register("autoload");


?>