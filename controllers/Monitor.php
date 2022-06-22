<?php
require_once("Models/TsearchProductos.php");
class Monitor extends Controllers{
	use TsearchProductos;

    public function __construct(){
        parent::__construct();
           session_start();
          if(empty($_SESSION['login'])) {
          	header('Location: '.base_url().'/login');
          }
         getPermisos(15);
    }
    public function monitor(){
         if(empty($_SESSION['permisosMod']['r'])){
         	header("Location:".base_url().'/dashboard');
         }
        $data['page_tag'] = "Monitor";
        $data['page_title'] ="Monitor";
        $data['page_name'] = "Monitor";
        
      
        $data['page_functions_js'] = "functions_monitor.js";
        $this->views->getView($this,"monitor", $data);
    }
    public function searchProducto(){
		if(empty($_REQUEST['s'])){
			header("Location: ".base_url());
		}else{
			$busqueda = strClean($_REQUEST['s']);
		}
		$pagina = empty($_REQUEST['p'] ? 1 : intval($_REQUEST['p']));
		$cantProductos = $this->ProdSearch($busqueda);
        $total_registro = $cantProductos['total_registro'];
		$desde = ($pagina-1) * PROPORPAGINA;
		$total_paginas = ceil($total_registro / PROPORPAGINA);
		$data['productos'] = $this->getProductosSearch($desde,PROPORPAGINA);
        $this->views->getView($this,"monitor", $data);
	}
}

  ?>