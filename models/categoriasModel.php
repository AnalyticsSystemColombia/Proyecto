<?php

 class CategoriasModel extends Mysql{
		public $intIdCategoria;
		public $strcateNomb;
		public $strcateDesc;
		public $strPortada;
		public $strcateFech;
		public $intStatus;
		
	public function __construct(){
		parent::__construct();
	}
	public function insertCategoria(string $cateNomb, string $cateDesc, string $portada, int $status){
		$return = 0;
		$this->strcateNomb = $cateNomb;
		$this->strcateDesc = $cateDesc;
		$this->strPortada = $portada;
		$this->intStatus = $status;
		$sql ="SELECT * FROM categorias WHERE cateNomb = '{$this->strcateNomb}' ";
		$request = $this->select_all($sql);
		if(empty($request)){
			$query_insert = "INSERT INTO categorias (cateNomb,cateDesc, portada,status) VALUES(?,?,?,?)";
			$arrData =  array($this->strcateNomb,
			 $this->strcateDesc,
			 $this->strPortada,
			 $this->intStatus);
			$request_insert = $this->insert($query_insert,$arrData);
			$return = $request_insert;
		}else{
			$return = "exist";
		}
		return $return;
	}

	public function selectCategorias(){
		$sql = "SELECT * FROM categorias WHERE status != 0";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectCategoria(int $cateCodi){
		$this->intIdCategoria = $cateCodi;
		$sql = "SELECT * FROM categorias WHERE cateCodi = $this->intIdCategoria";
		$request = $this->select($sql);
		return $request;
	}

	public function updateCategoria(int $cateCodi, string $cateNomb, string $cateDesc, string $portada, int $status){
		$this->intIdcategoria = $cateCodi;
		$this->strcateNomb = $cateNomb;
		$this->strcateDesc = $cateDesc;
		$this->strPortada = $portada;
		$this->intStatus = $status;
		$sql ="SELECT * FROM categorias WHERE cateNomb = '{$this->strcateNomb}' AND cateCodi !=  $this->intIdcategoria ";
		$request = $this->select_all($sql);
		if(empty($request)){
			$sql = "UPDATE categorias SET cateNomb = ?, cateDesc = ?, portada = ?, status = ? WHERE cateCodi = $this->intIdcategoria";
			$arrData =  array($this->strcateNomb,
							  $this->strcateDesc,
							  $this->strPortada,
							  $this->intStatus);
			$request = $this->update($sql,$arrData);
		}else{
			$request = "exist";
		}
		return $request;
	}

	public function deleteCategoria(int $cateCodi){
		$this->intIdcategoria = $cateCodi;
		$sql = "SELECT * FROM productos WHERE prodId = $this->intIdCategoria ";
		$request = $this->select_all($sql);
		if(empty($request)){
			$sql= "UPDATE categorias SET status = ? WHERE cateCodi = $this->intIdCategoria";
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