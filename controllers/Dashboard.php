<?php

class Dashboard extends Controllers{	
	public function __construct(){
		parent::__construct();
		session_start();
		session_regenerate_id(true);
		if(empty($_SESSION['login'])){
			header('Location: '.base_url().'/login');
		}
		getPermisos(2);
	}
	public function Dashboard(){
		// $data['page_id'] = 2;
		$data['page_tag'] = "Dashboard - Tienda Virtual";
		$data['page_title'] = "Dashboard - Tienda Virtual";
		$data['page_name'] = "dashboard";
		$data['page_functions_js'] = "functions_dashboard.js";
		$data['consultaUsuariosDashboard']="total";
		$this->views->getView($this,"dashboard",$data);
	}
	public function consultaUsuariosDashboard(){	
		$arrData = $this->model->getUsuariosDashboard();
		if($arrData != 0){
			$total = $arrData;
			dep($total);
			echo json_encode($total,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	
	// public function insertar()
	// {
	// 	$data = $this->model->setUser("carlos",18);
	// }

	// public function verusuario($id)
	// {
	// 	$data = $this->model->getUser($id);
	// 	print_r($data);
	// }
	// public function actualizar()
	// {
	// 	$data = $this->model->updateUser(1, "emilio",40);
	// 	print_r($data);
	// }

	// public function verusuarios()
	// {
	// 	$data = $this->model->getUsers();
	// 	print_r($data);
	// }
	// public function eliminarusuario($id)
	// {
	// 	$data = $this->model->delUser($id);
	// 	print_r($data);
	// }

	}

  ?>