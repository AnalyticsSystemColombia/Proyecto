<?php 

	class Errores extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function notFound()
		{
			$pageContent = getPageRout('notfount');
			if(empty($pageContent)){
				header("Location: ".base_url());
			}else{
				$data['page_tag'] = NOMBRE_EMPRESA;
				$data['page_title'] = NOMBRE_EMPRESA." - ".$pageContent['titulo'];
				$data['page_name'] = $pageContent['titulo'];
				$data['page'] = $pageContent;
				$this->views->getView($this,"errores",$data);
			}
		}
	}


	$notFound = new Errores();
	$notFound->notFound();
 ?>