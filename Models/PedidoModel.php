<?php
class PedidoModel extends Mysql {

    public function __construct() {
        parent::__construct();
    }

    public function selectPedidos() {
        $sql = "SELECT p.idpedido, p.personaid, p.fecha, p.importe, p.tipopago, p.status, p.nomComprador,	p.cognomComprador, u.nom, u.cognoms 
                FROM pedido p
                INNER JOIN usuario u ON p.personaid = u.id
                WHERE p.status != 0";
        $request = $this->select_all($sql);
        return $request;
    }



    public function selectPedidosIVendes()
    {
        $sql = "SELECT d.idproductoDetallComanda, 
                       p.idpedido, 
                       p.fecha, 
                       c.idcategoria, 
                       c.nombre as categoria, 
                       SUM(d.subtotal) as totalVenda
                FROM detallepedido d
                INNER JOIN pedido p ON d.pedidoIDDetallComanda = p.idpedido
                INNER JOIN categoria c ON d.idproductoDetallComanda = c.idcategoria
                GROUP BY p.fecha, c.idcategoria";
        $request = $this->select_all($sql);
        return $request;
    }
    



    public function selectPedido(int $idPedido) {
        $sql = "SELECT p.idpedido, p.personaid, p.fecha, p.importe, p.tipopago, p.status, p.nomComprador,	p.cognomComprador, u.nom, u.cognoms 
                FROM pedido p
                INNER JOIN usuario u ON p.personaid = u.id
                WHERE p.idpedido = $idPedido";
        $request = $this->select($sql);
        return $request;
    }

    public function insertPedido(int $personaid, string $fecha, float $importe, int $tipopago, int $status) {
        $sql = "INSERT INTO pedido(personaid, fecha, importe, tipopago, status) VALUES(?, ?, ?, ?, ?)";
        $arrData = array($personaid, $fecha, $importe, $tipopagoid, $status);
        return $this->insert($sql, $arrData);
    }

    public function updatePedido(int $personaid, string $fecha, float $importe, int $tipopago, int $status) {
        $sql = "UPDATE pedido SET personaid = ?, fecha = ?, importe = ?, tipopago = ?, status = ? WHERE idpedido = ?";
        $arrData = array($personaid, $fecha, $importe, $tipopagoid, $status, $idPedido);
        return $this->update($sql, $arrData);
    }

    public function deletePedido(int $idPedido) {
        $sql = "UPDATE pedido SET status = 0 WHERE idpedido = ?";
        $arrData = array($idPedido);
        return $this->update($sql, $arrData);
    }
}
?>
