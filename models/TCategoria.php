<?php
require_once("Libraries/Core/Mysql.php");
trait TCategoria{
	private $con;

	public function getCategoriasT(string $categorias){
		$this->con = new Mysql();
		$sql = "SELECT cateCodi, cateNomb, cateDesc, portada ,ruta
		FROM categorias WHERE status != 0 AND cateCodi IN ($categorias)";
		$request = $this->con->select_all($sql);
		if(count($request)> 0){
			for($c=0; $c < count($request); $c++){
				$request[$c]['portada'] = BASE_URL.'Public/images/uploads/'.$request[$c]['portada'];
			}
		}
		return $request;
	}
}

?>