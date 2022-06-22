<?php 

class SuscriptoresModel extends Mysql{

	public function selectSuscriptores()
	{
		$sql = "SELECT idsuscripciones, nombre, email, DATE_FORMAT(datecreate, '%d/%m/%Y') as fecha
				FROM suscripciones ORDER BY idsuscripciones DESC";
		$request = $this->select_all($sql);
		return $request;
	}

}
 ?>