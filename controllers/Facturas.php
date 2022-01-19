<?php

class Facturas extends Controllers{
	
public function __construct(){
	parent::__construct();
	  session_start();
     if(empty($_SESSION['login'])) {
	 	header('Location: '.base_url().'/login');
     }
     getPermisos(13);
}
public function Facturas(){
	if(empty($_SESSION['permisosMod']['r'])){
		header("Location:".base_url().'/dashboard');
	}
	$data['page_tag'] = "Facturas";
	$data['page_title'] ="Facturas";
	$data['page_name'] = "Facturas";
	$data['page_functions_js'] = "functions_facturas.js";
	$this->views->getView($this,"Facturas", $data);
}

	
public function setFactura(){
	 if($_POST){
            if(empty($_POST['listEmpresa']) || empty($_POST['txtprovNumeFact']) || empty($_POST['txtprovValoFact'])|| empty($_POST['listStatus'])){
                $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
            }else{
     
                $intprovFactId = intval($_POST['provFactId']);
                $intEmpresa=  intval($_POST['listEmpresa']);
                $intprovNumeFact = intval($_POST['txtprovNumeFact']);
                $intprovValoFact = intval($_POST['txtprovValoFact']);
                $intStatus = intval($_POST['listStatus']);

                if($intprovFactId == 0)
                {
                    //Crear
                    if($_SESSION['permisosMod']['w']){
                        $request_factura = $this->model->insertFactura($intEmpresa, $intprovNumeFact,$intprovValoFact,$intStatus);
                        $option = 1;
                    }
                }else{
                    //Actualizar
                    if($_SESSION['permisosMod']['u']){
                        $request_factura = $this->model->updateFactura($intprovFactId,$intEmpresa, $intprovNumeFact,$intprovValoFact,$intStatus);
                        $option = 2;
                    }
                }
                if($request_factura > 0 )
                {
                    if($option == 1)
                    {
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                    }else{
                        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                          
                    }
                }else if($request_factura == 'exist'){
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! La categoría ya existe.');
                }else{
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
}

public function getFacturas(){
if($_SESSION['permisosMod']['r']){
	$arrData = $this->model->selectFacturas();
	for ($i=0; $i < count($arrData); $i++) {
		$btnView = '';
		$btnEdit = '';
		$btnDelete = '';
		if($arrData[$i]['status'] == 1){
			$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
		}else{
			$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
		}
		if($_SESSION['permisosMod']['r']){
			$btnView = '<button class="btn btn-info btn-sm" onClick="fntEditInfo('.$arrData[$i]['provFactId'].')" title="Ver usuario"><i class="far fa-eye"></i></button>';
		}
		if($_SESSION['permisosMod']['u']){
				$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['provFactId'].')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>';
		}
		if($_SESSION['permisosMod']['d']){
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelFactura('.$arrData[$i]['provFactId'].')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>';
		}
		$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
	}
	echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
	}
	die();   
}

 public function getFactura($provFactId){
        if($_SESSION['permisosMod']['r']){
            $intIdcategoria = intval($provFactId);
            if($intIdcategoria > 0)
            {
                $arrData = $this->model->selectFactura($intIdcategoria);
                if(empty($arrData))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
        }
        die();
}


	
public function getAgregar(int $prodCodi){
	$prodCodi = intval($prodCodi);
	if($prodCodi > 0)
	{
	 $arrData = $this->model->AgregarProducto($prodCodi);
	 ///dep($arrData);
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

}

  ?>