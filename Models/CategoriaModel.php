<?php
class CategoriaModel extends Mysql {

    public function __construct() {
        parent::__construct();
    }

    public function insertCategoria(string $nombre, string $descripcion, int $status) {
        // Capturar la data actual amb hora en format d-m-Y
        $currentDate = date('d-m-Y');  // Format complet compatible amb DATETIME
        
        // Transforme la data al format Y-m-d per emmagatzemar-la en la base de dades
        $formattedDate = date('Y-m-d', strtotime($currentDate));
        
        // Modifique la consulta per incloure 'datecreated'
        $query_insert = "INSERT INTO categoria(nombre, descripcion, status, datecreated) VALUES(?, ?, ?, ?)";
        
        // Afegir la data a l'array de dades
        $arrData = array($nombre, $descripcion, $status, $formattedDate);
        
        return $this->insert($query_insert, $arrData);
    }
    
    

    public function updateCategoria(int $id, string $nombre, string $descripcion, int $status) {
        $sql = "UPDATE categoria SET nombre = ?, descripcion = ?, status = ? WHERE idcategoria = $id";
        $arrData = array($nombre, $descripcion, $status);
        return $this->update($sql, $arrData);
    }

    public function selectCategorias() {
        $sql = "SELECT * FROM categoria WHERE status != 0";
        $result = $this->select_all($sql);
    
        // Transforme la data al format d-m-Y per a cada registre
        foreach ($result as &$row) {
            $row['datecreated'] = date('d-m-Y', strtotime($row['datecreated']));
        }
    
        return $result;
    }

        // Funció per seleccionar una categoria específica per ID
        public function selectCategoria(int $idCategoria) {
            $sql = "SELECT * FROM categoria WHERE idcategoria = $idCategoria";
            return $this->select($sql);
        }

    // Funció per a eliminar categories
public function deleteCategoria(int $idCategoria)
{
    // Guarde l'ID de la categoria
    $this->intIdCategoria = $idCategoria;

    // Comprove si la categoria està associada amb algun producte
    $sql = "SELECT * FROM productes WHERE categoriaid = $this->intIdCategoria";
    $request = $this->select_all($sql);

    // Si no hi ha productes associats
    if (empty($request)) {
        // Actualitze l'estat de la categoria per marcar-la com eliminada (status = 0)
        $sql = "UPDATE categoria SET status = ? WHERE idcategoria = $this->intIdCategoria";
        $arrData = array(0); // El status 0 indica que la categoria està eliminada
        $request = $this->update($sql, $arrData);

        // Comprove si l'actualització ha tingut èxit
        if ($request) {
            $request = 'ok';
        } else {
            $request = 'error';
        }
    } else {
        // Si hi ha productes associats, no es pot eliminar la categoria
        $request = 'exist';
    }

    return $request;
}

}
?>
