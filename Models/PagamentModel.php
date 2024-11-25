<?php

class PagamentModel extends Mysql
{


    public function __construct()
    {
        parent::__construct();
    }


    public function 
    inserirComanda($personaid, $fecha, $importe, $tipopago, $status, $nomComprador, $cognomComprador
    )
    {
        
            $sql = "INSERT INTO pedido (personaid, fecha, importe, tipopago, `status`,  nomComprador,  cognomComprador  ) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $arrData = array($personaid,
             $fecha, 
             $importe, 
             $tipopago, 
             $status, 
             $nomComprador, 
             $cognomComprador);
            return $this->insert($sql, $arrData);
            
    }

    public function inserirDetallComanda($idproductoDetallComanda, $pedidoIDDetallComanda, $preu, $quantitatComandaDetall,$nomproductePedidoDetall, $subtotal)
    {
        $sql = "INSERT INTO detallepedido (idproductoDetallComanda , pedidoIDDetallComanda, preu , quantitatComandaDetall, nomproductePedidoDetall, subtotal) VALUES (? , ?, ? , ?, ?, ?)";
        $arrData = array($idproductoDetallComanda, $pedidoIDDetallComanda, $preu, $quantitatComandaDetall,$nomproductePedidoDetall, $subtotal);
         

        return $this->insert($sql, $arrData);;
    }

        public function selectProducto(int $idproducto)
    {
        
        
        $sql = "SELECT p.idproducto,  p.categoriaid,  p.nomproducte, p.descripcion,  p.precio, p.stock, p.imagen,  p.status, p.reserva, p.fechaLanzamiento, p.outlet,  p.tempsDeJoc, p.jugadores, p.idioma, p.editorial, c.idcategoria, c.nombre, c.descripcion 
        FROM productes p
        INNER JOIN categoria c ON p.categoriaid = c.idcategoria
        WHERE p.idproducto = $idproducto"; 

        $request = $this->select($sql);
        
        return $request;
    }

}