

<?php

class detallComandaModel extends Mysql
{


    public function __construct()
    {
        parent::__construct();
    }


    public function selectDetallComandaModel()
    {
        $sql = "SELECT idproductoDetallComanda,  
                pedidoIDDetallComanda,  
                preu, 
                quantitatComandaDetall,  
                nomproductePedidoDetall, 
                subtotal
                FROM detallepedido
                ";
        $request = $this->select_all($sql);

        return $request;
    }

    //Per a fer el gràfic de la quantitat de productes venuts
    public function selectUnitatsVenudes()
        {
            $sql = "SELECT nomproductePedidoDetall, SUM(quantitatComandaDetall) as totalUnitats
                    FROM detallepedido
                    GROUP BY nomproductePedidoDetall";
            $request = $this->select_all($sql);
            return $request;
        }
}