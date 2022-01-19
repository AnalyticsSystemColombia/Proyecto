<?php 
 require_once("Models/TCategoria.php");
  require_once("Models/TProducto.php");
	class Home extends Controllers{
		use TCategoria, TProducto;
		public function __construct(){
			parent::__construct();
			session_start();
		}
       
		public function home(){
			///muestra la información de otro modelo dep($this->model->getCategorias());
			//dep($this->getCategoriasT(CAT_SLIDER));
			$data['page_tag'] = "SISO";
			$data['page_title'] = "Sitio oficial";
			$data['page_name'] = "SISO";
			$data['slider'] = $this->getCategoriasT(CAT_SLIDER);
			$data['banner'] = $this->getCategoriasT(CAT_BANNER);
			$data['producto'] = $this->getProductosT();
			$this->views->getView($this,"Home",$data);
		}

	}
 ?>