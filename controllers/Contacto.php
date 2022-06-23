<?php 
 
	class Contacto extends Controllers{
		public function __construct(){
			parent::__construct();
			session_start();
		}
       
		public function contacto(){
			///muestra la información de otro modelo dep($this->model->getCategorias());
			//dep($this->getCategoriasT(CAT_SLIDER));
			$data['page_tag'] = NOMBRE_EMPRESA;
			$data['page_title'] = NOMBRE_EMPRESA;
			$data['page_name'] = "SISO";
			$this->views->getView($this,"contacto",$data);
		}

	}
 ?>