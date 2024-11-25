<?php 

	class RolesModel extends Mysql
	{

        //Declare les variables primer, com ho feia en l'assignatura d'angular
		public $intIdrol;
		public $strRol;
		public $strDescripcion;
		public $intStatus;

        //cree el constructor com ho feia en angular també
		public function __construct()
		{
			parent::__construct();
		}

//faig les diferents funcions que necessite


//Funcion per seleccionar tots els rols
		public function selectRoles()
		{
			//declare la setencio SQL
			$sql = "SELECT * FROM rol WHERE status != 0";

            //Cride a la llibreri MySQL 
			$request = $this->select_all($sql);
			return $request;
		}

        //Funcio per buscar un rol concret

		public function selectRol(int $idrol)
		{
			//BUSCAR el Rol
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM rol WHERE idrol = $this->intIdrol";
			$request = $this->select($sql);
			return $request;
		}


        //Per a insertar rols
		public function insertRol(string $rol, string $descripcion, int $status){

			$return = "";
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM rol WHERE nombre_rol = '{$this->strRol}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO rol(nombre_rol,descripcion,status) VALUES(?,?,?)";
	        	$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

        //Per a actualitzar rols
		
		public function updateRol(int $idrol, string $rol, string $descripcion, int $status){
			$this->intIdrol = $idrol;
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM rol WHERE nombre_rol = '$this->strRol' AND idrol != $this->intIdrol";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE rol SET nombre_rol = ?, descripcion = ?, status = ? WHERE idrol = $this->intIdrol ";
				$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

        //Funcio per a eliminar rols
		public function deleteRol(int $idrol)
		{
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM usuario WHERE rolid = $this->intIdrol";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE rol SET status = ? WHERE idrol = $this->intIdrol ";
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
	}
 ?>