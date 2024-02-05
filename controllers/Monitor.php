<?php

class Monitor extends Controllers{
	
	public function __construct(){
		parent::__construct();
		 session_start();
         if(empty($_SESSION['login']))
         {
		 	header('Location: '.base_url().'/login');
	     }
		 getPermisos(MPRODUCTOS);
	}

	public function Monitor(){
		if(empty($_SESSION['permisosMod']['r'])){
                header("Location:".base_url().'/dashboard');
         }
		$data['page_tag'] = "Monitor";
		$data['page_title'] ="Monitor";
		$data['page_name'] = "Monitor";
		$data['page_functions_js'] = "functions_Monitor.js";
		$this->views->getView($this,"Monitor", $data);
	}
	public function getProductos(){
		if($_SESSION['permisosMod']['r']){
			$arrData = $this->model->selectProductos();
			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if($arrData[$i]['status'] == 1){
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}
				$arrData[$i]['prodPrec'] = SMONEY.' '.formatMoney($arrData[$i]['prodPrec']);
				//if($_SESSION['permisosMod']['r']){
				//	$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['prodId'].')" title="Ver producto"><i class="far fa-eye"></i></button>';
				//}
				//if($_SESSION['permisosMod']['u']){
				//	$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['prodId'].')" title="Editar producto"> <i class="fas fa-pencil-alt"></i></button>';
				//}
				if($_SESSION['permisosMod']['d']){	
					$btnVenta = '<a class="btn btn-app bg-secondary" onClick="fntVentas('.$arrData[$i]['prodId'].')" <span class="badge bg-success"><i class="badge bg-success"></span>
                    <i class="fas fa-barcode">Vender</i></a>';
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnVenta.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	
	public function setProducto(){
		if($_POST) {
		if(empty($_POST['txtNombre'])  ||  empty($_POST['txtDescripcion'])  || empty($_POST['txtPrecio'])  || empty($_POST['txtCodigo'])  || empty($_POST['listCategoria'])  ||
		     empty($_POST['txtStock']) ||  empty($_POST['listStatus'])) {
			$arrResponse = array("status" => false, "msg" => 'Datos incorrectos');
		}else{
			$intProdcodi  = intval($_POST['prodId']);
			$strprodNomb = strClean($_POST['txtNombre']);
			//$strprodMode = strClean($_POST['txtMedidas']);
			$strprodDesc = strClean($_POST['txtDescripcion']);
			$strCodigo = intval($_POST['txtCodigo']);
			$intlistProd = intval($_POST['listCategoria']);
            $intProdPrec = intval($_POST['txtPrecio']);
            $intprodStock = intval($_POST['txtStock']);
			$intStatus = intval($_POST['listStatus']);
			$request_productos ="";
			$ruta = strtolower(clear_cadena($strprodNomb));
			$ruta = str_replace("","-", $ruta);
			if($intProdcodi == 0){
				$options = 1;
				if($_SESSION['permisosMod']['w']){
				$request_productos = $this->model->insertProductos(
													$strprodNomb,
													//$strprodMode,
													$strprodDesc,
													$strCodigo,
													$intlistProd,
													$intProdPrec,
													$intprodStock,
													$ruta,
													$intStatus);
				}

			}else{
				$options = 2;
				if($_SESSION['permisosMod']['u']){
				$request_productos = $this->model->updateProducto($intProdcodi,
															$strprodNomb,
															$strprodDesc, 
															$strCodigo, 
															$intlistProd,
															$intProdPrec, 
															$intprodStock, 
															$ruta,
															$intStatus);
					
				}
			}
			if($request_productos > 0){
				if($options == 1){
					$arrResponse = array('status' => true, 'prodId' => $request_productos, 'msg' => 'Datos guardados correctamente.');
				}else{
					$arrResponse = array('status' => true, 'prodId' => $intProdcodi, 'msg' => 'Datos Actualizados correctamente.');
				}
				}else if($request_productos == 'exist'){
                    $arrResponse = array('status' => false, 'msg' => '¡Atención! La categoría ya existe.');
                }else{
                    $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getProducto($prodId){
		if($_SESSION['permisosMod']['r']){
			$prodId = intval($prodId);
			if($prodId > 0){
				$arrData = $this->model->selectProducto($prodId);
				if(empty($arrData)){
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrImg = $this->model->selectImages($prodId);
					if(count($arrImg) > 0){
						for ($i=0; $i < count($arrImg); $i++) { 
							$arrImg[$i]['url_image'] = media().'/images/uploads/'.$arrImg[$i]['img'];
						}
					}
					$arrData['images'] = $arrImg;
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function setImagen(){
		if($_POST){
			if(empty($_POST['prodId'])){
				$arrResponse = array('status' => false, 'msg' => 'Error de dato.');
			}else{
				$intProdcodi = intval($_POST['prodId']);
				$foto      = $_FILES['foto'];
				$imgNombre = 'pro_'.md5(date('d-m-Y H:m:s')).'.jpg';
				$request_image = $this->model->insertImagen($intProdcodi,$imgNombre);
				if($request_image){
					$uploadImage = uploadImage($foto,$imgNombre);
					$arrResponse = array('status' => true, 'imgname' => $imgNombre, 'msg' => 'Archivo cargado.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error de carga.');
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	public function delFile(){
		if($_POST){
			if(empty($_POST['prodId']) || empty($_POST['file'])){
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			}else{
				//Eliminar de la DB
				$intProdcodi = intval($_POST['prodId']);
				$imgNombre  = strClean($_POST['file']);
				$request_image = $this->model->deleteImage($intProdcodi,$imgNombre);

				if($request_image){
					$deleteFile =  deleteFile($imgNombre);
					$arrResponse = array('status' => true, 'msg' => 'Archivo eliminado');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function delProducto(){
		if($_POST){
			if($_SESSION['permisosMod']['d']){
				$intIdproducto = intval($_POST['prodId']);
				$requestDelete = $this->model->VenderProducto($intIdproducto);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el producto');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}
	
}
 ?>