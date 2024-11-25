<?php 

	class PermisosModel extends Mysql
	{
		public $intIdpermiso;
		public $intRolid;
		public $intModuloid;
		public $r;
		public $w;
		public $u;
		public $d;

		private $intIdPermiso;
		private $intRolId;
		private $intModuloId;
		private $intRead;
		private $intWrite;
		private $intDelete;
		private $intUpdate;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectModulos()
		{
			$sql = "SELECT * FROM modulo WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
		}	
		
		public function selectPermisosRol(int $idrol)
		{
			$this->intRolid = $idrol;
			$sql = "SELECT * FROM permisos WHERE rolid = $this->intRolid";
			$request = $this->select_all($sql);
			return $request;
		}

		public function deletePermisos(int $idrol)
		{
			$this->intRolid = $idrol;
			$sql = "DELETE FROM permisos WHERE rolid = $this->intRolid";
			$request = $this->delete($sql);
			return $request;
		}

		public function insertPermisos(int $idrol, int $idmodulo, int $r, int $w, int $u, int $d){
			$this->intRolid = $idrol;
			$this->intModuloid = $idmodulo;
			$this->r = $r;
			$this->w = $w;
			$this->u = $u;
			$this->d = $d;
			$query_insert  = "INSERT INTO permisos(rolid,moduloid,r,w,u,d) VALUES(?,?,?,?,?,?)";
        	$arrData = array($this->intRolid, $this->intModuloid, $this->r, $this->w, $this->u, $this->d);
        	$request_insert = $this->insert($query_insert,$arrData);		
	        return $request_insert;
		}

		public function selectPermisosRoliUsuaris() {
			$sql = "SELECT  u.nom, u.cognoms, r.nombre_rol, p.r, p.w, p.d, p.u 
					FROM permisos p
					INNER JOIN usuario u ON u.rolid = p.rolid
					INNER JOIN rol r ON r.idrol = p.rolid";
				
			$request = $this->select_all($sql);
			return $request;
		}
	
		
	
		
	}
 ?>