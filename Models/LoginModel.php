<?php

class LoginModel extends Mysql
{
    private $intIdUsuario;
    private $strUsuario;
    private $strPassword;
    private $strToken;

    public function __construct()
    {
        parent::__construct();
    }



        public function ModalLoginUser(string $usuario, string $password)
        {
            $this->strUsuario = $usuario;
            $this->strPassword = $password;
        
            $sql = "SELECT id, `status` FROM usuario
                    WHERE email = ? 
                    AND contrasenya = ?"; 
                    
            $arrData = array($this->strUsuario, $this->strPassword);
            $request = $this->selectSQL($sql, $arrData);
        
            return $request;
        }


        public function ModalsessionLogin(int $intIdUsuario){
            $this->intIdUsuario = $intIdUsuario;

            $sql = "SELECT u.id, u.	sexe, u.direccio, u.imatgeUsuari, u.rolid, u.nom, u.cognoms, u.status, u.email, u.telefono, r.idrol, r.nombre_rol 

                    FROM usuario u
                    INNER JOIN rol r 
                    ON u.rolid = r.idrol 
                    WHERE u.id = $this->intIdUsuario";
            $request = $this->selectSQL($sql);
            return $request;
        }


}
?>