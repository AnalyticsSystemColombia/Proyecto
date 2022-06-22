<?php 
 require_once("Models/TCategoria.php");
  require_once("Models/TProducto.php");
   require_once("Models/TCliente.php");
   require_once("Models/LoginModel.php");

	class Tienda extends Controllers{
		use TCategoria, TProducto, TCliente;
		public $login;
	public function __construct(){
	   parent::__construct();
	   session_start();
	   $this->login = new LoginModel();

	}
       
	public function tienda(){
		///muestra la información de otro modelo dep($this->model->getCategorias());
		//dep($this->getCategoriasT(CAT_SLIDER));
		$data['page_tag'] = "SISO";
		$data['page_title'] = "Sitio oficial";
		$data['page_name'] = "tienda";
		$pagina = 1;
		$cantProductos = $this->cantProductos();
		$total_registro = $cantProductos['total_registro'];
		$desde = ($pagina-1) * PROPORPAGINA;
		$total_paginas = ceil($total_registro / PROPORPAGINA);
		
		$data['productos'] = $this->getProductosPage($desde,PROPORPAGINA);
		//dep($data['productos']);exit;
		//$data['productos'] = $this->getProductosT();
		$data['pagina'] = $pagina;
		$data['total_paginas'] = $total_paginas;
		$data['categorias'] = $this->getCategorias();
		$this->views->getView($this,"tienda",$data);
	}
	public function categoria($params){
		//dep($params);
		if(empty($params)){
			header("Location:".base_url());
		}else{
            
			$arrParams = explode(",",$params);
			//dep($arrParams);
			$idcategoria = intval($arrParams[0]);
			//dep($idcategoria);
			$ruta = strClean($arrParams[1]);
			//dep($ruta );
			$pagina = 1;
			//dep($pagina);
			if(count($arrParams) > 2 && is_numeric($arrParams[2])){
				$pagina = $arrParams[2];
			}
			$cantProductos = $this->cantProductos($idcategoria);
			$total_registro = $cantProductos['total_registro'];
			$desde = ($pagina-1) * PROCATEGORIA;
			$total_paginas = ceil($total_registro / PROCATEGORIA);
			$infoCategoria = $this->getProductosCategoriaT($idcategoria,$ruta,$desde,PROCATEGORIA);
			//dep($infoCategoria );
			$categoria = strClean($params);
			$data['page_tag'] = NOMBRE_EMPRESA." - ".$infoCategoria['Idcategoria'];
			$data['page_title'] = $infoCategoria['cateNomb'];
			$data['page_name'] = "categoria";
			$data['productos'] = $infoCategoria['productos'];
			$data['infoCategoria'] = $infoCategoria;
			$data['pagina'] = $pagina;
			$data['total_paginas'] = $total_paginas;
			$data['categorias'] = $this->getCategorias();
			$this->views->getView($this,"categoria",$data);
		}
	}
	public function producto($params){
		if(empty($params)){
			header("Location:".base_url());
		}else{
            $arrParams = explode(",", $params);
			$IdProducto = intval($arrParams[0]);
			$ruta       = strClean($arrParams[1]);
			$infoProducto = $this->getProductoT($IdProducto, $ruta);
            if(empty($infoProducto)){
            	header("Location:".base_url());
            }
			$data['page_tag'] = NOMBRE_EMPRESA."-".$infoProducto['prodNomb'];
			$data['page_title'] = $infoProducto['prodNomb'];
			$data['page_name'] = "producto"; 
			$data['producto'] = $infoProducto;
			$data['productos'] = $this->getProductosRandom($infoProducto['prodIdCate'],8,"r");
			$this->views->getView($this,"producto",$data);
		}
	}

	public function addCarrito(){
		if($_POST){
			//dep($_POST);
			//unset($_SESSION['arrCarrito']); exit();
			$arrCarrito = array();
			$cantCarrito = 0;
			$prodId = openssl_decrypt($_POST['id'], METHODENCRIPT, KEY);
			//dep($prodId);
			$cantidad = $_POST['cant'];
			if(is_numeric($prodId) AND is_numeric($cantidad)){
				$arrInfoProducto = $this->getProductoIDT($prodId);
                if(!empty($arrInfoProducto)){
                	//dep($arrInfoProducto);
                	$arrProducto = array('prodId' => $prodId,
                                          'producto'  => $arrInfoProducto['prodNomb'],
                                           'cantidad' => $cantidad,
                                            'precio'  => $arrInfoProducto['prodPrec'],
                                            'imagen'  => $arrInfoProducto['images'][0]['url_image']
                                         );
                	if(isset($_SESSION['arrCarrito'])){
                		$on = true;
                		$arrCarrito = $_SESSION['arrCarrito'];
                		for ($pr=0; $pr < count($arrCarrito); $pr++) { 
                			if ($arrCarrito[$pr]['prodId'] == $prodId) {
                				$arrCarrito[$pr]['cantidad'] += $cantidad;
                				$on = false;
                			}
                		}
                		if($on){
            				array_push($arrCarrito, $arrProducto);
            				}
            				$_SESSION['arrCarrito'] = $arrCarrito;
                	}else{
                		array_push($arrCarrito, $arrProducto );
                		$_SESSION['arrCarrito'] = $arrCarrito;
                	}
                	foreach ($_SESSION['arrCarrito'] as $pro) {
                		$cantCarrito += $pro['cantidad'];
                	}

                	$htmlCarrito ="";
                	$htmlCarrito = getFile('/Plantillas/Modal/modalCarrito',$_SESSION['arrCarrito']);
                	$arrResponse = array("status" => true,
                                          "msg"   =>'¡Se agrego al carrito!',
                                          "cantCarrito" => $cantCarrito,
                                           "htmlCarrito" => $htmlCarrito
                                       );
                }else{
                	$arrResponse =  array("status" =>false , "msg" =>'Producto no existe.');
                }
			}else{
				$arrResponse =  array("status" =>false , "msg" =>'Dato incorrecto.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}


	public function delCarrito(){
		if($_POST){
			$arrCarrito = array();
			$cantCarrito = 0;
			$prodId = openssl_decrypt($_POST['id'], METHODENCRIPT, KEY);
			$option = $_POST['option'];
			if (is_numeric($prodId) and ($option == 1 or $option == 2)) {
				$arrCarrito = $_SESSION['arrCarrito'];
				for($pro=0; $pro < count($arrCarrito); $pro++){
					if($arrCarrito[$pro]['prodId'] == $prodId){
						unset($arrCarrito[$pro]);
					}
				}
				sort($arrCarrito);
				$_SESSION['arrCarrito'] = $arrCarrito;
				foreach ($_SESSION['arrCarrito'] as $pro) {
                		$cantCarrito += $pro['cantidad'];
            	}
            	$htmlCarrito ="";
            	if($option == 1){
            		$htmlCarrito = getFile('/Plantillas/Modal/modalCarrito',$_SESSION['arrCarrito']);
            	}
            	$arrResponse = array("status" => true,
                                          "msg"   =>'Producto eliminado del carrito',
                                          "cantCarrito" => $cantCarrito,
                                           "htmlCarrito" => $htmlCarrito
                                       );
			}else{
				$arrResponse =  array("status" =>false , "msg" =>'Dato incorrecto.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function updCarrito(){
		if($_POST){
			//dep($_POST);
			$arrCarrito = array();
			$totalProducto = 0;
			$subtotal = 0;
			$total = 0;
			$prodId = openssl_decrypt($_POST['id'], METHODENCRIPT, KEY);
			$cantidad = intval($_POST['cantidad']);
			if(is_numeric($prodId) and $cantidad > 0){
				$arrCarrito = $_SESSION['arrCarrito'];
				//dep($arrCarrito);
				//exit;
				for ($i=0; $i < count($arrCarrito); $i++) { 
					if ($arrCarrito[$i]['prodId'] == $prodId) {
						$arrCarrito[$i]['cantidad'] = $cantidad;
						$totalProducto = $arrCarrito[$i]['precio'] * $cantidad;
						break;
					}
				}
				$arrCarrito = $_SESSION['arrCarrito'];
				foreach ($_SESSION['arrCarrito'] as $pro) {
					$subtotal += $pro['cantidad'] * $pro['precio'];
				}
				$arrResponse = array("status" =>true,
				                      "msg" => '¡Producto actualizado',
				                      "totalProducto" => SMONEY.formatMoney($totalProducto),
				                      "subtotal" => SMONEY.formatMoney($subtotal),
				                      "total" => SMONEY.formatMoney($total + COSTOENVIO)
				                  );
			}else{
				$arrResponse =array("status" => false, "msg" => 'Dato incorrecto');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function registro(){
			error_reporting(0);
			if($_POST){
				if(empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmailCliente']))
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{ 
					$strNombre = ucwords(strClean($_POST['txtNombre']));
					$strApellido = ucwords(strClean($_POST['txtApellido']));
					$intTelefono = intval(strClean($_POST['txtTelefono']));
					$strEmail = strtolower(strClean($_POST['txtEmailCliente']));
					$intTipoId = 6;
					$request_user = "";
					
					$strPassword =  passGenerator();
					$strPasswordEncript = hash("SHA256",$strPassword);
					$request_user = $this->insertCliente($strNombre, 
														$strApellido, 
														$intTelefono, 
														$strEmail,
														$strPasswordEncript,
														$intTipoId );
					if($request_user > 0 )
					{
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						$nombreUsuario = $strNombre.' '.$strApellido;
						$dataUsuario = array('nombreUsuario' => $nombreUsuario,
											 'email' => $strEmail,
											 'password' => $strPassword,
											 'asunto' => 'Bienvenido a tu tienda en línea');
						$_SESSION['idUser'] = $request_user;
						$_SESSION['login'] = true;
						$this->login->sessionLogin($request_user);
						//sendEmail($dataUsuario,'email_bienvenida');

					}else if($request_user == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! el email ya existe, ingrese otro.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
	}

   public function procesarVenta(){
			if($_POST){
				$idtransaccionpaypal = NULL;
				$datospaypal = NULL;
				$personaid = $_SESSION['idUser'];
				$monto = 0;
				$tipopagoid = intval($_POST['inttipopago']);
				$direccionenvio = strClean($_POST['direccion']).', '.strClean($_POST['ciudad']);
				$status = "Pendiente";
				$subtotal = 0;
				$costo_envio = COSTOENVIO;

				if(!empty($_SESSION['arrCarrito'])){
					foreach ($_SESSION['arrCarrito'] as $pro) {
						$subtotal += $pro['cantidad'] * $pro['precio']; 
					}
					$monto = $subtotal + COSTOENVIO;
					//Pago contra entrega
					if(empty($_POST['datapay'])){
						//Crear pedido
						$request_pedido = $this->insertPedido($idtransaccionpaypal, 
															$datospaypal, 
															$personaid,
															$costo_envio,
															$monto, 
															$tipopagoid,
															$direccionenvio, 
															$status);
						if($request_pedido > 0 ){
							//Insertamos detalle
							foreach ($_SESSION['arrCarrito'] as $producto) {
								$productoid = $producto['prodId'];
								$precio = $producto['precio'];
								$cantidad = $producto['cantidad'];
								$this->insertDetalle($request_pedido,$productoid,$precio,$cantidad);
							}

							$infoOrden = $this->getPedido($request_pedido);
							$dataEmailOrden = array('asunto' => "Se ha creado la orden No.".$request_pedido,
													'email' => $_SESSION['userData']['email'], 
													'emailCopia' => EMAIL_PEDIDOS,
													'pedido' => $infoOrden );
							//sendEmail($dataEmailOrden,"email_notificacion_orden");

							$orden = openssl_encrypt($request_pedido, METHODENCRIPT, KEY);
							$transaccion = openssl_encrypt($idtransaccionpaypal, METHODENCRIPT, KEY);
							$arrResponse = array("status" => true, 
											"orden" => $orden, 
											"transaccion" =>$transaccion,
											"msg" => 'Pedido realizado'
										);
							$_SESSION['dataorden'] = $arrResponse;
							unset($_SESSION['arrCarrito']);
							session_regenerate_id(true);
						}
					}else{ //Pago con PayPal
						$jsonPaypal = $_POST['datapay'];
						$objPaypal = json_decode($jsonPaypal);
						$status = "Aprobado";
						if(is_object($objPaypal)){
							$datospaypal = $jsonPaypal;
							$idtransaccionpaypal = $objPaypal->purchase_units[0]->payments->captures[0]->id;
							if($objPaypal->status == "COMPLETED"){
								$totalPaypal = formatMoney($objPaypal->purchase_units[0]->amount->value);
								if($monto == $totalPaypal){
									$status = "Completo";
								}
								//Crear pedido
								$request_pedido = $this->insertPedido($idtransaccionpaypal, 
																	$datospaypal, 
																	$personaid,
																	$costo_envio,
																	$monto, 
																	$tipopagoid,
																	$direccionenvio, 
																	$status);
								if($request_pedido > 0 ){
									///dep($request_pedido);
									//Insertamos detalle
									foreach ($_SESSION['arrCarrito'] as $producto) {
										$productoid = $producto['prodId'];
										$precio = $producto['precio'];
										$cantidad = $producto['cantidad'];
										$this->insertDetalle($request_pedido,$productoid,$precio,$cantidad);
									}
									$infoOrden = $this->getPedido($request_pedido);
									$dataEmailOrden = array('asunto' => "Se ha creado la orden No.".$request_pedido,
													'email' => $_SESSION['userData']['email'], 
													'emailCopia' => EMAIL_PEDIDOS,
													'pedido' => $infoOrden );

									//sendEmail($dataEmailOrden,"email_notificacion_orden");

									$orden = openssl_encrypt($request_pedido, METHODENCRIPT, KEY);
									$transaccion = openssl_encrypt($idtransaccionpaypal, METHODENCRIPT, KEY);
									$arrResponse = array("status" => true, 
													"orden" => $orden, 
													"transaccion" =>$transaccion,
													"msg" => 'Pedido realizado'
												);
									$_SESSION['dataorden'] = $arrResponse;
									unset($_SESSION['arrCarrito']);
									session_regenerate_id(true);
								}else{
									$arrResponse = array("status" => false, "msg" => 'No es posible procesar el pedido.');
								}
							}else{
								$arrResponse = array("status" => false, "msg" => 'No es posible completar el pago con PayPal.');
							}
						}else{
							$arrResponse = array("status" => false, "msg" => 'Hubo un error en la transacción.');
						}
					}
				}else{
					$arrResponse = array("status" => false, "msg" => 'No es posible procesar el pedido.');
				}
			}else{
				$arrResponse = array("status" => false, "msg" => 'No es posible procesar el pedido.');
			}

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

	public function confirmarpedido(){
			if(empty($_SESSION['dataorden'])){
				header("Location: ".base_url());
			}else{

				$dataorden = $_SESSION['dataorden'];
				$idpedido = openssl_decrypt($dataorden['orden'], METHODENCRIPT, KEY);
				$transaccion = openssl_decrypt($dataorden['transaccion'], METHODENCRIPT, KEY);
				$data['page_tag'] = "Confirmar Pedido";
				$data['page_title'] = "Confirmar Pedido";
				$data['page_name'] = "confirmarpedido";
				$data['orden'] = $idpedido;
				$data['transaccion'] = $transaccion;
				$this->views->getView($this,"confirmarpedido",$data);
			}
			unset($_SESSION['dataorden']);
	}

	public function page($pagina = null){

			$pagina = is_numeric($pagina) ? $pagina : 1;
			$cantProductos = $this->cantProductos();
			$total_registro = $cantProductos['total_registro'];
			$desde = ($pagina-1) * PROPORPAGINA;
			$total_paginas = ceil($total_registro / PROPORPAGINA);
			$data['productos'] = $this->getProductosPage($desde,PROPORPAGINA);
			//dep($data['productos']);exit;
			$data['page_tag'] = NOMBRE_EMPRESA;
			$data['page_title'] = NOMBRE_EMPRESA;
			$data['page_name'] = "tienda";
			$data['pagina'] = $pagina;
			$data['total_paginas'] = $total_paginas;
			$data['categorias'] = $this->getCategorias();
			$this->views->getView($this,"tienda",$data);
		}
		public function search(){
			if(empty($_REQUEST['s'])){
				header("Location: ".base_url());
			}else{
				$busqueda = strClean($_REQUEST['s']);
			}

			$pagina = empty($_REQUEST['p']) ? 1 : intval($_REQUEST['p']);
			$cantProductos = $this->cantProdSearch($busqueda);
			$total_registro = $cantProductos['total_registro'];
			$desde = ($pagina-1) * PROBUSCAR;
			$total_paginas = ceil($total_registro / PROBUSCAR);
			$data['productos'] = $this->getProdSearch($busqueda,$desde,PROBUSCAR);
			$data['page_tag'] = NOMBRE_EMPESA;
			$data['page_title'] = "Resultado de: ".$busqueda;
			$data['page_name'] = "tienda";
			$data['pagina'] = $pagina;
			$data['total_paginas'] = $total_paginas;
			$data['busqueda'] = $busqueda;
			$data['categorias'] = $this->getCategorias();
			$this->views->getView($this,"search",$data);

		}
		public function suscripcion(){
			if($_POST){
				$nombre = ucwords(strtolower(strClean($_POST['nombreSuscripcion'])));
				$email  = strtolower(strClean($_POST['emailSuscripcion']));

				$suscripcion = $this->setSuscripcion($nombre,$email);
				if($suscripcion > 0){
					$arrResponse = array('status' => true, 'msg' => "Gracias por tu suscripción.");
					//Enviar correo
					 $dataUsuario = array('asunto' => "Nueva suscripción",
					 					'email' => EMAIL_SUSCRIPCION,
					 					'nombreSuscriptor' => $nombre,
					 					'emailSuscriptor' => $email );
					 sendEmail($dataUsuario,"email_suscripcion");
				}else{
					$arrResponse = array('status' => false, 'msg' => "El email ya fue registrado.");
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

			}
			die();
		}

  }
?>
