<?php

    class ModulosModel extends Mysql
	{
		public $intIdrol;
		public $strRol;
		public $strDescripcion;
		public $intStatus;
		
		public function __construct()
		{
			parent::__construct();
		}

		 public function selectModulos()
		 {
		 	$sql = "SELECT * FROM modulos WHERE status != 0";
		 	$request = $this->select_all($sql);
	        
		 	return $request;
		 }

		 public function selectModulo(int $idrol)
		 {
		 	$this->intIdrol = $idrol;
		 	$sql = "SELECT * FROM modulos WHERE idmodulo = $this->intIdrol";
		 	$request = $this->select($sql);
		 	return $request;

		 }

		

		 public function insertModulo(string $rol, string $descripcion, int $status)
		 {
		 	$return = "";
		 	$this->strRol = $rol;
		 	$this->strDescripcion = $descripcion;
		 	$this->intStatus = $status;

		 	$sql ="SELECT * FROM modulos WHERE moduTitu = '{$this->strRol}' ";
		 	$request = $this->select_all($sql);

		 	if(empty($request))
		 	{

		 	$query_insert = "INSERT INTO modulos (moduTitu,moduDesc,status) VALUES(?,?,?)";
		 	$arrData =  array($this->strRol, $this->strDescripcion, $this->intStatus);
		 	$request_insert = $this->insert($query_insert,$arrData);
		 	$return = $request_insert;
		    }else{
		    	$return = "exist";

		    }
		    return $return;
		 }

		 public function updateModulo(int $idrol, string $rol, string $descripcion, int $status)
		 {
		 	$this->intIdrol = $idrol;
		 	$this->strRol = $rol;
		 	$this->strDescripcion = $descripcion;
		 	$this->intStatus = $status;

		 	$sql ="SELECT * FROM modulos WHERE moduTitu = '$this->strRol' AND idmodulo  !=  $this->intIdrol ";
		 	$request = $this->select_all($sql);

		 	if(empty($request))
		 	{

		 	$sql = "UPDATE modulos SET moduTitu = ?, moduDesc = ?, status= ? WHERE idmodulo = $this->intIdrol";
		 	$arrData =  array($this->strRol, $this->strDescripcion, $this->intStatus);
		 	$request = $this->update($sql,$arrData);
		    }else{
		    	$request = "exist";

		    }
		    return $request;
		 }

		 public function deletemodulo(int $roleId)
		 {
		 	$this->intIdrol = $roleId;
		 	$sql = "SELECT * FROM modulos WHERE idmodulo  = $this->intIdrol ";
		 	$request = $this->select_all($sql);
		 	if(empty($request)){
		 		$sql= "UPDATE modulos SET status = ? WHERE idmodulo  = $this->intIdrol";
		 		$arrData = array(0);
		 		$request = $this->update($sql, $arrData);
		 		if($request){
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