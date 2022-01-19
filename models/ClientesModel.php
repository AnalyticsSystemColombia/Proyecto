<?php 

	class ClientesModel extends Mysql{
		private $intIdUsuario;
		private $strIdentificacion;
		private $strNombre;
		private $strApellido;
		private $intTelefono;
		private $strEmail;
		private $strPassword;
		private $strToken;
		private $intStatus;
		private $strNit;
		private $strNomFiscal;
		private $strDirFiscal;

	public function __construct(){
		parent::__construct();
	}	
	public function insertCliente(string $identificacion, string $nombre, string $apellido, int $telefono, string $email, 
	string $password, int $tipoid, string $nit, string $NomFiscal, string $DirFiscal ){

		$this->strIdentificacion = $identificacion;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->strPassword = $password;
		$this->intTipoId = $tipoid;
		$this->strNit = $nit;
		$this->strNombreFiscal= $NomFiscal;
		$this->strDirFiscal = $DirFiscal;
		$return = 0;

		$sql = "SELECT * FROM personas WHERE 
				email = '{$this->strEmail}' or identificacion = '{$this->strIdentificacion}' ";
		$request = $this->select_all($sql);

		if(empty($request)){
			$query_insert  = "INSERT INTO personas(identificacion,nombres,apellidos,telefono,email,password,rolid,nit, nombrefiscal, direccionfiscal) 
								VALUES(?,?,?,?,?,?,?,?,?,?)";
			$arrData = array($this->strIdentificacion,
							$this->strNombre,
							$this->strApellido,
							$this->intTelefono,
							$this->strEmail,
							$this->strPassword,
							$this->intTipoId,
							$this->strNit,
						    $this->strNombreFiscal,
						    $this->strDirFiscal);
			$request_insert = $this->insert($query_insert,$arrData);
			$return = $request_insert;
		}else{
			$return = "exist";
		}
		return $return;
	}

	public function selectClientes()
	{
		$sql = "SELECT idpersona,identificacion,nombres,apellidos,telefono,email,status,nit,nombrefiscal, direccionfiscal 
				FROM personas  
				WHERE rolid =6 and status != 0 ";
				$request = $this->select_all($sql);
				return $request;
	}
		
	public function selectCliente(int $idpersona){
		$this->intIdUsuario = $idpersona;
		$sql = "SELECT idpersona, identificacion, nombres, apellidos, telefono, email, nit, nombrefiscal,
		direccionfiscal, status, DATE_FORMAT(persFech, '%d-%m-%Y') as fechaRegistro 
				FROM personas 
				WHERE idpersona = $this->intIdUsuario and rolid = 6 ";
		$request = $this->select($sql);
		return $request;
	}

	public function updateCliente(int $idUsuario, string $identificacion, string $nombre, string $apellido, int $telefono, 
	string $email, string $password, string $nit, string $NomFiscal, string $DirFiscal){
		$this->intIdUsuario = $idUsuario;
		$this->strIdentificacion = $identificacion;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->strPassword = $password;
		$this->strNit = $nit;
		$this->strNombreFiscal= $NomFiscal;
		$this->strDirFiscal = $DirFiscal;	
		$sql = "SELECT * FROM personas WHERE (email = '{$this->strEmail}' AND idpersona != $this->intIdUsuario)
				OR (identificacion = '{$this->strIdentificacion}' AND idpersona != $this->intIdUsuario) ";
		$request = $this->select_all($sql);
		if(empty($request)){
			if($this->strPassword  != ""){
				$sql = "UPDATE personas SET identificacion=?, nombres=?, apellidos=?, telefono=?, email=?, password=?, nit=?, nombrefiscal=?, direccionfiscal=?
						WHERE idpersona = $this->intIdUsuario ";
				$arrData = array($this->strIdentificacion,
						$this->strNombre,
						$this->strApellido,
						$this->intTelefono,
						$this->strEmail,
						$this->strPassword,
						$this->strNit,
						$this->strNombreFiscal,
						$this->strDirFiscal);
			}else{
				$sql = "UPDATE personas SET identificacion=?, nombres=?, apellidos=?, telefono=?, email=?, nit=?, nombrefiscal=?, direccionfiscal=? 
						WHERE idpersona = $this->intIdUsuario ";
				$arrData = array($this->strIdentificacion,
						$this->strNombre,
						$this->strApellido,
						$this->intTelefono,
						$this->strEmail,
						$this->strNit,
						$this->strNombreFiscal,
						$this->strDirFiscal);
			}
			$request = $this->update($sql,$arrData);
		}else{
			$request = "exist";
		}
		return $request;
	}
	
	public function deleteCliente(int $intIdpersona){
		$this->intIdUsuario = $intIdpersona;
		$sql = "UPDATE personas SET status = ? WHERE idpersona = $this->intIdUsuario ";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}
}
 ?>