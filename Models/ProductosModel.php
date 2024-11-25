<?php
class ProductosModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    // Obtenir tots els productes amb el nom de la categoria
    public function selectProductos()
    {
        $sql = "SELECT p.idproducto, p.oferta,  p.categoriaid,  p.nomproducte, p.descripcion,  p.precio, p.stock, p.imagen,  p.status, p.reserva, p.fechaLanzamiento, p.outlet,  p.tempsDeJoc, p.jugadores, p.idioma, p.editorial, c.idcategoria, c.nombre
                FROM productes p
                INNER JOIN categoria c ON p.categoriaid = c.idcategoria";
        $request = $this->select_all($sql);
        return $request;
    }


// Obtenir els detalls d'un producte
public function selectProducto(int $idproducto)
{
    
    $sql = "SELECT p.idproducto,  p.oferta,   p.categoriaid,  p.nomproducte, p.descripcion,  p.precio, p.stock, p.imagen,  p.status, p.reserva, p.fechaLanzamiento, p.outlet,  p.tempsDeJoc, p.jugadores, p.idioma, p.editorial, c.idcategoria, c.nombre
    FROM productes p
    INNER JOIN categoria c ON p.categoriaid = c.idcategoria
    WHERE p.idproducto = $idproducto"; 

    $request = $this->select($sql);
    
    return $request;
}


    public function selectCategories()
    {
        $sql = "SELECT idcategoria, nombre FROM categoria WHERE status = 1";
        $request = $this->select_all($sql);
        
        if ($request && count($request) > 0) {
            return $request; // Si hi ha categories, les retorna
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'No se encontraron categorías']);
            exit();
        }
    }
    

    

    public function deleteProducte(int $idproducto)
    {
        $this->intidproducto = $idproducto;
        $sql = "SELECT * FROM productes WHERE idproducto = $this->idproducto";
        $request = $this->select_all($sql);
        if(empty($request))
        {
            $sql = "UPDATE productes SET status = ? WHERE idproducto = $this->idproducto ";
            $arrData = array(0);
            $request = $this->update($sql,$arrData);
            if($request)
            {
                $request = 'ok';	
            }else{
                $request = 'error';
            }
        }else{
            $request = 'exist';
        }
        return $request;
    }










    
    public function updateProducto(
        int $idproducto, 
        int $listcategory, 
        string $txtnomproducte, 
        string $txtdescripcion, 
        float $numpreu, 
        int $numstock, 
        string $txtimatge, 
        int $listStatus, 
        int $listreserva, 
        string $dateLlancament, 
        int $listOulet, 
        int $numtempsDeJoc, 
        int $numjugadors, 
        string $txtidioma, 
        string $txteditorial
    ) {
        // Assignar els valors a les propietats de l'objecte
        $this->idproducto = $idproducto;
        $this->listcategory = $listcategory;
        $this->txtnomproducte = $txtnomproducte;
        $this->txtdescripcion = $txtdescripcion;
        $this->numpreu = $numpreu;
        $this->numstock = $numstock;
        $this->txtimatge = $txtimatge;
        $this->listStatus = $listStatus ;
        $this->listreserva = $listreserva ;
        $this->dateLlancament = $dateLlancament;
        $this->listOulet = $listOulet ;
        $this->numtempsDeJoc = $numtempsDeJoc;
        $this->numjugadors = $numjugadors;
        $this->txtidioma = $txtidioma;
        $this->txteditorial = $txteditorial;
    
        // Consulta d'actualització
        $sql = "UPDATE productes SET 
                    categoriaid = ?, 
                    nomproducte = ?, 
                    descripcion = ?, 
                    precio = ?, 
                    stock = ?, 
                    imagen = ?, 
                    status = ?, 
                    reserva = ?, 
                    fechaLanzamiento = ?, 
                    outlet = ?, 
                    tempsDeJoc = ?, 
                    jugadores = ?, 
                    idioma = ?, 
                    editorial = ?
                WHERE idproducto = ?";
    
        // Array amb les dades a actualitzar, incloent l'ID al final
        $arrData = [
            $this->listcategory, 
            $this->txtnomproducte, 
            $this->txtdescripcion, 
            $this->numpreu, 
            $this->numstock, 
            $this->txtimatge, 
            $this->listStatus, 
            $this->listreserva, 
            $this->dateLlancament, 
            $this->listOulet, 
            $this->numtempsDeJoc, 
            $this->numjugadors, 
            $this->txtidioma, 
            $this->txteditorial, 
            $this->idproducto
        ];
    
        // Executar l'actualització
        $request = $this->update($sql, $arrData);
    
        return $request;
    }

    public function insertProducte(
        int $listcategory, 
        string $txtnomproducte, 
        string $txtdescripcion, 
        float $numpreu, 
        int $numstock, 
        string $txtimatge, 
        int $listStatus, 
        int $listreserva, 
        string $dateLlancament, 
        int $listOulet, 
        int $numtempsDeJoc, 
        int $numjugadors, 
        string $txtidioma, 
        string $txteditorial
    ) {
        // Assignar els valors a les propietats de l'objecte (opcional si no són necessàries)
        $this->listcategory = $listcategory;
        $this->txtnomproducte = $txtnomproducte;
        $this->txtdescripcion = $txtdescripcion;
        $this->numpreu = $numpreu;
        $this->numstock = $numstock;
        $this->txtimatge = $txtimatge;
        $this->listStatus = $listStatus;
        $this->listreserva = $listreserva;
        $this->dateLlancament = $dateLlancament;
        $this->listOulet = $listOulet;
        $this->numtempsDeJoc = $numtempsDeJoc;
        $this->numjugadors = $numjugadors;
        $this->txtidioma = $txtidioma;
        $this->txteditorial = $txteditorial;
    
        // Consulta d'inserció
        $sql = "INSERT INTO productes (
                    categoriaid, 
                    nomproducte, 
                    descripcion, 
                    precio, 
                    stock, 
                    imagen, 
                    status, 
                    reserva, 
                    fechaLanzamiento, 
                    outlet, 
                    tempsDeJoc, 
                    jugadores, 
                    idioma, 
                    editorial
                ) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        // Array amb les dades a inserir
        $arrData = [
            $this->listcategory, 
            $this->txtnomproducte, 
            $this->txtdescripcion, 
            $this->numpreu, 
            $this->numstock, 
            $this->txtimatge, 
            $this->listStatus, 
            $this->listreserva, 
            $this->dateLlancament, 
            $this->listOulet, 
            $this->numtempsDeJoc, 
            $this->numjugadors, 
            $this->txtidioma, 
            $this->txteditorial
        ];
    
        // Executar la consulta d'inserció
        $request = $this->insert($sql, $arrData);
    
        // Retornar el resultat de la inserció
        return $request;
    }
    
    
    
    

public function deleteProducto(int $idproducto)
{
    $this->intIdproducto = $idproducto;
    $sql = "DELETE FROM productes WHERE idproducto = $this->intIdproducto";
    $request = $this->delete($sql);
    if(empty($request))
    {
        $sql = "UDPATE productes SET status = ? WHERE idproducto = $this->intIdproducto";
        $arrData = array(0);
        $request = $this->update($sql,$arrData);
        if($request)
        {
            $request = 'ok';
        }else{
            $request = 'error';
        }
    }
    else{
        $request = "existeix";
    }
    return $request;
}


}
?>