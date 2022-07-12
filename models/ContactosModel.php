<?php 

class ContactosModel extends Mysql{

	public function selectContactos()
	{
		$sql = "SELECT id, nombre, email, DATE_FORMAT(datecreate, '%d/%m/%Y') as fecha
				FROM contactos ORDER BY id DESC";
		$request = $this->select_all($sql);
		return $request;
	}
	public function selectMensaje(int $id){
		$sql = "SELECT id, nombre, email, DATE_FORMAT(datecreate, '%d/%m/%Y') as fecha, mensaje
				FROM contactos  WHERE id ={$id}";
		$request = $this->select($sql);
		return $request;

	}

}
 ?>