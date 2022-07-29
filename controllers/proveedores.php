<?php

class Proveedores extends Controllers
{
	
	public function __construct(){
		parent::__construct();
		 session_start();
         if(empty($_SESSION['login'])) {
			header('Location: '.base_url().'/login');
	     }
		 getPermisos(MPROVEEDORES);
	}
	public function Proveedores()
	{
		$data['page_tag'] = "Proveedores";
		$data['page_title'] ="Proveedores";
		$data['page_name'] = "Proveedores";
		$data['page_functions_js'] = "functions_proveedores.js";
		////$data['page_content'] = "Informacion de la pagina"; sirve para dar informacion.
		$this->views->getView($this,"Proveedores", $data);
	}
	
	public function setProveedor(){
		///dep($_POST);
		if($_POST) {
		if(empty($_POST['txtprovNit']) || empty($_POST['txtprovNomb']) ||
		empty($_POST['txtprovDire']) || empty($_POST['txtprovDire']) || empty($_POST['txtprovTele']) ||
		empty($_POST['txtprovDeta']) || empty($_POST['listStatus']) ) 
		{
			$arrResponse = array("status" => false, "msg" => 'Datos incorrectos');
		}else{
			$strIdentificacion = strClean($_POST['txtprovNit']);
			$strNombre = ucwords (strClean($_POST['txtprovNomb']));
			$strApellido = ucwords (strClean($_POST['txtprovDire']));
			$intTelefono = intval(strClean($_POST['txtprovTele']));
			$strEmail = strtolower (strClean($_POST['txtprovEmail']));
			$strprovDeta = ucwords (strClean($_POST['txtprovDeta']));
			$intStatus = intval(strClean($_POST['listStatus']));

			$request_user = $this->model->insertProveedor($strIdentificacion,
			$strNombre,
			$strApellido,
			$intTelefono,
			$strEmail,
			$strprovDeta,
			$intStatus);

			if($request_user > 1)
			{
				
				$arrResponse = array('status' => true, 'msg' => 'Datos Guardados con éxito');

			}else if($request_user == 'exist')
			{
				$arrResponse = array('status' => true, 'msg' => 'El nombre del producto ya existe, ingrese otro');

			}else{

				$arrResponse = array("status" => false, "msg" => 'No es posible guardar los datos');
			}

		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

		}
		die();
	}
	public function getProveedores()
	{
		$arrData =$this->model->selectProveedores();
		for($i = 0; $i < count($arrData); $i++)
                {
                    if($arrData[$i]['status'] == 1)
                    {
                        $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                    }else{
                        $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
                    }

                    $arrData[$i]['options'] = '<div class="text-center">
                    <button class="btn btn-secondary btn-sm btnViewProveedor" pv="'.$arrData[$i]['provCodi'].'" title="Ver usuario"><i class="fa fa-address-book-o" aria-hidden="true"></i></button> 
                    <button class="btn btn-primary btn-sm btnEditProveedor" pv="'.$arrData[$i]['provCodi'].'" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button class="btn btn-danger btn-sm btnDelProveedor" pv="'.$arrData[$i]['provCodi'].'" title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
                    </div>';
            }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
	}

	public function getProveedor(int $provCodi){
	 $provCodi = intval($provCodi);
	 if($provCodi > 0)
	 {
	  $arrData = $this->model->selectProveedor($provCodi);
	  //dep($arrData);
	  if(empty($arrData))
	  {
		  $arrResponse = array('status' => false, 'msg' => 'Datos incorrectos');
	  }else{
		  $arrResponse = array('status' => true,  'data' => $arrData);
	  }
	  echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
	 }
	 die();
	}

/////metodo para extraer provedores	

	public function getSelectProveedores(){
        $htmlOptions = "";
        $arrData = $this->model->selectProveedores();
        if(count($arrData) > 0){
            for($i=0; $i < count($arrData); $i++){
                $htmlOptions .= '<option value="'.$arrData[$i]['provCodi'].'">'.$arrData[$i]['provNomb'].'</option>';
            }
        }
        echo $htmlOptions;
        die();
    }
    
	
}

  ?>