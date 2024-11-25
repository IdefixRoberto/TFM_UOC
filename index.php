
    <?php
    //requerim el arxiu de la configuració
    //require_once es per que si ja està carregat no ho torna a carregar
    require_once('Config/Config.php');

    //requerim l'arxiu Helpers
    //Fique Helpers després de Config.php, ja que anem a necessitar algunes cosetes de Config.php
    require_once("Helpers/Helpers.php");
    
    //Configuració rutas amigables
    //Creem una variable url, que captura el valor de la url mitjançant el mètode GET
    //El ['url'] es el nom de la variable de l'arxiu .htaccess index.php?url
    if (!empty($_GET['url'])) {
        $url = $_GET['url'];
      } else {
        $url ='home/home';
      }

      //ara incorporem la variable url en una array
      //en una direccio hi ha dos elements importants, el controlador i el mètode.
      //En una direccio local com per exemple TFM/x/y x seria el controlador i y el mètode.
      //amb Explode, el que fem es capturar tota la direcció url i separar-la per / amb explode
      $arrayURLs = explode("/", $url);

      //creem una variable que capture la posició 0, pel que he vist en internet li solen dir controler,
      $controlador = $arrayURLs[0];
      //el mètode es la part 2 de l'array de la url
      //Com el array pot tenir una longitud 1, per exemple /producte i no tenir metode, en primer lloc es buida, i cree una validació per al cas en el que existisca metode el capture i sino que el metode sera igual que el controlador
      $metode = $arrayURLs[0];
      if(count($arrayURLs)>1  &&!empty($arrayURLs[1] && $arrayURLs[1] != '')){
        $metode = $arrayURLs[1];
      }

      
      //Cree el paràmetre per capturar-lo
      $parametre = '';
      if(count($arrayURLs)>2  && !empty($arrayURLs[2] && $arrayURLs[2] != '')){
        //la variable i comença en 2, ja que es la  posició a partir de la qual estàn els paràmetres en la posició 0 està el controlador i en la posició 1 el mètode.
        //count en php es com length  en JS
        for($i =2; $i< count($arrayURLs);$i++){
            $parametre  .= $arrayURLs[$i].',' ;
        }
        //utilitzem trim per elmiminar l'ùlti caràcter de la nostra variable parametre, que serà una coma ','
        $parametre = trim($parametre, ',');
        
      }


      //requerim l'arixu Autoload.php, per a que pugem buscar les classes
      require_once('Libraires/Core/Autoload.php');

      //requerim l'arixu Load.php, aquest arxiu el que fa es que amb la seua  funció troba els arxius php de la carpeta Controllers.
      require_once('Libraires/Core/Load.php');



      
    ?>
 


