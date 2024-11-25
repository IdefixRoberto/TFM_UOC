
<?php

class AmeritrashModel extends Mysql
{
    private $intIdUsuario;
    private $strUsuario;
    private $strPassword;
    private $strToken;

    public function __construct()
    {
        parent::__construct();
    }

    // Obtenir tots els productes amb el nom de la categoria
    public function selectProductos()
    {
        $sql = "SELECT p.idproducto,p.oferta,   p.categoriaid,  p.nomproducte, p.descripcion,  p.precio, p.stock, p.imagen,  p.status, p.reserva, p.fechaLanzamiento, p.outlet,  p.tempsDeJoc, p.jugadores, p.idioma, p.editorial, c.idcategoria, c.nombre, c.descripcion 
                FROM productes p
                INNER JOIN categoria c ON p.categoriaid = c.idcategoria
                WHERE p.categoriaid = 1
                ORDER BY RAND()";
        $request = $this->select_all($sql);
        return $request;
    }


    // Obtenir els detalls d'un producte
    public function selectProducto(int $idproducto)
    {
    
        $sql = "SELECT p.idproducto,p.oferta,   p.categoriaid,  p.nomproducte, p.descripcion,  p.precio, p.stock, p.imagen,  p.status, p.reserva, p.fechaLanzamiento, p.outlet,  p.tempsDeJoc, p.jugadores, p.idioma, p.editorial, c.idcategoria, c.nombre, c.descripcion 
        FROM productes p
        INNER JOIN categoria c ON p.categoriaid = c.idcategoria
        WHERE p.idproducto = $idproducto"; 

        $request = $this->select($sql);
        
        return $request;
    }


}
?>