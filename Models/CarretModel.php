

<?php

class CarretModel extends Mysql
{




    public function __construct() {
        parent::__construct();
    }

    public function selectProducto(int $idproducto) {
        $sql = "SELECT p.idproducto, p.nomproducte, p.descripcion, p.precio, p.imagen, 
                       p.jugadores, p.tempsDeJoc, p.edat, p.dificultat 
                FROM productes p
                WHERE p.idproducto = $idproducto";
        $request = $this->select($sql);
        return $request;
    }

    


}

?>