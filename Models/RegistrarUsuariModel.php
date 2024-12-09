<?php
class RegistrarUsuariModel extends Mysql {

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
        string $intTipoId = '6',
        string $intStatus = '1',
        string $strPassword,
    ){
        $this->strIdentificacion = $strIdentificacio;
        $this->strNombre = $strNombre;
        $this->strApellido = $strApellido;
        $this->intTelefono = $intTelefono;
        $this->strEmail = $strEmail;

        $this->intTipoId = '6';
        $this->intStatus ='1';
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
    
}
 
?>