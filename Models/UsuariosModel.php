<?php
class UsuariosModel extends Mysql {
    private $intIdUsuario;
    private $strIdentificacion;
    private $strNombre;
    private $strApellido;
    private $intTelefono;
    private $strEmail;
    private $strPassword;
    private $strToken;
    private $intTipoId;
    private $intStatus;

    public function __construct(){
        parent::__construct();
    }

    public function insertUsuario(
        string $strIdentificacio,
        string $strNombre,
        string $strApellido,
        string $intTelefono,
        string $strEmail,
        string $intTipoId,
        string $intStatus,
        string $strPassword,
    ){
        $this->strIdentificacion = $strIdentificacio;
        $this->strNombre = $strNombre;
        $this->strApellido = $strApellido;
        $this->intTelefono = $intTelefono;
        $this->strEmail = $strEmail;

        $this->intTipoId = $intTipoId;
        $this->intStatus = $intStatus;
        $this->strPassword = $strPassword;
        $return = 0;

        // Comprovar si el correu electrònic o la identificació ja existeixen
        $sql = "SELECT * FROM usuario WHERE email = '{$this->strEmail}' OR identificacio = '{$this->strIdentificacion}'";
        $request = $this->select_all($sql);

        if(empty($request)){
            $query_insert = "INSERT INTO usuario(identificacio, nom, cognoms, telefono, email, rolid, `status`, contrasenya) VALUES(?,?,?,?,?,?,?,?)";
            $arrData = array(
                $this->strIdentificacion,
                $this->strNombre,
                $this->strApellido,
                $this->intTelefono,
                $this->strEmail,
                $this->intTipoId,
                $this->intStatus,
                $this->strPassword
            );

            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }

        return $return;
    }


    public function selectUsuarios()
    {
        $sql = "SELECT p.id, p.identificacio, p.nom, p.cognoms, p.telefono, p.email, p.rolid, p.estat, p.status, p.contrasenya, p.sexe, p.toke, r.idrol, r.nombre_rol
        FROM usuario p 
        INNER JOIN rol r 
        ON p.rolid = r.idrol 
        WHERE p.status !=0";
        $request = $this-> select_all(($sql));
        return $request;
    
    } 

    public function selectUsuario(int $val)
    {
        $this->intIdUsuario = $val;
        $sql = "SELECT p.id, p.identificacio, p.nom, p.cognoms, p.telefono, p.email, p.rolid, p.estat, p.status, p.contrasenya, p.sexe, p.toke, r.idrol, r.nombre_rol
        FROM usuario p 
        INNER JOIN rol r 
        ON p.rolid = r.idrol 
        WHERE p.id = $this->intIdUsuario";
        $request = $this-> select($sql);
        return $request;
    } 



    public function deleteUsuario(int $idUsuario)
    {
        $this->intIdUsuario = $idUsuario;
        //S'actualitza i no es borra ja que no es recomanable i es pot perdre la integritat de la base de dades
        $sql = "UPDATE usuario SET status = ? WHERE id = $this->intIdUsuario";
        $arrData = array(0);
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function updateUsuario(
        int $idUsuario, 
        string $strIdentificacion, 
        string $strNombre, 
        string $strApellido, 
        string $intTelefono, 
        string $strEmail, 
        string $intTipoId, 
        string $intStatus, 
        ?string $strPassword = null 
    ) {
        $this->intIdUsuario = $idUsuario;
        $this->strIdentificacion = $strIdentificacion;
        $this->strNombre = $strNombre;
        $this->strApellido = $strApellido;
        $this->intTelefono = $intTelefono;
        $this->strEmail = $strEmail;
        $this->intTipoId = $intTipoId;
        $this->intStatus = $intStatus;
    
        // Validació de correu electrònic i identificació
        $sql = "SELECT * FROM usuario WHERE email = '{$this->strEmail}' AND id != $this->intIdUsuario 
                OR identificacio = '{$this->strIdentificacion}' AND id != $this->intIdUsuario";
        $request = $this->select_all($sql);
    
        if (empty($request)) {
            if ($strPassword) {
                // Si el password existeix, l'actualitzem també
                $sql = "UPDATE usuario SET identificacio = ?, nom = ?, cognoms = ?, telefono = ?, email = ?, 
                        rolid = ?, status = ?, contrasenya = ? WHERE id = $this->intIdUsuario";
                $arrData = array(
                    $this->strIdentificacion,
                    $this->strNombre,
                    $this->strApellido,
                    $this->intTelefono,
                    $this->strEmail,
                    $this->intTipoId,
                    $this->intStatus,
                    $strPassword // Assegura't d'actualitzar només si el password està definit
                );
            } else {
                // Actualització sense contrasenya
                $sql = "UPDATE usuario SET identificacio = ?, nom = ?, cognoms = ?, telefono = ?, email = ?, 
                        rolid = ?, status = ? WHERE id = $this->intIdUsuario";
                $arrData = array(
                    $this->strIdentificacion,
                    $this->strNombre,
                    $this->strApellido,
                    $this->intTelefono,
                    $this->strEmail,
                    $this->intTipoId,
                    $this->intStatus
                );
            }
    
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        
        return $request;
    }
    
}
 
?>