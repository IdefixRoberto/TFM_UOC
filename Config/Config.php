<?php
//En aquest arxiu anem a declarar varaibles constants com el cons de JS
   //Creem les constants per indicar, la direcció on està el projecte, la llibreria i la vista.
    const BASE_URL = 'http://localhost/TFM/';
    const LIBS = 'Libraires/';
    const VIEWS = 'Views/';

//creem les variables per a conectarnos a la base de dades

const DB_HOST = "localhost"; // Nom del nostre servidor
const DB_USER = "root"; //Nom del nostre usuari
const DB_PASSWORD = ""; //Contrasenya per conectar
const DB_NAME= "db_TFM"; //Nom de la base de dades
const DB_CHARSET = "charset=utf8"; //S'utilitza per a les instruccions de SQL

//Separador per als decimals, utlitzat en el Helper

const SPD = ',';
const SPM= '.';

//Simbol de la moneda

const SMONEY ="€";

//Zona horaria

date_default_timezone_set('Europe/Madrid');


?>