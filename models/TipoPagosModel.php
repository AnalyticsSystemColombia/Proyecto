<?php

    class TipoPagosModel extends Mysql
	{
		public $intIdrol;
		public $strTipopagp;
		public $strDescripcion;
		public $intStatus;
		
	public function __construct(){
		parent::__construct();
	}

	public function selectTipopagos(){
		
			$sql = "SELECT * FROM tipopago WHERE status != 0";
			$request = $this->select_all($sql);
			return $request;
	}

	public function selectRol(int $idrol){
		$this->intIdrol = $idrol;
		$sql = "SELECT * FROM roles WHERE idrol = $this->intIdrol";
		$request = $this->select($sql);
		return $request;
	}

	public function insertTipopago(string $tipopago,  int $status){
		$return = "";
		$this->strTipopagp = $tipopago;
		$this->intStatus = $status;
		$sql ="SELECT * FROM tipopago WHERE tipopago = '{$this->strTipopagp}' ";
		$request = $this->select_all($sql);
			if(empty($request)){
				$query_insert = "INSERT INTO tipopago (tipopago,status) VALUES(?,?)";
				$arrData =  array($this->strTipopagp, $this->intStatus);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
			}else{
			$return = "exist";
			}
		return $return;
	}

	public function updateRol(int $idrol, string $rol, string $descripcion, int $status){
		$this->intIdrol = $idrol;
		$this->strTipopagp = $rol;
		$this->strDescripcion = $descripcion;
		$this->intStatus = $status;
		$sql ="SELECT * FROM roles WHERE roleNomb = '$this->strRol' AND idrol !=  $this->intIdrol ";
		$request = $this->select_all($sql);
		if(empty($request)){
			$sql = "UPDATE roles SET roleNomb = ?, roleDesc = ?, status= ? WHERE idrol = $this->intIdrol";
			$arrData =  array($this->strRol, $this->strDescripcion, $this->intStatus);
			$request = $this->update($sql,$arrData);
		}else{
			$request = "exist";
		}
		return $request;
	}

	public function deleteRol(int $roleId){
		$this->intIdrol = $roleId;
		$sql = "SELECT * FROM personas WHERE rolid = $this->intIdrol ";
		$request = $this->select_all($sql);
		if(empty($request)){
			$sql= "UPDATE roles SET status = ? WHERE idrol = $this->intIdrol";
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