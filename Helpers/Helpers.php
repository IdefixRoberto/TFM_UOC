<?php
    //creem una funcio per a que ens retorne la URL
    //Mitjançant aquesta funció podrem mostrar la nostra URL

     function base_url(){
        return BASE_URL;
    }

    //per a interactuar amb Assets

    function media()
    {
        return BASE_URL."Assets";
    }

    //cride al header, el footer i el nav admin de la carpeta TFM\Views\Template
    //s'inicialitza buit per evitar el error de que si no ve el controlador, ja comença sense valor

    function headerAdmin($data="")
    {
        $view_header = "Views/Template/header_admin.php";
        
        require_once($view_header);
    }

    function footerAdmin($data="")
    {
        
        $view_footer = "Views/Template/footer_admin.php";
        require_once($view_footer);
    }

    function navAdmin($data="")
    {
        $view_nav = "TFM/Views/Template/nav_admin.php";
        require_once($view_nav);
    }

    function headerInici($data="")
    {
        $view_header = "Views/Template/header_principal.php";
        
        require_once($view_header);
    }

    function footerInici($data="")
    {
        
        $view_footer = "Views/Template/footer_inici.php";
        require_once($view_footer);
    }





    //cree una funció per a formatejar el format
    //Es per no repetir el contingut de la funcio varies vegades
    function dep($data){
        $format = print_r('<pre>');
        $format = print_r($data);
        $format = print_r('</pre>');
    }

    //Aquesta funcio servirà per visualitzar els diferents modals que creem
    //Un exemple d'utilització d'aquesta funció és per a visualitzar en http://localhost/TFM//roles el desplegable al punxar el boto de + Nou

    function getModal(string $nameModal, $data){
        $view_modal = "Views/Template/Modals/{$nameModal}.php";
        require_once($view_modal);
    }




        //Elimina l'execes d'espais entre paraules, per exemple si te 4 o 5 espais.
        function strClean($strCadena){
            $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
            $string = trim($string); //Elimina espacis en blanco al inici i al final
            $string = stripslashes($string); // Elimina les \ invertides
            $string = str_ireplace("<script>","",$string);
            $string = str_ireplace("</script>","",$string);
            $string = str_ireplace("<script src>","",$string);
            $string = str_ireplace("<script type=>","",$string);
            $string = str_ireplace("SELECT * FROM","",$string);
            $string = str_ireplace("DELETE FROM","",$string);
            $string = str_ireplace("INSERT INTO","",$string);
            $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
            $string = str_ireplace("DROP TABLE","",$string);
            $string = str_ireplace("OR '1'='1","",$string);
            $string = str_ireplace('OR "1"="1"',"",$string);
            $string = str_ireplace('OR ´1´=´1´',"",$string);
            $string = str_ireplace("is NULL; --","",$string);
            $string = str_ireplace("is NULL; --","",$string);
            $string = str_ireplace("LIKE '","",$string);
            $string = str_ireplace('LIKE "',"",$string);
            $string = str_ireplace("LIKE ´","",$string);
            $string = str_ireplace("OR 'a'='a","",$string);
            $string = str_ireplace('OR "a"="a',"",$string);
            $string = str_ireplace("OR ´a´=´a","",$string);
            $string = str_ireplace("OR ´a´=´a","",$string);
            $string = str_ireplace("--","",$string);
            $string = str_ireplace("^","",$string);
            $string = str_ireplace("[","",$string);
            $string = str_ireplace("]","",$string);
            $string = str_ireplace("==","",$string);
            return $string;
        }

        //Genera unna contrasenya de 10 caràcters
        function passGenerator($length = 10){
            //inicialitze la variable password
            $password = '';
            // Com voldria que continguera una majuscula, una minuscula, un numero i un simbol com a minimo, cree 4 conjunts
                $majuscules = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $minuscules = 'abcdefghijklmnopqrstuvwxyz';
                $numeros = '0123456789';
                $simbols = '!@#$%^&*()-_=+[]{}|;:,.<>?';
                $totsCaracter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()-_=+[]{}|;:,.<>?';
                
                //Ara ordene aleatoriament la variable $totsCaracers
                str_shuffle($totsCaracter);


                //genere aleatorament un caracter per a les majuscules, un per a les minuscules...
                $caracter_maj = $majuscules[rand(0, strlen($majuscules) - 1)];
                $caracter_min = $minuscules[rand(0, strlen($minuscules) - 1)];
                $caracter_num = $numeros[rand(0, strlen($numeros) - 1)];
                $caracter_sim = $simbols[rand(0, strlen($simbols) - 1)];

                // Ara concatene els caracters anteriors al password
               
                $password =  $caracter_maj . $caracter_min . $caracter_num . $caracter_sim;
                

                for ($i = 0; $i < 6; $i++) {
                    // Seleccionem un caracter aleatori
                    $caracter_aleatori = $totsCaracter[rand(0, strlen($totsCaracter) - 1)];
                    // Añadimos el carácter aleatorio a la contraseña
                    $password .= $caracter_aleatori;
                }

                // Ara ordene aleatoriament el password, per tenir major aleatorietat
                $password = str_shuffle($password);

                

                // Barajamos de nuevo la contraseña para asegurarnos de que los caracteres obligatorios no estén en las mismas posiciones
                $password = str_shuffle($password);

                return $password;
        }

        //funcio per a generar tokens
        // un "token" es refereix a un valor únic que s'utilitza per autenticar i autoritzar les sol·licituds entre el client i el servidor.
        function token(){
            $r1 = bin2hex(random_bytes(10));
            $r2 = bin2hex(random_bytes(10));
            $r3 = bin2hex(random_bytes(10));
            $r4 = bin2hex(random_bytes(10));
            $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
            return $token;
        }

        //per a donar-li format monetari
        function formatMoney($cantidad){
            //el 2 son els decimals;
            //SPD i SPM estan en config.php
            $cantidad = number_format($cantidad,2,SPD,SPM);
            return $cantidad;
        }






?>